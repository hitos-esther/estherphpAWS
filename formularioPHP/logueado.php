<?php

	session_start()  ;

	if (!isset($_SESSION["inicio"])) header("location: index.php") ;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de personas Logueadas</title>
    <link rel="stylesheet" href="./styles/logueado.css">
</head>
<body>

<div class="card">
<img src="./imagen.png"  alt="Formularios apache & php" style="width:100%">
  <div class="container">
    <h1><b><?= $_SESSION["usuario"] ?></b></h1>
    <h3>Acceso Satisfactorio</h3>
    <a href="logout.php"><button>Desconectar</button></a>
  </div>
</div>
  
      
</body>
</html>
