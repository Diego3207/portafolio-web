<?php
session_start();
if($_POST){
	if(($_POST["usuario"]=="Levianix") && ($_POST["contrasenia"]=="3207")){
		//tambien se puede loguear asi
		//$_SESSION["login"]
		$_SESSION["usuario"]="Levianix";
		echo "Usuario Logueado";

		//enviar a la direccion "index.php"
		header("location:index.php");
	}
	else{
		echo "<script>alert('Usuario y/o contraseña incorrecta')</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>Login</title>
</head>
<body>
	<div class="container">
		<br>
		<div class="row">
			<!-- "col" es de la columna, 
			"md" es de tamaño medio
			"4" es equivalente a 4 columnas -->
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-header">
						Iniciar Sesión
					</div>
					<div class="card-body">
						<form action="login.php" method="post">
							Usuario: <input class="form-control" type="text" name="usuario">
							<br>
							Contraseña: <input class="form-control"  type="password" name="contrasenia">
							<br>
							<button class="btn btn-success" type="submit" >Entrar al portafolio</button>
						</form>
					</div>
				</div>

			</div>
			<div class="col-md-4">
			</div>
		</div>
	</div>
</body>
</html>
