<?php include"cabecera.php"; ?>
<?php include"conexion.php"; ?>
<?php
$objConexion=new conexion();
if($_POST){
	$nombre=$_POST["nombreProyecto"];
	$descripcion=$_POST["descripcion"];

	$fecha=new DateTime();

	$imagen=$fecha->getTimestamp()."_".$_FILES["archivo"]["name"];
	$imagenTemporal=$_FILES["archivo"]["tmp_name"];
	#descarga del archivo
	move_uploaded_file($imagenTemporal,"src/".$imagen);
	$sql="insert into proyectos values(NULL,'$nombre','$imagen','$descripcion');";
	$objConexion->ejecutar($sql);
	//print_r($_POST);
	//redirecciono para que no se ejecute otra insersion
	header("location:portafolio.php");
}
if($_GET){
	$objConexion=new conexion();
	#------------------------------------------------
	#RECOMENDACIONES DE SEGURIDAD
	#aqui podemos asegurarnos de que sea un número si o si
	#buscar si esta si no para que borrarlo
	#------------------------------------------------
	$id=$_GET["borrar"];
	$sqlBuscarImagen="select imagen from proyectos where id=".$id.";";
	$imagen=$objConexion->consultar($sqlBuscarImagen);
	//funcion que permite borar el archivo en local desde la ruta asignada
	unlink("src/".$imagen[0]["imagen"]);
	
	$sqlBorrar="delete from `proyectos` where `proyectos`.`id`=".$id;
	$objConexion->ejecutar($sqlBorrar);
	header("location:portafolio.php");
}
$sqlSelect="SELECT * FROM `proyectos`;";
$proyectos=$objConexion->consultar($sqlSelect);
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
							<!--con el "required" puedo poner que el campo sea obligatorio de llenar 
							aunque deberiamos poner mas seguridad en el post por medio de php
							ya que con este metodo lo pueden vulnerar facilmente con insepccionar
							-->
							Nombre del proyecto: <input required class="form-control" type="text" name="nombreProyecto">
							<br>
							Imagen del proyecto: <input required class="form-control" type="file" name="archivo">
							<br>
							Descripción:
							<textarea required name="descripcion" class="form-control" rows="4"></textarea>
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
						<td>
							<img width="120" src="src/<?php echo $proyecto["imagen"];?>" alt="">
						</td>
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
