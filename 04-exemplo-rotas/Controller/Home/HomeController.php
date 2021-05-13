<?php

namespace Controller\Home;

use Lib\Router;
use Lib\Render;

class HomeController extends Router {}

HomeController::get("/", function($request){
  Render::view("/View/Page/Home");
});