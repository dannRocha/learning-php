
<?php include __DIR__ . "/../Component/Header.php";?>

<h1>Produtos - File</h1>
<ul>
<table>
  <tr>
    <td>Name</td>
    <td>Price</td>
  </tr>
  <?php foreach ($products as $value): ?>
    <tr>
      <td><?php printf("${value['name']}") ?></td>
      <td><?php printf("%.2f", $value['price'])  ?></td>
    </tr>
  <?php endforeach?>
  <style>
    table, td {
      border:1px solid #000;
    }
  </style>
</table>

</ul>
<?php include __DIR__ . "/../Component/Footer.php";?>