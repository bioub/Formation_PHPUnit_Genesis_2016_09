<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;


define('PROJECT_PATH', dirname(__DIR__));

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';


AnnotationRegistry::registerLoader([$loader, 'loadClass']);

return $loader;
