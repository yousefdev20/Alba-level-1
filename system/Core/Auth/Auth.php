<?php

class Auth
{
    public static function attempt(array $credentials): bool
    {
        $user = User::query()->where(['email' => $credentials['email']])->select(['*'])->get();

        $isVerifiedPassword = password_verify($credentials['password'], $user[0][3]);

        if ($user && $isVerifiedPassword) {
            Session::instance()->set('user', json_encode($user));

            return true;
        }

        return false;
    }

    public static function logout(): void
    {
        Session::instance()->unsetAll();
    }
}