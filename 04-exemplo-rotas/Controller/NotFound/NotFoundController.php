<?php

namespace Controller\NotFound;
use Lib\Router;
use Lib\Render;

class NotFoundController extends Router {}

NotFoundController::get("/NotFound", function($request) {
  Render::view("/View/Page/NotFound");
  var_dump($request);
});