<?php

use App\controllers\ErrorController;

/**
 * Get the base path
 */

function basePath($path = '')
{
  return __DIR__ . '/' . $path;
}

/**
 * Inspect a value
 * To check your code while you're working...
 */

function inspect($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
}

/**
 * Inspect a value and kill the whole code after it
 * To check your code while you're working...
 */
function inspectAndDie($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  die();
}
/**
 * Load a view
 */

function loadView($name, $data = [])
{
  $viewPath =  basePath("App/views/{$name}.view.php");

  // inspect($viewPath);
  if (file_exists($viewPath)) {
    extract($data);
    require $viewPath;
  } else {
    // echo "View {$name} not Found!";
    $name_trimmed = trim($name, '/');
    // inspectAndDie($name_trimmed);
    ErrorController::notFound("View '{$name_trimmed}' not Found!");
  }
}

/**
 * Sanitize Data
 * Add more layer for security
 * 
 * @param string $dirty
 * @return string
 */
function sanitize($dirty)
{
  return filter_var(trim($dirty), FILTER_SANITIZE_SPECIAL_CHARS);
}

/**
 * Redirect to a given url
 * 
 * @param string $url
 * @return void
 */
function redirect($url)
{
  header("Location: {$url}");
  exit;
}
/**
 * For the API
 * @param array $data
 * @return array "json"
 */
function jsonData($data = [])
{
  // Set response header
  header('Content-Type: application/json');

  // Return JSON-encoded data
  return json_encode($data);
}
