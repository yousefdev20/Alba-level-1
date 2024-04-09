<?php

if (! function_exists('config')) {
    function config(string $key)
    {
        $keys = explode('.', $key);
        $fileName = $keys[0];
        $config = include __DIR__ . '/../../../config/' . $fileName . '.php';
        unset($keys[0]);
        foreach ($keys as $k) {
            if (isset($config[$k])) {
                $config = $config[$k];
            } else {
                return null;
            }
        }
        return $config;
    }
}