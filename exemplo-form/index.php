<?php?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='/assets/form-handler.js' defer></script>
  <title>Form - Subscribe</title>

</head>
<body>
  
  <h1>Form - Subscribe</h1>

  <form>
    <label><span>Name:</span><input type="text" name="name" /></label>
    <label><span>Email: </span><input type="email" name="email" /></label>
    <button type='submit'>Submit</button>
  </form>

  <h2 style='display: none;' messagen-de-erro>Fill out the form correctly</h2>
  <h2 style='display: none;' text-color=green;' messagen-de-sucesso>Registration successful</h2>

</body>
</html>