<?php

class Persist {
  public static function write(string $filename, string $str): void {
    $file = fopen($filename, "a+");
    fwrite($file, $str);
    fclose($file);
  }

  public static function writeCSV(string $filename, array $csv) {
    
    $fileIsEmpty = !filesize($filename);
    if($fileIsEmpty) {
      self::write($filename, $csv['header']);
    }

    self::write($filename, $csv['value']);
  }
}