<?php

/**
 * This file is resposible for dealing with Session at the server-side.
 * It also contains a flash messages you could use it later to send it to the client.
 */

namespace src;

class Session
{
  /**
   * Start the session
   */

  public static function start()
  {
    // At first let's make sure there is no session is started!

    /**
     * NOTE: session_status => return a number 0, 1, 2 
     * PHP_SESSION_NONE => 0
     * PHP_SESSION_ACTIVE => 1
     * PHP_SESSION_DISABLED => 2
     * 
     */
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
  }

  /**
   * Set a session key/value pair
   * @param string $key
   * @param mixed $value
   * @return void
   */
  public static function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }


  /**
   * Get a session value by the key
   * @param string $key
   * @param mixed $default
   * @return mixed
   */
  public static function get($key, $default = null)
  {
    // $_SESSION[$key] = $default;
    return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
  }

  /**
   * Check if session key exists
   * 
   * @param string $key
   * @return bool
   */
  public static function has($key)
  {
    return isset($_SESSION[$key]);
  }

  /** 
   * Clear session by key
   * 
   * @param string $key
   * @return void
   */
  public static function clear($key)
  {
    if (isset($_SESSION[$key])) {
      unset($_SESSION[$key]);
    }
  }

  /**
   * Clear all session data
   * 
   * @return void
   */
  public static function clearAll()
  {
    session_unset();
    session_destroy();
  }

  /**
   * Set a flash message 
   * 
   * @param string $key
   * @param string $message 
   * @return void
   */
  public static function setFlashMessage($key, $message)
  {
    self::set('flash_' . $key, $message);
  }

  /**
   * Get a flash message and unset 
   */
  public static function getFlashMessage($key, $default = null)
  {
    $message = self::get('flash_' . $key, $default);
    self::clear('flash_' . $key);
    return $message;
  }
}
