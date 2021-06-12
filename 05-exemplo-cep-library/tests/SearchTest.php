<?php 
declare(strict_types=1);

use Address\Cep\Search;
use PHPUnit\Framework\TestCase;


final class SearchTest extends TestCase {

  /**
   * @dataProvider dataTest
   */
  public function testGetAddressFromZipCode(string $input, array $expect): void {
    
    $search = new Search();

    $result = $search->getAddressFromZipCode($input);
    $this->assertEquals($result, $expect);
  }

  public function dataTest() {
    return [
      "Recanto dos Pássaros" => [
        "65058777",
         [
          "cep" => "65058-777",
          "logradouro" => "Rua Sabiá",
          "complemento" => "",
          "bairro" => "Recanto dos Pássaros",
          "localidade" => "São Luís",
          "uf" => "MA",
          "ibge" => "2111300",
          "gia" => "",
          "ddd" => "98",
          "siafi" => "0921"
         ]
      ],
      "Cidade Operária" => [
        "65058001",
        [
          "cep" => "65058-001",
          "logradouro" => "Rua 03",
          "complemento" => "(Unidade 205)",
          "bairro" => "Cidade Operária",
          "localidade" => "São Luís",
          "uf" => "MA",
          "ibge" => "2111300",
          "gia" => "",
          "ddd" => "98",
          "siafi" => "0921"
        
        ]
      ]
    ];
  }
}