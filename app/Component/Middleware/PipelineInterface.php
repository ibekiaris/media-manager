<?php

namespace App\Component\Middleware;

interface PipelineInterface
{
    public function pipe($middleware);
}
