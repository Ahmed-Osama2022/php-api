<?php

namespace App\controllers;

use src\Database;

class HomeController
{

  protected $db;

  public function __construct()
  {
    $config = require basePath('config/db.php');
    // Start a database connection:
    $this->db = new Database($config);
  }

  // NOTE: Please don't remove this, because it's made for you in order to be able to test your app.
  public function index()
  {
    // echo "hello world";
    loadView('welcomePage');
  }

  public function test()
  {
    $data = [
      "id" => 1,
      'data' => 'Hello from test route'
    ];
    echo jsonData($data);
  }
  // Start code here...
}
