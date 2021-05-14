<?php
namespace Factory;

use Exceptions\ConnectionFactoryException;


class ConnectionFactoryPDO extends AbstractConnectionFactory {

    private static ?self $instance = null;
    private ?\PDO $conn = null;
    private string $connectionString;

    public function __construct() {
      $this->loadConfiguration();
    }

    public static function getConnection(): self {
      if (is_null(self::$instance)) {
        self::$instance = new ConnectionFactoryPDO();
      }
        
      return self::$instance;
    }

    public function closeConnection(): void {
      if(is_null($this->conn)) return;
      
      $this->conn = null;
    }

    protected function openConnection(): ?object {
      try {
        if (is_null($this->conn)) {
          $this->conn = new \PDO($this->connectionString);
        }
      }
      catch(\PDOException $e) {
        throw new ConnectionFactoryException($e);
      }

      return $this->conn;
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
