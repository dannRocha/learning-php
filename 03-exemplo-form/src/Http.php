<?php

class Http {

  private const HEADER_JSON = "Content-type: application/json; charset=utf-8";
  public const CREATED = [ 'type' => 'Created', 'code' => 201];
  public const SEE_OTHER = [ 'type' => 'See Other', 'code' => 303];
  public const BAD_REQUEST = [ 'type' => 'Bad Request', 'code' => 400];
  
  public const GET_METHOD = 'GET';
  public const POST_METHOD = 'POST';

  public static function responseJSON(array $status, array $message): void {
    $response = json_encode([
      'status' => $status,
      'response' => $message
    ]);

    http_response_code($status['code']);
    header(self::HEADER_JSON);
    echo $response;
    exit;
  }

}