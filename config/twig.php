<?php

use App\Twig\Extensions\Percentage;
use Twig\Environment;
use Twig\Extra\Html\HtmlExtension;
use Twig\Loader\FilesystemLoader;

$templateDirectory = __DIR__ . '/../templates/';

// Initialise Twig
$twig = new Environment(new FilesystemLoader($templateDirectory));

// Set up Twig extensions
$twig->addExtension(new Percentage());
$twig->addExtension(new HtmlExtension());

$data = require_once __DIR__ . '/data.php';

// Set up global data in Twig
foreach ($data as $key => $value) {
    $twig->addGlobal($key, $value);
}

return $twig;