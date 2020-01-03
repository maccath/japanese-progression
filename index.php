<?php

require __DIR__ . '/app/bootstrap.php';

// Routes
$app->get('/', function (\Slim\Psr7\Request $request, \Slim\Psr7\Response $response) use ($twig) {
    $levelsData = json_decode(file_get_contents(DATA_PATH . 'levels.json'));

    $data = array(
        'levels' => $levelsData,
    );

    $body = $response->getBody();

    $rendered = $twig->render('index.tpl.php', $data);

    $body->write($rendered);

    return $response;
});

$app->run();