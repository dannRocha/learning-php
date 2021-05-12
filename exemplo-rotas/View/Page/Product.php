
<?php include __DIR__ . "/../Component/Header.php";?>

<h1>Produtos - File</h1>
<ul>
<?php
  
  foreach ($products as $value) {
    echo "<li>${value}</li>";
  }
?>

</ul>
<?php include __DIR__ . "/../Component/Footer.php";?>