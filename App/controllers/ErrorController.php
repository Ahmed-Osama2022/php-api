<?php


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

    http_response_code(403);

    $errors = [
      'status' => 403,
      'message' => $message
    ];
    echo jsonData($errors);
  }
}
