<?php

define('APP_PATH', __DIR__ . '/./');
define('CONFIG_PATH', __DIR__ . '/config/');
define('VENDOR_PATH', __DIR__ . '/../vendor/');
define('TEMPLATES_PATH', __DIR__ . '/../templates/');
define('DATA_PATH', __DIR__ . '/../data/');

// Autoloader
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
$data = $config['data'];
