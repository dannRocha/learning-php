<?php

include_once 'Repository.php';
$lista = Repository::findAll([$name, $last]);

?>
<h1>Lista</h1>
<table style="border: 1px solid #000">
  <thead>
    <tr>
      <td style="border: 1px solid #000"><strong>nome</strong></td>
      <td style="border: 1px solid #000"><strong>sobrenome</strong></td>
      <td style="border: 1px solid #000"><strong>alterar</strong></td>
    </tr>
  </thead>
  <tbody>
    
    <?php foreach( $lista as $item): ?>
    
      <tr >
          <td style="border: 1px solid #000"><?php  echo $item['name'] ?></td>
          <td style="border: 1px solid #000"><?php  echo $item['last'] ?></td>
          <td style="border: 1px solid #000">
            <a href="<?php echo '/edit.php?id='.$item['id'] ?>">
              editar
            </a>
            <a href="<?php echo '/delete.php?id='.$item['id'] ?>">
              deletar
            </a>
          </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="/" />Registrar</a>
