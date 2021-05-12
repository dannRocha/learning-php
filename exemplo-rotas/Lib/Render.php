<?php

namespace Lib;

class Render {


  public static function view(string $filename, $variables = array(), $print = true): ?string {
    
    $output = NULL;
    $PATH  = (!!mb_strpos($filename, "../") || !!mb_strpos($filename, "./"))
      ? __DIR__
      : DIR_APP;

    $filename = $PATH . $filename . ".php";

    if(file_exists($filename)){
        // Extract the variables to a local namespace
        extract($variables);
        
        // Start output buffering
        ob_start();
        
        include $filename;

        // End buffering and return its contents
        $output = ob_get_clean();
    }
    if ($print) {
        print $output;
    }
    return $output;
  }

}