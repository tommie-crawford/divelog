<?php

namespace App\MessageHandler;

use App\Message\DiveLogMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class DiveLogHandler
{
    public function __invoke(DiveLogMessage $message): void
    {

        foreach($message->getContent() as $content) {
            dump($content);
        }
    }
}
