<?php

return function (\App\Application $application) {
    $application->getRouter()->get('/', function () {
        echo('Welcome!');
    });
};
