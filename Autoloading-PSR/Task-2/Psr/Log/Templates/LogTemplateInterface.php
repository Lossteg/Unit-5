<?php

namespace Psr\Log\Templates;

interface LogTemplateInterface
{
    public function render(string $template, array $context): string;
}
