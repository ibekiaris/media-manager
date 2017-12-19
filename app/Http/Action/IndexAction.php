<?php

namespace App\Http\Action;

use Psr\Http\Message\RequestInterface;

class IndexAction
{
    public function __invoke(RequestInterface $request)
    {
        echo 'Welcome to media manager';
    }
}
