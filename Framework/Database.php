<?php

/**
 * NOTE: 
 * You have to spicify the namespace here 
 * In order for "psr-4" autoloader to work
 */

namespace Framework;

use PDO;
use PDOException;
use Exception;

class Database
{
  public $conn;

  /**
   * Contructor for Database Class
   */

  //  NOTE: $config =>> is an array!
  public function __construct($config = [])
  {
    $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";
    // echo $dsn;

    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      // OR => for a object notation >> usign it later as "$listing->title"
      // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    ];


    try {
      $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
      // echo "Connected to DB!";
    } catch (PDOException $e) {
      throw new Exception("Database connection error: {$e->getMessage()}");
    }
  }
  // ==================== END OF CONSTRUCT ================== //

  /**
   * Query the Database
   */
  public function query($query, $params = [])
  {
    // NOTE: Remember in the prepared statment we used a PDO instance to call "$pdo->prepare()"!
    // Here the PDO connection is the "$conn" property!

    try {
      $sth = $this->conn->prepare($query);

      // Bind named params...
      foreach ($params as $param => $value) {
        $sth->bindValue(':' . $param, $value);
      }


      $sth->execute();
      return $sth;
    } catch (PDOException $e) {
      throw new Exception("Query failed to execute: {$e->getMessage()}");
    }
  }
}
