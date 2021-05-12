<?php

require_once 'autoload.php';

use Controller\Product\ProductController;
use Controller\Home\HomeController;
use Lib\Router;
use Lib\Render;

new HomeController();
new ProductController();


Router::get("/NotFound", function($request) {
  Render::view("/View/Page/NotFound");
  var_dump($request);
});


Router::run();  


 

 


