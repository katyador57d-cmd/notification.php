<?php

declare(strict_types=1); 

interface Sendable
{
    public function send(Notification $notification): bool;
    
    public function getChannelName(): string;
}