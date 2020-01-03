<?php

require __DIR__ . '/app/bootstrap.php';

// Routes
$app->get('/', function () use ($app) {
    $levelsData = json_decode(file_get_contents(DATA_PATH . 'levels.json'));

    $data = array(
        'levels' => $levelsData,
    );

    $app->render('index.tpl.php', $data);
});

$app->run();