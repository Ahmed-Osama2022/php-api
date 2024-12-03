<?php

/**
 * This middleware file is used later in your "routes.php" file as following:
 * $router->get('/', 'HomeController@index', ['guest']);
 * 
 * You can add roles here as possible as you can
 * Now it just made for 'guest' and 'auth'
 * 
 */

namespace src\Middleware;

use App\controllers\ErrorController;
use src\Auth_token;
use src\Session;

class Authorize
{
  /**
   * Check if the user authinticated
   * @return bool
   */
  public function hasSession()
  {

    if (Session::has('user')) {
      $token = Session::get('user');
      $tokenVer = (new Auth_token())->decodeToken($token);

      return $tokenVer; //bool
    }


    return false;
    // return Session::has('user');
  }

  public function isAuth()
  {
    if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
      $authHeader = $_SERVER['HTTP_AUTHORIZATION'];
    } elseif (isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) { // Fallback for some configurations
      $authHeader = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
    }

    if (isset($authHeader) && preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
      $token = $matches[1]; // Extract the token
      $tokenVer = (new Auth_token())->decodeToken($token); // Verify the token
      return $tokenVer; //bool
    } else {
      return false;
      // exit;
    }
  }

  /**
   * Handle the user's requests
   * @param string $role
   * @return bool
   */
  public function handle($role)
  {
    if ($role === 'guest' && $this->hasSession()) {
      return redirect('/');
    } elseif ($role === 'auth' && !$this->hasSession()) {
      // return redirect('/api/login');
      ErrorController::unauthorized();
      exit;
    } elseif ($role === 'admin' && !$this->isAuth()) {
      http_response_code(401);
      // return redirect('/api/login');
      ErrorController::unauthorized();
      exit;
    }
  }
}
