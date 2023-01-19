<?php include"cabecera.php"; ?>
<?php include"conexion.php"; ?>
<?php
if($_POST){
	$nombre=$_POST["nombreProyecto"];
	$objConexion=new conexion();
	$sql="insert into proyectos values(NULL,'$nombre','imagen.png','descripcion');";
	//$objConexion->ejecutar($sql);

	$sql2="SELECT * FROM `proyectos`;";
	$proyectos=$objConexion->extraer($sql2);
}

?>
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<div class="container">
				<br>
				<div class="card">
					<div class="card-header">
						Elegir proyecto
					</div>
					<div class="card-body">
						<form action="portafolio.php" method="post" enctype="multipart/form-data">
							Nombre del proyecto: <input class="form-control" type="text" name="nombreProyecto">
							<br>
							Imagen del proyecto: <input class="form-control" type="file" name="archivo">
							<br>
							<input class="btn btn-success" type="submit" value"Enviar proyecto">
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Imagen</th>
						<th>Descripción</th>
						<th>Acciones</th>
					</tr>
					<tbody>
					<?php foreach($proyectos as $proyecto){?>
					<tr>
						<td>$proyecto</td>
					</tr>
					<?php } ?>
					</tbody>
				</thead>
			</table>
		</div>
	</div>
</div>



<?php include"pie.php"; ?>
