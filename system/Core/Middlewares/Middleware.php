<?php

require_once __DIR__ . '/../../../app/Models/User.php';

class Middleware
{
    public function user()
    {
        return Session::instance()->get('user');
    }
}