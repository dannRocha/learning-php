<?php

namespace Entity;

class Client {

  private int $id;
  private string $name;
  private string $email;

  public function __construct(string $name, string $email, int $id) {
    $this->setName($name);
    $this->setEmail($email);
    $this->setId($id);
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

  public function getId(): int {
    return $this->id;
  }

  private function setId(int $id): void {
    $this->id = $id;
  }

  public function __toString(): string {
    return "
    \r NAME : $this->name
    \r EMAIL: $this->email
    ";
  }
}
