<?php

if (! function_exists('assets')) {
    function assets(?string $url): string
    {
        return "/public/assets/$url";
    }
}