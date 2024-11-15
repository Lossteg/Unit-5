<?php

namespace Psr\Log;

interface LoggerInterface
{
    public function error($message, array $context = array()): void;
    public function warning($message, array $context = array()): void;
    public function info($message, array $context = array()): void;
    public function debug($message, array $context = array()): void;
    public function log($level, $message, array $context = array()): void;
}
