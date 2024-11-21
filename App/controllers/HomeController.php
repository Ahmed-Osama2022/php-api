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

  public function index()
  {
    // echo "hello world";
    loadView('welcomePage');
  }

  public function hello()
  {
    $data = [
      "id" => 4,
      'name' => 'Ahmed Osama'
    ];
    echo jsonData($data);
  }
}
