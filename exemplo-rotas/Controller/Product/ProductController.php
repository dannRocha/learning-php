<?php

namespace Controller\Product;

use Lib\Router;
use Lib\Render;
use Lib\Http;
use Model\Product\ProductModel;
use Service\ProductService;


class ProductController extends Router {}

ProductController::get("/produtos", function($request){
  Render::view("/View/Page/Product", [
    'products' => [
      "Shoes",
      "Shirt",
      "Pants"
    ]]);
});


ProductController::post("/produtos", function($request) {
  
  $productService = new ProductService();

  $productSaved = $productService->saveProduct($request);
  
  if(is_null($productSaved)) http_response_code(Http::STATUS_CODE_BAD_REQUEST);
  else http_response_code(Http::STATUS_CODE_OK);

  header(Http::HEADER_CONTENT_TYPE_JSON);

  echo json_encode(json_decode($request));

});



