<?php

$loader = new \Phalcon\Loader();

$loader->registerNamespaces(
    [
        'App\Controllers' =>  '../app/controllers/',
        'App\Forms' =>  '../app/forms/',
        'App\Models' =>  '../app/models/',
        'App\Models\Services' =>  '../app/models/services/',
        'App\Models\Repositories' =>  '../app/models/repositories/',
    ]
);

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->formsDir,
        $config->application->repositoriesDir,
        $config->application->servicesDir,
        $config->application->baseUri,
    ]
)->register();
