<?php

namespace Model\Product;

use Interfaces\Repository;

class ProductModel implements Repository {
  
  public function __construct() {
  }
  
  public function findAll(int $id): array {
    return [];
  }
  public function findById(int $id): ?object {
    return null;
  }
  public function save(object $entity): ?object {
    return null;
  }
  public function rempve(int $id): bool {
    return false;
  }
  
}