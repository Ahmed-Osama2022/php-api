<?php

namespace src;

use App\controllers\ErrorController;
use src\Middleware\Authorize;

class Router
{
  protected $routes = [];

  public function registerRoute($method, $uri, $action, $middleware)
  {
    list($controller, $controllerMethod) = explode('@', $action);

    $this->routes[] = [
      "method" => $method,
      "uri" => $uri,
      "controller" => $controller,
      "controllerMethod" => $controllerMethod, // NOTE: NEW!
      "middleware" => $middleware
    ];
  }

  /**
   * @methods 
   * 
   */
  public function get($uri, $controller, $middleware)
  {
    $this->registerRoute('GET', $uri, $controller, $middleware);
  }
  public function post($uri, $controller, $middleware)
  {
    $this->registerRoute('POST', $uri, $controller, $middleware);
  }
  public function put($uri, $controller, $middleware)
  {
    $this->registerRoute('PUT', $uri, $controller, $middleware);
  }
  public function delete($uri, $controller, $middleware)
  {
    $this->registerRoute('DELETE', $uri, $controller, $middleware);
  }


  /**
   * Handling the routers
   * Or we should call it =>> "Route the request"
   * Loop all over the routes array to check if the type request match the array and if it doesn;t!!
   */
  public function resolve($uri)
  {
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    // NOTE: Check for _method input 
    if ($requestMethod === 'POST' && isset($_POST['_method'])) {
      // Override the request method with the value of _method
      $requestMethod = strtoupper($_POST['_method']);
    }


    foreach ($this->routes as $route) {
      // Split the current URI into segments
      $uriSegments = explode('/', trim($uri, '/'));
      // inspectAndDieDie($uriSegments);

      // Split the route URI into segments
      $routeSegments = explode('/', trim($route['uri'], '/'));

      // Check if the number of segments matches
      if (count($uriSegments) === count($routeSegments) && strtoupper($route['method'] === $requestMethod)) {
        $params = [];

        $match = true;

        for ($i = 0; $i < count($uriSegments); $i++) {
          // If the uri's do not match and there is no param
          if ($routeSegments[$i] !== $uriSegments[$i] && !preg_match('/\{(.+?)\}/', $routeSegments[$i])) {
            $match = false;
            break;
          }

          // Check for the param and add to "$params" array
          if (preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
            // echo "Matches" .  inspectAndDie($matches);
            $params[$matches[1]] = $uriSegments[$i];
          }
        }

        if ($match) {
          // Start looking for middlewares...
          foreach ($route['middleware'] as $middleware) {
            (new Authorize())->handle($middleware);
          }


          $controller = 'App\\controllers\\' . $route['controller'];
          $controllerMethod = $route['controllerMethod'];

          // Instatiate the controller and call the method
          $controllerInstance = new $controller();
          $controllerInstance->$controllerMethod($params);
          return;
        }
      }
    }

    ErrorController::notFound();
  }
}
