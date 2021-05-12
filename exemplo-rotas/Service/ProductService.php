<?php

namespace Service;

use Model\Product\ProductModel;
use Entity\Product;

class ProductService {
  public function saveProduct($request): ?object {
  
    $productModel = new ProductModel();
    $product = new Product();
    $product->setName($request['name']);
    $product->setPrice(floatval($request['price']));
    $product->setDescription($request['description']);

    return $productModel->save($product);
  }

}