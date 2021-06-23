<?php

namespace Controller;
use Controller\Home\HomeController;
use Controller\NotFound\NotFoundController;
use Controller\Product\ProductController;
use Lib\Router;


class RegisterController {
  public static function execute() {
    Router::use(HomeController::class);
    Router::use(ProductController::class);
    Router::use(NotFoundController::class);
  }
}
