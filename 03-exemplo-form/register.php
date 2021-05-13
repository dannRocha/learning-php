<?php

include_once 'src/Form.php';
include_once 'src/Http.php';
include_once 'src/Persist.php';

if($_SERVER['REQUEST_METHOD'] == Http::GET_METHOD) {
  header('Location: /', true, Http::SEE_OTHER['code']);
  exit;  
}

$request = $_POST;
$form = new Form($request);

if($form->isInvalid()) {
  Http::responseJSON(Http::BAD_REQUEST, [
    'message' => 'form invalid',
    'form' => $form->getProperty()
  ]);
}

Persist::writeCSV( "subscribe.csv", Form::formatCSV($form));

Http::responseJSON(Http::CREATED, $form->getProperty());
