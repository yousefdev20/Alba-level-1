<?php

if (! function_exists('redirect')) {

    /**
     * @param string|null $url
     * @param array<string, mixed> $with
     * @return void
     */
    function redirect(?string $url, array $with = []): void
    {
        foreach ($with as $key => $value) {
            Session::instance()->set($key, $value);
        }

        header("Location: $url");
    }
}