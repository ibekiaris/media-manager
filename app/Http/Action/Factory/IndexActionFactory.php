<?php

namespace App\Http\Action\Factory;

use App\Http\Action\IndexAction;
use Psr\Container\ContainerInterface;

class IndexActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new IndexAction();
    }
}
