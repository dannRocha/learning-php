<?php 

require_once("entity/Client.php");
require_once("exception/ConnectionFactoryException.php");
require_once("exception/NotImplementedException.php");
require_once("factory/ConnectionFactory.php");
require_once("interface/dto.php");


class ClientDTO implements DTO{

  private ConnectionFactory $conn;
  private const LIMIT_FIND_ALL = 10;
  
  public function __construct(ConnectionFactory $conn) {
    $this->conn = $conn;
  }

  public function __destruct() {
    $this->conn->closeConnection();
  }
  
  public function findAll(): array {

    $this->throwConnectionErrorIfTheConnectionIsNull();
    
    $conn = $this->conn->getConnection();
    $clients = $this->executeQuery(
      'SELECT cliente.nome, cliente.email FROM cliente LIMIT :limit',
      ['limit' => $this::LIMIT_FIND_ALL]
    );	
    
    return array_map(array(self::class,'toModel'), $clients);
      
  }
  
  public function findById(int $id): ?object {
    $this->throwConnectionErrorIfTheConnectionIsNull();
    
    return $this->toModel(
      ...$this->executeQuery(
        'SELECT cliente.nome, cliente.email FROM cliente WHERE numero = :id',
        ['id' => $id]
      )
    );
  }
  
  public function save(object $entity): bool {

    $this->throwConnectionErrorIfTheConnectionIsNull();
    throw new NotImplementedException();

    return false;
  }
  
  public function remove(int $id): bool {

    $this->throwConnectionErrorIfTheConnectionIsNull();
    throw new NotImplementedException();
    
    return false;
  }

  private function executeQuery(string $query, array $params): array {

    $conn = $this->conn->getConnection();
    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    
    return $stmt->fetchAll();
  }

  private function toModel(array $clientDTO): Client {
    return new Client($clientDTO['nome'], $clientDTO['email']);
  }

  private function throwConnectionErrorIfTheConnectionIsNull(): void {
    if(is_null($this->conn)) {
      throw new ConnectionFactoryException();
    }
  }
}
