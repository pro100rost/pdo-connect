<?php

namespace pro100rost\pdo\src\services;

use Throwable;

class ErrorRecord extends \Exception
{
    private $fullDate;

    /**
     * ErrorRecord constructor.
     *
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->fullDate = date('d.m.Y G:i:s') . ' (GMT ' . str_replace(0, '', date('O')) . ')';
    }

    /**
     * @param string $data
     *
     * @return void
     */
    public function recordError(string $data): void
    {
        $filename = __DIR__ . '/../../../../../error.log';
        file_put_contents($filename, $this->fullDate . ' -> ' . $data . PHP_EOL, FILE_APPEND);
    }
}