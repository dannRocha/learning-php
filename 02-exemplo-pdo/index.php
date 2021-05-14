<?php
require_once 'autoload.php';

use Exceptions\NotImplementedException;
use Exceptions\ConnectionFactoryException;
use Factory\ConnectionFactoryPDO;
use Repositories\ClientRepository;


main($_SERVER['argv'], count($_SERVER['argv']));

function main(array $argv, int $argc): void {
  try {
    $clientRepository1 = new ClientRepository(ConnectionFactory::getFactory());
    $clientRepository = new ClientRepository(ConnectionFactoryPDO::getConnection());

    print("findAll\n");
    $clients = $clientRepository->findAll();
    
    foreach($clients as $client) {
      print_r($client);
    }
    
    print("findById\n");
    $client = $clientRepository->findById(10);
    print_r($client);
    
    $clientRepository->remove(10);
    $clientRepository->save($client);

  }
  catch(ConnectionFactoryException $e) {
    print($e->getMessage());
  }
  catch(NotImplementedException $e) {
    print($e->getMessage());
  }

}

