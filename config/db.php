<?php

use Dotenv\Dotenv;

// Load .env file
$dotenv = Dotenv::createImmutable(basePath(''));
$dotenv->load();

// Access environment variables

return [
  "host" => $_ENV['DB_HOST'],
  "dbname" => $_ENV['DB_NAME'],
  "port" => $_ENV['DB_PORT'],
  "username" => $_ENV['DB_USER'],
  "password" => $_ENV['DB_PASS'],
];
// Example usage
// echo "Connecting to database at $dbHost...";
