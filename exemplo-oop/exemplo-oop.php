<?php 

interface People {
  function getName(): string;
  function getLastname(): string;
  function setName(string $name): void;
  function setLastname(string $lastname): void;
}


interface Priority {
  function getPriority(): int;
  function setPriority(int $priority): void;
}


interface DTO {
  function findAll(): array;
  function findById(int $id): ?object;
  function save(): bool;
  function remove(int $id): bool;
}


interface ConnectionDB {
  function getConnection(): ?PDO;
}

class Client implements People {

  private string $name;
  private string $lastname;

  public static string $id = "@as2122as";
  

  public function __construct(string $name, string $lastname) {
    $this->setName($name);
    $this->setLastname($lastname);
  }

  public function getName(): string {
    return $this->name;
  }

  public function getLastname(): string {
    return $this->lastname;
  }
  
  public function setName(string $name): void {
    $this->name = $name;
  }

  public function setLastname(string $lastname): void {
    $this->lastname = $lastname;
  }

  public static function staticMethod(): string {
    return "
      \rstatic method: on
    ";
  }

  public function __toString(): string {
    return "
      \rname         : $this->name
      \rlastname     : $this->lastname";
  }	
}


class ClientPriority extends Client implements Priority {

  private int $priority;

  public function __construct(string $name, string $lastname, int $priority) {
    
     parent::__construct($name, $lastname);
     $this->setPriority($priority);
    
  }
  
  public function getPriority(): int {
    return $this->priority;
  }
  
  public function setPriority(int $priority): void {
    $this->priority = $priority;
  }

  public function __toString(): string {
    return parent::__toString()."
      \rpriority     : $this->priority";
  }
}

class ConnectionFactory implements ConnectionDB {
  function getConnection(): ?PDO {
    return null;
  }
}

class ConnectionFactoryExcetion extends Exception {

  public function __construct(string $message) {
    $this->message =  self::class . ": ". $message;
  }
}


class ClientDTO implements DTO {

  private ?ConnectFactory  $conn = null;
  
  public function __construct(?ConnectFactory $conn ) {
    $this->conn	= $conn;
  }

  public function findAll(): array {

    $this->throwConnectionErrorIfTheConnectionIsNull();
    
    return [ 
      new ClientPriority("Daniel", "Rocha", 0),
      new ClientPriority("Daniel", "Rocha", 0)
    ];
  }
  
  public function save(): bool {
    $this->throwConnectionErrorIfTheConnectionIsNull();
    return false;
  }
  
  public function findById(int $id): ?object {
    $this->throwConnectionErrorIfTheConnectionIsNull();
    return null;
  }


  public function remove(int $id): bool {
    $this->throwConnectionErrorIfTheConnectionIsNull();
    return 1 == 1;
  }

  private function throwConnectionErrorIfTheConnectionIsNull(): void {
    if(is_null($this->conn)) {
      throw new ConnectionFactoryExcetion("The connection cannot be established");
    }
  }
}


class LoginConfiguation {

  public function __construct() {}
  
  public function and () : self { return $this; }
  public function cors (bool $enable) : self { return $this; }
  public function permitAll () : self { return $this; }
}

echo "Exemplo rápido de classe em PHP";

$login =  new LoginConfiguation();
$login
  ->cors(false)
  ->and()
  ->permitAll();


try {

  $conn = null;
  $client = new ClientPriority("Daniel", "Rocha", 0);
  $clientDTO = new ClientDTO($conn);
  
  echo ($client . "\n");
  echo ('ID           : ' . Client::$id);
  echo (Client::staticMethod()) . "\r";
  
  echo "\r - findById  : " .(($clientDTO->findById(1)) ? "on" : "null") . "\n";
  echo "\r - save      : " .(($clientDTO->save(1)) ? "on" : "null") . "\n";
  echo "\r - remove    : " .$clientDTO->remove(1) . "\n - findAll   : ";
  print_r ($clientDTO->findAll());	
}
catch(ConnectionFactoryExcetion $e) {
  echo ($e->getMessage());
}
