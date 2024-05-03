<?php

class Required
{
    public mixed $data = [];

    public mixed $fail = [];

    public function __invoke($data): void
    {
        if (array_values($data)[0]) {
            $this->data[] = $data;
        } else {
            $this->fail[] = [array_keys($data)[0] => array_keys($data)[0] . 'is required'];
        }
    }
}