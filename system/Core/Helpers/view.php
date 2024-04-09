<?php

if (! function_exists('view')) {

    /**
     * @param string $view
     * @param array<string, mixed> $with
     * @return void
     */
    function view(string $view, array $with = []): void
    {
        foreach ($with as $key => $value) {
            ${$key} = $value;
        }

        include_once __DIR__ . "/../../../resources/views/$view.php";
    }
}