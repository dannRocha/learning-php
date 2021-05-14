<?php 

namespace Repositories;

use Entity\Client;
use Exceptions\NotImplementedException;
use Factory\AbstractConnectionFactory;
use Interfaces\Repository;


class ClientRepository implements Repository {

  private AbstractConnectionFactory $conn;
  
  public function __construct(AbstractConnectionFactory $conn) {
    $this->conn = $conn;
  }
  
  public function __destruct() {
    $this->conn->closeConnection();
  }
  
  
  public function findAll(int $page = 51, int $limit = 10): array {
    
    $clients = $this->conn->executeQuery(
      'SELECT cliente.numero, cliente.nome, cliente.email FROM cliente LIMIT :limit OFFSET :limit * (:page - 1)',
      ['limit' => $limit, 'page' => $page]
    );
    
    
    return array_map(fn($client) => $this->toModel($client), $clients);
      
  }
  
  public function findById(int $id): ?object {
    
    $data = $this->conn->executeQuery(
      'SELECT cliente.numero, cliente.nome, cliente.email FROM cliente WHERE numero = :id',
      ['id' => $id]
    );
  }
  
  public function save(object $entity): object {

  }
  
  public function remove(int $id): bool {

    throw new NotImplementedException();
    
    return false;
  }

  private function toModel(array $clientDTO): Client {
    return new Client($clientDTO['nome'], $clientDTO['email'], intval($clientDTO['numero']));
  }

}
