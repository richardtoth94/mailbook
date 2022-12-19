<?php

namespace Xammie\Mailbook;

use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractTransport;
use Symfony\Component\Mime\MessageConverter;
use Xammie\Mailbook\Facades\Mailbook as MailbookFacade;

class MailbookTransport extends AbstractTransport
{
    protected function doSend(SentMessage $message): void
    {
        $email = MessageConverter::toEmail($message->getOriginalMessage());

        MailbookFacade::setMessage($email);
    }

    public function __toString(): string
    {
        return 'mailbook';
    }
}
