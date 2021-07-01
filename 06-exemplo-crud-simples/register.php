<?php
  include_once 'Repository.php';

  ['name' => $name, 'last' => $last ] = $_POST;

  Repository::save([$name, $last]);

  header('location: /');

