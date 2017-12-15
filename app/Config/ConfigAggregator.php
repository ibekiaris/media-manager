<?php

namespace App\Config;

class ConfigAggregator
{
    public static function aggregate($configPath): array
    {
        $files = glob("$configPath/*.php");

        return  call_user_func_array('array_merge', array_map(function($filename) {
            return [basename($filename, '.php') => include $filename];
        }, $files));
    }
}
