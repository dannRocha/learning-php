<?php

require_once 'autoload.php';

use Controller\RegisterController;
use Lib\Router;

RegisterController::execute();

Router::run();