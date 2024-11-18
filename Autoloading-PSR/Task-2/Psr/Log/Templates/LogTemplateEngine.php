<?php

namespace Psr\Log\Templates;

class LogTemplateEngine implements LogTemplateInterface
{
    public function render(string $template, array $context): string
    {
        return preg_replace_callback('/\{\{\s*(.+?)\s*\}\}/', function($matches) use ($context) {
            $key = $matches[1];
            return $context[$key] ?? $matches[0];
        }, $template);
    }
}