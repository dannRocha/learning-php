<?php

include_once 'Repository.php';

['id' => $id] = $_GET;

if(is_null($id) || strlen($id) == 0) {
  header('location: /');
}

if(Repository::deleteById($id)) {
  header('location: /list.php');
  
}
else {
  header('location: /'); 
}
