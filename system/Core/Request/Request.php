<?php

class Request
{
    private array $data = [];

    public function __construct()
    {
        foreach ($_REQUEST as $key => $value) {
            $this->data[$key] = $value;
        }
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        return null;
    }

    public function only(array $keys): array
    {
        $data = [];

        foreach ($this->data as $key => $value)
        {
            if (in_array($key, $keys)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    public function all(): array
    {
        return $this->data;
    }

    public function hasFile(string $file): bool
    {
        return $_FILES[$file] ?? false;
    }
}