<?php

include_once 'Repository.php';

if(!empty($_POST)) {
  ['id' => $id] = $_POST;  

  Repository::update($id, $_POST);

}

['id' => $id] = $_GET;

if(is_null($id) || strlen($id) == 0) {
  header('location: /');
}

$item = Repository::findById($id);

if(empty($item)) {
  echo '<h1>Registro não existe</h1>';
  exit();
}

?>
<h1>Editar</h1>
<form action="<?php echo '/edit.php?id='.$item['id'] ?>" method="post">
  <input type='text' name='name' value='<?php echo $item['name'] ?>'/>
  <input type='text' name='last' value='<?php echo $item['last'] ?>' />
  <input hidden type="text" name="id" value='<?php echo $item['id'] ?>' />
  <button type='submit'>Editar</button>
</form>
<a href="/list.php" />Registros</a>

