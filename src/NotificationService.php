<?php

declare(strict_types=1); 

class NotificationService
{
    private array $logs = [];

    public function sendNotification(Sendable $channel, Notification $notification): bool
    {
        $result = $channel->send($notification);

        if ($channel instanceof Loggable) {
            $this->logs[] = $channel->getLogEntry();
        }
        return $result;
    }

    public function getLogs(): array
    {
        return $this->logs;
    }
}   