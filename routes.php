<?php

/**
 * Here define your routes as the following
 * Methods available => "GET" ,"POST", "PUT", "DELETE" => "CRUD operations"
 * $router->method('path', 'yourController@methodIntheController', ['middlewareTypeInYourMiddlewareFramework']);
 * ----------------------------------------------------------------------------
 * e.g.
 * $router->get('/', 'HomeController@index', ['guest']);
 * ----------------------------------------------------------------------------- 
 * For Params
 * e.g.
 * $router->get('/products/{id}', 'HomeController@edit');
 */
// For the TEST
$router->get('/', 'HomeController@index', ['guest']);
$router->get('/test', 'HomeController@test', ['guest']);
// Start making your routes here...