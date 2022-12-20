<?php

use Illuminate\Mail\Events\MessageSending;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Event;
use Xammie\Mailbook\Facades\Mailbook;
use Xammie\Mailbook\MailableSender;
use Xammie\Mailbook\ResolvedMail;
use Xammie\Mailbook\Tests\Mails\TestMail;

it('can collect mail', function () {
    Event::fake();

    $mailableSender = new MailableSender(new TestMail());
    $mail = $mailableSender->collect();

    expect($mail)->toBeInstanceOf(ResolvedMail::class);

    Event::assertDispatched(MessageSending::class);
    Event::assertDispatched(MessageSent::class);
});

it('will cleanup driver', function () {
    $mailableSender = new MailableSender(new TestMail());
    $mailableSender->collect();

    expect(config('mail.default'))->not()->toBe('mailbook');
});

it('will cleanup message', function () {
    $mailableSender = new MailableSender(new TestMail());
    $mailableSender->collect();

    expect(Mailbook::getMessage())->toBeNull();
});
