<?php

use Slim\Psr7\Request;
use Slim\Psr7\Response;

require __DIR__ . '/app/bootstrap.php';

// Routes
$app->get('/', function (Request $request, Response $response) use ($twig) {
    $levelsData = json_decode(file_get_contents(DATA_PATH . 'levels.json'));

    $data = [
        'levels' => $levelsData,
    ];

    $body = $response->getBody();

    $body->write($twig->render('index.tpl.php', $data));

    return $response;
});

$app->run();