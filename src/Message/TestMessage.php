<?php

namespace App\Message;

final class TestMessage
{
    public function __construct(
        private string $content
    ) {
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
