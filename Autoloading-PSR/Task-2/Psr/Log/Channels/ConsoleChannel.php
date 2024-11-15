<?php
declare(strict_types = 1);

namespace Psr\Log\Channels;

class ConsoleChannel implements LogChannelInterface
{
    public function write($level, $message): void
    {
        echo "[$level] $message\n";
    }
}