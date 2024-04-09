<?php

class IsAuthenticated extends Middleware
{
    public function handel(): bool
    {
        if (! is_null($this->user())) {
            return true;
        }

        redirect(route('auth.login.show'), with: ['message' => '403 Unauthenticated.']);

        return false;
    }
}