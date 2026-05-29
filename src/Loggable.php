<?php

declare(strict_types=1); 

interface Loggable
{
    public function getLogEntry(): string;
}   