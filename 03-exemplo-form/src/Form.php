<?php

class Form {
  
  private array $form = [];

  function __construct(array $request) {
    $this->form = $request;
  }

  public function getField(string $key): string {
    if(array_key_exists($key, $this->form)) {
      return $this->form[$key];
    }
    return '';
  }

  public function isInvalid(): bool {

    if(!count([$this->form])) return true;

    foreach ($this->form as $key => $value) {
       if(empty($value)) return true;
    }

    return false;
  }

  public function getProperty(): array {
    return $this->form;
  }

  public static function formatCSV(self $form): array {
    $props = $form->getProperty();
    
    $csv = [
      'header' => join(array_keys($props), ';') . "\n",
      'value' => join(array_values($props), ';') . "\n"
    ];

    return $csv;
  }

}