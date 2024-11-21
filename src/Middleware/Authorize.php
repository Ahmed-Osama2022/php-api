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

use src\Session;

class Authorize
{
  /**
   * Check if the user authinticated
   * @return bool
   */
  public function isAuthenticated()
  {
    return Session::has('user');
  }
  /**
   * Handle the user's requests
   * @param string $role
   * @return bool
   */
  public function handle($role)
  {
    if ($role === 'guest' && $this->isAuthenticated()) {
      return redirect('/');
    } elseif ($role === 'auth' && !$this->isAuthenticated()) {
      return redirect('/auth/login');
    }
  }
}
