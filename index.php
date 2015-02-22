<?php

require 'app/bootstrap.php';

// Routes
$app->get('/', function() use ($app) {
    $app->render('index.tpl.php');
});

$app->run();





