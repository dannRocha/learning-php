<?php

class ConnectionFactoryException extends PDOException {
  public function __construct(Exception $err) {
    $this->message = 
      sprintf("Error: %s - The connection cannot be established \n%s", 
        self::class, $err->getMessage()
      ); 
  }
}
