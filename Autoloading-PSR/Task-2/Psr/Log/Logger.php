<?php

declare(strict_types = 1);

namespace Psr\Log;

use Psr\Log\Channels\LogChannelInterface;
use Psr\Log\Templates\LogTemplateInterface;

class Logger implements LoggerInterface
{
    private array $channels = [];
    private array $templates;
    private LogTemplateInterface $logTemplate;

    public function __construct (LogTemplateInterface $logTemplate)
    {
        $this->logTemplate = $logTemplate;
        $this->templates = [
            'default' => '{{ time  }} {{ message }}',
            'error' => '{{ time  }} {{ message }} (Error code: {{ code }})',
            'user' => '{{ time  }} User {{ username }}: {{ message }}',
            'performance' => '{{ time  }} {{ message }} (Execution time: {{ time }}ms)'
        ];
    }

    public function addChannel(LogChannelInterface $channel): void
    {
        $this->channels[] = $channel;
    }

    public function setTemplate(string $name, string $template): void
    {
        $this->templates[$name] = $template;
    }

    public function error($message, array $context = []): void
    {
        $this->log('error', $message, $context);
    }

    public function warning($message, array $context = []): void
    {
        $this->log('warning', $message, $context);
    }

    public function info($message, array $context = []): void
    {
        $this->log('info', $message, $context);
    }

    public function debug($message, array $context = []): void
    {
        $this->log('debug', $message, $context);
    }

    public function log($level, $message, array $context = []): void
    {
        $templateName = $context['_template'] ?? 'default';
        unset($context['_template']);

        $formattedMessage = $this->formatMessage($templateName, $level, $message, $context);

        foreach ($this->channels as $channel) {
            $channel->write($level, $formattedMessage);
        }
    }

    private function formatMessage(string $templateName, string $level, string $message, array $context): string
    {
        $template = $this->templates[$templateName] ?? $this->templates['default'];
        $currentTime = date('Y-m-d H:i:s');

        $contextWithTimeAndLevel = array_merge($context, [
            'time' => $currentTime,
            'message' => $message
        ]);

        return $this->logTemplate->render($template, $contextWithTimeAndLevel);
    }
}