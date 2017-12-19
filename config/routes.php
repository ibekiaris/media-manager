<?php

return function (\App\Application $application) {
    $application->getRouter()->get('/', \App\Http\Action\IndexAction::class);
};
