<?php

namespace Xammie\Mailbook;

use Closure;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\App;
use ReflectionFunction;
use ReflectionNamedType;
use UnexpectedValueException;

class MailableResolver
{
    private Mailable|Notification|null $instance = null;

    private ?ResolvedMail $resolved = null;

    public function __construct(public string|Closure|Mailable|Notification $mailable)
    {
    }

    public function className(): string
    {
        if ($this->mailable instanceof Mailable || $this->mailable instanceof Notification) {
            return get_class($this->mailable);
        }

        if ($this->instance instanceof Mailable) {
            return get_class($this->instance);
        }

        if (is_string($this->mailable)) {
            return $this->mailable;
        }

        $reflection = new ReflectionFunction($this->mailable);
        $reflectionType = $reflection->getReturnType();

        if ($reflectionType instanceof ReflectionNamedType) {
            $type = $reflectionType->getName();

            if (class_exists($type)) {
                return $type;
            }
        }

        $instance = App::call($this->mailable);

        if (! $instance instanceof Mailable && ! $instance instanceof Notification) {
            throw new UnexpectedValueException(sprintf('Unexpected value returned from mailbook closure expected instance of %s but got %s', Mailable::class, gettype($instance)));
        }

        $this->instance = $instance;

        return get_class($this->instance);
    }

    public function instance(): Mailable|Notification
    {
        if ($this->mailable instanceof Mailable || $this->mailable instanceof Notification) {
            return $this->mailable;
        }

        if ($this->instance instanceof Mailable) {
            return $this->instance;
        }

        if (is_callable($this->mailable)) {
            $instance = App::call($this->mailable);
        } else {
            $instance = app($this->mailable);
        }

        if (! $instance instanceof Mailable && ! $instance instanceof Notification) {
            throw new UnexpectedValueException(sprintf('Unexpected value returned from mailbook closure expected instance of %s but got %s', Mailable::class, gettype($instance)));
        }

        return $this->instance = $instance;
    }

    public function resolve(): ResolvedMail
    {
        if ($this->resolved instanceof ResolvedMail) {
            return $this->resolved;
        }

        $sender = new MailableSender($this->instance());

        return $this->resolved = $sender->collect();
    }
}
