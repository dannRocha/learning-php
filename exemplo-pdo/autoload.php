<?php

define('DS', DIRECTORY_SEPARATOR);
define('DIR_APP', __DIR__);

spl_autoload_register(function ($class_name) {

  $basedir = DIR_APP . DS . str_replace('\\', DS, $class_name) . '.php';
  if(file_exists($basedir) && !is_dir($basedir)) {
    include_once $basedir;
  }
  
});



