<?php

namespace Lib;


class Router {
  
  public const GET_METHOD = 'GET';
  public const POST_METHOD = 'POST';

  protected static array $ROUTER = [
    self::GET_METHOD => [],
    self::POST_METHOD => []
  ];


  public static function get(string $uri, callable $fn) {
    
    if(!array_key_exists($uri, self::$ROUTER[self::GET_METHOD])) {

      self::$ROUTER[self::GET_METHOD][self::standardizeURL($uri)] = fn() => 
        $fn($_GET);

    }
  }

  public static function post(string $uri, callable $fn) {
    
    if(!array_key_exists($uri, self::$ROUTER[self::POST_METHOD])) {

      self::$ROUTER[self::POST_METHOD][self::standardizeURL($uri)] = fn() => 
        $fn(file_get_contents( 'php://input' ), true );

    } 
  }

  public static function use(string $class) {
    new $class();
  }

  private static function standardizeURL(string $uri): string {
    if(substr($uri, strlen($uri) - 1, 1) === "/" && strlen($uri) > 1) {
      $uri = substr($uri, 0, -1);
    }

    return strtoupper($uri);
  }


  public static function run() {
      
      $uri = self::standardizeURL($_SERVER['REQUEST_URI']);

      $requestMethod = $_SERVER['REQUEST_METHOD'];
  
      if(array_key_exists($uri, self::$ROUTER[$requestMethod])) {
        self::$ROUTER[$requestMethod][$uri]();
      }
      else {
        self::$ROUTER[self::GET_METHOD]['/NOTFOUND']();
      }

  }

}