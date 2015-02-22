<?php

require 'app/bootstrap.php';

// Routes
$app->get('/', function() use ($app) {
    echo "Hello, world!";

});

$app->run();





