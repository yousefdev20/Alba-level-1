<?php

class Session
{
    protected static ?Session $instance = null;

    public static function instance(): static
    {
        if (! self::$instance) {
            session_start();
            session_regenerate_id();

            return self::$instance = new static();
        }

        return self::$instance;
    }

    public function get(string $key)
    {
        return $_SESSION[$key] ?? null;
    }

    public function set(string $key, mixed $data): void
    {
        $_SESSION[$key] = ($data);
    }

    public function unset(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public function unsetAll(): void
    {
        foreach ($_SESSION ?? [] as $key => $value) {
            $this->unset($key);
        }
    }
}