<?php

/**
 * Here define your routes as the following
 * Methods available => "GET" ,"POST", "PUT", "DELETE" => "CRUD operations"
 * $router->method('path', 'yourController@methodIntheController', ['middlewareTypeInYourMiddlewareFramework']);
 *
 * e.g.
 * $router->get('/', 'HomeController@index', ['guest']);
 */

$router->get('/', 'HomeController@index', ['guest']);
$router->get('/test', 'HomeController@test', ['guest']);
