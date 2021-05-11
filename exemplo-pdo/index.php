<?php

require_once("repository/ClientRepository.php");
require_once("entity/Client.php");
require_once("exception/ConnectionFactoryException.php");
require_once("exception/NotImplementedException.php");
require_once("factory/ConnectionFactory.php");

main($_SERVER['argv'], count($_SERVER['argv']));

function main(array $argv, int $argc): void {
  try {
     
    $clientRepository = new ClientRepository(ConnectionFactory::getFactory());
    $clientRepository1 = new ClientRepository(ConnectionFactory::getFactory());
     
    $clients = $clientRepository->findAll();
    $clientRepository->findAll();


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

