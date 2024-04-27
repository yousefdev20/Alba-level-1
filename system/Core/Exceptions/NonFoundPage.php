<?php

class NonFoundPage extends Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        http_response_code(404);
        die(require_once __DIR__ . '/../Views/NotFoundPage.php');
    }
}