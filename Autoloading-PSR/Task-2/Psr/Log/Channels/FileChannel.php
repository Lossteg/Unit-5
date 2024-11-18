<?php

namespace Psr\Log\Channels;

class FileChannel implements LogChannelInterface
{
    private string $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function write($level, $message): void
    {
        $logEntry = " [$level] $message\n";

        $directory = dirname($this->filePath);

        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        if (!file_exists($this->filePath)) {
            touch($this->filePath);
            chmod($this->filePath, 0666);
        }

        file_put_contents($this->filePath, $logEntry, FILE_APPEND);
    }
}
