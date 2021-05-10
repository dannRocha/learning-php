<?php

class ConnectionFactoryException extends Exception {
  public function __construct() {
    $this->message = 
      sprintf("Error: %s - The connection cannot be established - File: [%s] - Line: [%d]", 
        self::class, $this->file, $this->line 
      ); 
  }
}
