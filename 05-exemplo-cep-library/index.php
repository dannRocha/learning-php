<?php
require "vendor/autoload.php";

use Address\Cep\Search;

$search = new Search();
$address = $search->getAddressFromZipCode("65058777");

print_r($address);