<?php

if (! function_exists('env')) {
    function env(string $key, ?string $default = null): ?string
    {
        $envDirectory = __DIR__ . "/../../../.env";
        if (file_exists($envDirectory)) {
            $env = file_get_contents($envDirectory);
            $lines = explode("\n", $env);

            foreach ($lines as $line) {
                preg_match("/([^#]+)\=(.*)/", $line, $matches);
                if (isset($matches[2])) {
                    putenv(trim(str_replace('"', '', $line)));
                }
            }

            return getenv($key) ?: $default;
        }

        return null;
    }
}