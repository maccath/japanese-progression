<?php

use App\Twig\Extensions\Percentage;
use Slim\Factory\AppFactory;
use Twig\Environment;
use Twig\Extra\Html\HtmlExtension;
use Twig\Loader\FilesystemLoader;

require __DIR__ . '/../vendor/autoload.php';

define('DATA_PATH', __DIR__ . '/../data/');

// Configuration
$config = [];
foreach (glob(__DIR__ . '/config/*.php') as $configFile) {
    require $configFile;
}

// Initialise application
$app = AppFactory::create();

// Initialise Twig
$twig = new Environment(new FilesystemLoader(__DIR__ . '/../templates/'));

// Set up Twig globals
foreach ($config['data'] as $key => $value) {
    $twig->addGlobal($key, $value);
}

// Set up Twig extensions
$twig->addExtension(new Percentage());
$twig->addExtension(new HtmlExtension());