<?php

define('APP_PATH', __DIR__ . '/./');
define('CONFIG_PATH', __DIR__ . '/config/');
define('VENDOR_PATH', __DIR__ . '/../vendor/');
define('TEMPLATES_PATH', __DIR__ . '/../templates/');
define('DATA_PATH', __DIR__ . '/../data/');

// Autoloading
spl_autoload_extensions(".php");
spl_autoload_register();
require VENDOR_PATH . 'autoload.php';

// Configuration
$config = array();
foreach (glob(CONFIG_PATH . '*.php') as $configFile) {
    require $configFile;
}

// Initialise view
$view = new \Slim\Views\Twig();
$view->parserDirectory = 'Twig';
$config['slim']['view'] = $view;

// Initialise application
$app = new \Slim\Slim($config['slim']);

// Set up Twig globals
$view->setTemplatesDirectory($app->config('templates.path'));
foreach ($config['data'] as $key => $value) {
    $view->getInstance()->addGlobal($key, $value);
}

// Set up Twig extensions
$view->getInstance()->addExtension(new \Slim\Views\TwigExtension());
$view->getInstance()->addExtension(new \App\Views\TwigExtension());



