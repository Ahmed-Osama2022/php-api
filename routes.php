<?php

/**
 * Here define your routes as the following
 * Methods available => "GET" ,"POST", "PUT", "DELETE"
 * $router->method('path', 'yourController@methodIntheController', ['middlewareTypeInYourMiddlewareFramework']);
 *
 * e.g.
 * $router->get('/', 'HomeController@index', ['guest']);
 */

$router->get('/', 'HomeController@index', ['guest']);
$router->get('/hello', 'HomeController@hello', ['guest']);
