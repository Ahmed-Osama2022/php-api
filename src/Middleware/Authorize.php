<?php

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
