<?php

namespace Entity;

class Product {

  private ?string $name;
  private ?float $price;
  private ?string $description;

  public function __construct() {}

  public function getName(): ?string {
    return $this->name;
  }
  public function getPrice(): ?float {
    return $this->price;
  }
  public function getDescription(): ?string {
    return $this->description;
  }

  public function setName(string $name): void {
    $this->name = $name;
  }
  public function setPrice(float $price): void {
    $this->price = $price;
  }
  public function setDescription(string $description): void {
    $this->description = $description;
  }

}