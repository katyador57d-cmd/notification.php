<?php

declare(strict_types=1); 

abstract class Notification 
{
    public readonly string $recipient;
    public readonly string $message;

    public function __construct(string $recipient, string $message)
    {
        if (empty ($recipient) || empty ($message)) {
            throw new InvalidArgumentException('Recipient or message can not be empty.');
        }

        $this->recipient = $recipient;
        $this->message = $message;
    }

    abstract public function getFormattedBody(): string;
    
    abstract public function getPriorityLabel(): string;
}