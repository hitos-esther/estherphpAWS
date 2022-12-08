<?php
	const DATOS = [
		["usuario" => "pepe", "password" => "1234"],
		["usuario" => "luis", "password" => "1234"],
		["usuario" => "marta", "password" => "1234"],
		["usuario" => "javier", "password" => "1234"],
		["usuario" => "laura", "password" => "1234"],
		["usuario" => "esther", "password" => "1234"],
	 ] ;

/***true si lo encuentra false en el otro caso
 * @param $usuario
	@param $pwd 
	@return 
	*/

	function buscarUsuario($usuario,$password):bool{
		$res=array_filter(DATOS, function($item)use($usuario,$password){
					return (($item ["usuario"]==$usuario)and
							($item["password"]==$password));
		});
		return !empty($res);
		//$i =0; 
		//$encontrado =false;
		//while(($i < count(DATOS)) and ($encontrado==false)):
			//if (DATOS [$i]["usuario"]== $usuario)and
				//(DATOS[$i]["password"]==$password) return true;
				//$i++;

		//endwhile;
		//return $encontrado;

	}

// Iniciar la sesión
	session_start() ;
//--------------------------------------------------------------------	
// Máxima duración de sesión activa en hora
	define( 'MAX_SESSION_TIEMPO', 3600 * 1 );

// Controla cuando se ha creado y cuando tiempo ha recorrido 
	if ( isset( $_SESSION[ 'ULTIMA_ACTIVIDAD' ] ) && 
     	( time() - $_SESSION[ 'ULTIMA_ACTIVIDAD' ] > 'MAX_SESSION_TIEMPO' ) ) {

    // Si ha pasado el tiempo sobre el limite destruye la session
    destruir_session();
}
//-------------------------------------------------------------------------------------
$_SESSION[ 'ULTIMA_ACTIVIDAD' ] = time();
	if (isset($_SESSION["inicio"])) header("location: logueado.php") ;

	//echo $_SESSION["token"] ;

	define("USUARIO",  "pepe") ;
	define("PASSWORD", "1234") ;

	/**
	 * Si ya tenemos datos en $_POST, comprobamos el usuario
	 * y la contraseña. Si son correctos, redirigimos.
	 */
	if (!empty($_POST)):

		if ($_SESSION["token"] == $_POST["_token"]):

			if (buscarUsuario($_POST["usuario"],$_POST["password"])): 
				

				$_SESSION["usuario"] = $_POST["usuario"] ;
				$_SESSION["inicio"] = time() ;
				
				// Redirigimos a la página principal
				header("location:logueado.php") ;

			else:
				echo "Nombre de usuario o contraseña incorrectos." ;
			endif ;

		else:
			echo "Solicitud caducada." ;
		endif ;

	endif ;


	// creamos un ID único
	$_SESSION["token"] = md5(uniqid(mt_rand(),true)) ;

	// No nos ha llegado información en $_POST: mostramos
	// el formulario de login.		
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAW. Formulario PHP </title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <div class="login">
        <h1>LOGIN</h1>
        <form  method="post">
            <input type="hidden" name="_token" value="<?= $_SESSION["token"] ?>" />
            <input type="text" id="usuario" name="usuario" 
	  						class="form-control" 
	  						placeholder="nombre de usuario"
	  						value="miusuario"
	  						autofocus required/>
            <input id="password" name="password" type="password" 
	  						class="form-control" 
	  						placeholder="introduce tu contraseña"
	  						value="1234"
	  						required />
            <button type="submit" class="btn btn-primary btn-block btn-large">Entrar</button>
        </form>
    </div>
</body>
</html>
