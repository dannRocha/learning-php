<?php

class NotImplementedException extends Exception {
  public function __construct() {
    $this->message = sprintf("Error: %s - [%s] - Line: [%d]", self::class, $this->file, $this->line);
  }
}
