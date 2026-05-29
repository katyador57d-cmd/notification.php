<?php

declare(strict_types=1); 

class UrgentNotification extends Notification
{
    public function getFormattedBody(): string
    {
        return "[URGENT] " . $this->message ;
    }

    public function getPriorityLabel(): string
    {
        return 'Urgent';
    }
}