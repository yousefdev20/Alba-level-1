<?php

class AuthController extends BaseController
{

    public function showLogin(): void
    {
        $message = Session::instance()->get('auth.message');

        view('auth/login', with: ['authMessage' => $message]);
    }
    public function login(Request $request): void
    {
        if (! Auth::attempt($request->only(['email', 'password']))) {
            redirect(route('auth.login.show'), with: ['auth.message' => "credentials don't match our records."]);
            return;
        }

        redirect(route('admin.index'));
    }

    public function logout(): void
    {
        Auth::logout();

        redirect(route('auth.login.show'));
    }

    public function showRegister(): void
    {
        view('auth/register');
    }

    public function register(Request $request): void
    {
        $password = password_hash($request->password, config('auth.algo'));

        User::query()->insert($request->only(['name', 'email']) + compact(['password']));

        redirect(route('auth.login.show'), with: ['auth.message' => '']);
    }
}