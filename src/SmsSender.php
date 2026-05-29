<?php

declare(strict_types=1); 

class SmsSender implements Sendable, Loggable
{
    private string $lastLogEntry;

    public function send(Notification $notification): bool
    {
        $this->lastLogEntry = "Sms была отправлена: " . $notification->recipient . ': ' . $notification->getFormattedBody();

        echo $this->lastLogEntry . "\n";
        return true;
    }

    public function getChannelName(): string
    {
        return 'sms';
    }

    public function getLogEntry(): string
    {
      return $this->lastLogEntry;
    }
}