<?php

class ConnectionFactory {

    private static ?self $factory = null;
    private ?PDO $db = null;
    private string $connectionString;

    public function __construct() {
      $this->loadConfiguration();
    }


    public static function getFactory(): self {
        if (is_null(self::$factory)) {
          self::$factory = new ConnectionFactory();
        }
        
        return self::$factory;
    }

    public function closeConnection(): void {
      if(is_null($this->db)) return;
      
      $this->db = null;
    }

    public function getConnection(): PDO {
        if (is_null($this->db)) {
          $this->db = new PDO($this->connectionString);
        }
           
        return $this->db;
    }

    private function loadConfiguration(): void {

    $filenameconfig = 'config/database.ini';
      $params = parse_ini_file($filenameconfig);
      
      $this->connectionString = sprintf("pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
          $params['host'], 
          $params['port'], 
           $params['database'], 
           $params['user'], 
           $params['password']
        );
    }
}
