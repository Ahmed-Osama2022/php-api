<?php

/**
 * This file is resposible for handling the errors.
 * You can add more if you like, and use it later.
 */

namespace App\controllers;


class ErrorController
{

  public static function notFound($message = 'Resource not found!')
  {
    http_response_code(404);

    $errors = [
      'status' => 404,
      'message' => $message
    ];
    echo jsonData($errors);
  }

  public static function unauthorized($message = 'You are not unauthorized to see this resource!')
  {

    http_response_code(401);

    $errors = [
      'status' => 401,
      'message' => $message
    ];
    echo jsonData($errors);
  }
  public static function not_Acceptable($message = 'This is not acceptable method or resorce')
  {

    http_response_code(406);

    $errors = [
      'status' => 406,
      'message' => $message
    ];
    echo jsonData($errors);
  }
  public static function req_failed($message = 'Failed to make the request, maybe due to internal server error.')
  {

    http_response_code(500);

    $errors = [
      'status' => 500,
      'message' => $message
    ];
    echo jsonData($errors);
  }
  // 
}
