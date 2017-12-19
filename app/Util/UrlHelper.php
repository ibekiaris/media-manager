<?php

namespace App\Util;

class UrlHelper
{
    public static function removeQuery($uri): string
    {
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }

        return rawurldecode($uri);
    }
}
