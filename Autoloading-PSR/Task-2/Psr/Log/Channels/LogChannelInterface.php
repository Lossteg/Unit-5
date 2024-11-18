<?php

namespace Psr\Log\Channels;

interface LogChannelInterface
{
    public function write($level, $message);
}