<?php 

namespace Repositories;

use Entity\Client;
use Exceptions\NotImplementedException;
use Exceptions\ConnectionFactoryException;
use Factory\ConnectionFactory;
use Interfaces\Repository;


class ClientRepository implements Repository {

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
      $this->executeQuery(
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
    
    if(is_null($conn)) return [];
    

    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    
    $result = $stmt->fetchAll();
    $hasOnlyOneValue = count($result) == 1;

    return ($hasOnlyOneValue)? array_pop($result) : $result;

  }

  private function toModel(array $clientDTO): Client {
    return new Client($clientDTO['nome'], $clientDTO['email']);
  }

  private function throwConnectionErrorIfTheConnectionIsNull(): void {
    
    if(!is_null($this->conn)) return;
    
    throw new ConnectionFactoryException(new Exception());
  }

}
