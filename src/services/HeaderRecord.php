<?php

namespace pro100rost\pdo\src\services;

class HeaderRecord
{
    private $headers = [
        200 => 'HTTP/1.1 200 OK',
        201 => 'HTTP/1.1 201 Created',
        202 => 'HTTP/1.1 202 Accepted',
        301 => 'HTTP/1.1 301 Moved Permanently',
        401 => 'HTTP/1.1 401 Unauthorized',
        403 => 'HTTP/1.1 403 Forbidden',
        404 => 'HTTP/1.1 404 Not Found',
        422 => 'HTTP/1.1 422 Unprocessable Entity',
        500 => 'HTTP/1.1 500 Internal Server Error',
    ];

    /**
     * @param int $code
     *
     * @return void
     */
    public function record(int $code = 0): void
    {
        header($this->headers[$code] ?? '');
    }
}