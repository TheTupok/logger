<?php

namespace Logger;

use DateTime;
use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

abstract class Route extends AbstractLogger implements LoggerInterface
{
    private $dateFormat = "Y-m-d H:i:s";

    public function getDate(): string
    {
        return (new DateTime())->format($this->dateFormat);
    }

    public function contextToJson(array $context = []): string
    {
        return !empty($context) ? json_encode($context) : "";
    }
}