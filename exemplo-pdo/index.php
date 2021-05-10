<?php

require_once("dto/ClientDTO.php");
require_once("entity/Client.php");
require_once("exception/ConnectionFactoryException.php");
require_once("exception/NotImplementedException.php");
require_once("factory/ConnectionFactory.php");

main($_SERVER['argv'], count($_SERVER['argv']));

function main(array $argv, int $argc): void {
  try {
     
    $clientDTO = new ClientDTO(ConnectionFactory::getFactory());
    $clientDTO1 = new ClientDTO(ConnectionFactory::getFactory());
     
    $clients = $clientDTO->findAll();
    $clientDTO->findAll();




    print("findAll\n");
    $clients = $clientDTO->findAll();
    foreach($clients as $client) {
       print_r($client);
    }

    
     
    print("findById\n");
    $client = $clientDTO->findById(10);
    print_r($client);

    $clientDTO->remove(10);
    $clientDTO->save($client);
  }
  catch(ConnectionFactoryException $e) {
    print($e->getMessage());
  }
  catch(NotImplementedException $e) {
    print($e->getMessage());
  }

}

