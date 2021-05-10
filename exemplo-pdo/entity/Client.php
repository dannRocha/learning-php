<?php

class Client {

  private string $name;
  private string $email;

  public function __construct(string $name, string $email) {
    $this->setName($name);
    $this->setEmail($email);
  }
  
  public function getName(): string {
    return $this->name;
  }

  public function setName(string $name): void {
    $this->name = $name;
  }
  
  public function getEmail(): string {
    return $this->email;
  }

  public function setEmail(string $email): void {
    $this->email = $email;
  }

  public function __toString(): string {
    return "
    \r NAME : $this->name
    \r EMAIL: $this->email
    ";
  }
}
