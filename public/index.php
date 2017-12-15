<?php

require_once "../vendor/autoload.php";

$applicationConfig = \App\Config\ConfigAggregator::aggregate(dirname(__DIR__) . '/config');

$container = new \Zend\ServiceManager\ServiceManager($applicationConfig['services']);
$container->setService('config', $applicationConfig);

$application = new \App\Application($container);

$application->handle(\Zend\Diactoros\ServerRequestFactory::fromGlobals());
