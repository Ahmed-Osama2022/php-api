<?php
require __DIR__ . '/../vendor/autoload.php';

use Framework\Session;

Session::start();

require '../helpers.php';

use Framework\Router;

// echo "Hello world!";

$router = new Router();

require basePath('routes.php');

// Using Router
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->resolve($uri);
