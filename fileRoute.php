<?php

namespace Logger\Routes;

use Logger\Route;

class FileRoute extends Route
{
    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function log($level, $message, array $context = [])
    {
        $templateText = "(date) [level] message context";

        file_put_contents($this->filePath, strtr(
                $templateText, [
                    'date' => $this->getDate(),
                    'level' => $level,
                    'message' => $message,
                    'context' => $this->contextToJson($context),
                ]
            ) . PHP_EOL, FILE_APPEND);
    }
}