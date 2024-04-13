<?php

require_once __DIR__ . '/../../../app/Models/User.php';

abstract class Middleware
{
    public function user()
    {
        return Session::instance()->get('user');
    }

    public abstract function handel(): bool;

}