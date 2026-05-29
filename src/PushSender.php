<?php

declare(strict_types=1); 

class PushSender implements Sendable, Loggable
{
    private string $lastLogEntry;

    public function send(Notification $notification): bool
    {
        $this->lastLogEntry = "Push был отправлен: " . $notification->recipient . ': ' . $notification->getFormattedBody();

        echo $this->lastLogEntry . "\n";
        return true;
    }

    public function getChannelName(): string
    {
        return 'Push';
    }

    public function getLogEntry(): string
    {
      return $this->lastLogEntry;
    }
}