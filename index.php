<?php

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

const DATA_PATH = __DIR__ . '/data/';

$twig = require_once __DIR__ . '/config/twig.php';

// Initialise application
$app = AppFactory::create();

// Routes
$app->get('/', function (Request $request, Response $response) use ($twig) {
    $levelsData = json_decode(file_get_contents(DATA_PATH . 'levels.json'));

    $data = [
        'levels' => $levelsData,
    ];

    $body = $response->getBody();

    $body->write($twig->render('index.tpl.html', $data));

    return $response;
});

$app->run();