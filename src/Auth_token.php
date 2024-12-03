<?php

namespace src;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use Dotenv\Dotenv;


class Auth_token
{
  protected $secretKey = '';

  public function __construct()
  {
    // Load .env file
    $dotenv = Dotenv::createImmutable(basePath(''));
    $dotenv->load();

    $this->secretKey = $_ENV['AUTH_KEY'];
    // inspectAndDie($this->secretKey);
  }

  public function encodeToken($user)
  {

    // inspectAndDie($this->secretKey);

    // Define the payload
    $payload = [
      'iss' => 'http://localhost', // Issuer
      'aud' => '', // Audience
      'iat' => time(), // Issued at
      // 'exp' => time() + 12, // Expiration time (2 weeks)
      'exp' => time() + 1209600, // Expiration time (2 weeks)
      'sub' => $user,           // Subject (user ID)
    ];

    // Generate the token
    $jwt = JWT::encode($payload, $this->secretKey, 'HS256');

    // Return response with token
    return $jwt;
  }

  public function decodeToken($token)
  {

    // For recevied token
    $jwt = $token; // Token from the client
    $secretKey = $this->secretKey;

    try {
      // Verify the token (it throws an exception if invalid)
      JWT::decode($jwt, new Key($secretKey, 'HS256'));

      // If no exception is thrown, the token is valid
      return true;
      // http_response_code(200);
      // echo json_encode(['message' => 'Token is valid']);
    } catch (\Exception $e) {
      // Handle invalid token
      return false;
      // http_response_code(401);
      // echo json_encode(['error' => 'Unauthorized', 'message' => $e->getMessage()]);
    }
  }
}
