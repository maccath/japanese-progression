<?php

define('APP_PATH',    __DIR__.'/./');
define('CONFIG_PATH', __DIR__.'/config/');
define('VENDOR_PATH', __DIR__.'/../vendor/');

// Autoloader
require VENDOR_PATH.'autoload.php';

// Configuration
$config = array();
foreach (glob(CONFIG_PATH.'*.php') as $configFile) {
    require $configFile;
}

// Initialise view
$view = new \Slim\Views\Twig();
$view->parserDirectory = 'Twig';

// Initialise application
$app = new \Slim\Slim(array(
    'view'   => $view,
    'config' => $config,
));