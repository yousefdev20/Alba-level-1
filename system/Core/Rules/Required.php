<?php

class Required
{
    public function __invoke($data)
    {
        die($data);
    }
}