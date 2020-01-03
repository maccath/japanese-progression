<?php

use App\Views\TwigExtension;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

define('APP_PATH', __DIR__ . '/./');
define('CONFIG_PATH', __DIR__ . '/config/');
define('VENDOR_PATH', __DIR__ . '/../vendor/');
define('TEMPLATES_PATH', __DIR__ . '/../templates/');
define('DATA_PATH', __DIR__ . '/../data/');

// Configuration
$config = array();
foreach (glob(CONFIG_PATH . '*.php') as $configFile) {
    require $configFile;
}

// Initialise application
$app = AppFactory::create();

// Initialise Twig
$loader = new \Twig\Loader\FilesystemLoader(TEMPLATES_PATH);
$twig = new \Twig\Environment($loader);

// Set up Twig globals
foreach ($config['data'] as $key => $value) {
    $twig->addGlobal($key, $value);
}

// Set up Twig extensions



$twig->addExtension(new TwigExtension());
