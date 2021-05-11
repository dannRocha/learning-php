<?php

namespace Exceptions;

class ConnectionFactoryException extends \PDOException {
  public function __construct(\Exception $err) {
    $this->message = 
      sprintf("Error: %s - The connection cannot be established in %d - [%s]\n%s: ", 
        self::class, $this->line, $this->file, $err->getMessage()
      ); 
  }
}
