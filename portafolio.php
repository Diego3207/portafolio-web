<?php include"cabecera.php"; ?>
<?php include"conexion.php"; ?>
<?php
$objConexion=new conexion();
if($_POST){
	$nombre=$_POST["nombreProyecto"];
	$descripcion=$_POST["descripcion"];
	$imagen=$_FILES["archivo"]["name"];
	$imagenTemporal=$_FILES["archivo"]["tmp_name"];
	#descarga del archivo
	move_uploaded_file($imagenTemporal,"src/".$imagen);
	$sql="insert into proyectos values(NULL,'$nombre','$imagen','$descripcion');";
	$objConexion->ejecutar($sql);
	//print_r($_POST);
}
if($_GET){
#DELETE FROM proyectos WHERE `proyectos`.`id` = 29
	$objConexion=new conexion();
	#------------------------------------------------
	#RECOMENDACIONES DE SEGURIDAD
	#aqui podemos asegurarnos de que sea un número si o si
	#buscar si esta si no para que borrarlo
	#------------------------------------------------
	$id=$_GET["borrar"];
	$sqlBorrar="delete from `proyectos` where `proyectos`.`id`=".$id;
	$objConexion->ejecutar($sqlBorrar);
}
$sql2="SELECT * FROM `proyectos`;";
$proyectos=$objConexion->extraer($sql2);
?>
<div class="container">
	<div class="row">
		<div class="col-md-6">
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
							Descripción:
							<textarea name="descripcion" class="form-control" rows="4"></textarea>
							<input class="btn btn-success" type="submit" value"Enviar proyecto">
							<br>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
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
						<td><?php echo $proyecto["id"]; ?></td>
						<td><?php echo $proyecto["nombre"]; ?></td>
						<td><?php echo $proyecto["imagen"]; ?></td>
						<td><?php echo $proyecto["descripcion"]; ?></td>
						<td><a class="btn btn-danger" href="?borrar=<?php echo $proyecto["id"]; ?>">Eliminar</a></td>
					</tr>
					<?php } ?>
					</tbody>
				</thead>
			</table>
		</div>
	</div>
</div>



<?php include"pie.php"; ?>
