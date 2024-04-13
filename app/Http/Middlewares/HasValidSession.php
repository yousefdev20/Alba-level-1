<?php

require_once __DIR__ . '/../../../system/Core/Helpers/config.php';
require_once __DIR__ . '/../../../system/Core/Session/Session.php';

class HasValidSession extends Middleware
{
    public function handel(): bool
    {
        $sessionLifeTime = config('session.lifetime');

        $sessionInstance = Session::instance()->get('session_created_at');

        if (abs(($sessionInstance - time()) / 60) < $sessionLifeTime) {
            return true;
        }

        redirect(route('auth.login.show'), with: ['auth.message' => 'The session has been expired.']);

        return false;
    }
}