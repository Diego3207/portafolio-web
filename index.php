<?php include"cabecera.php"; ?>
<?php include"conexion.php"; ?>

<?php
$objConexion=new conexion();
$sql="select * from proyectos";
$proyectos=$objConexion->consultar($sql);
?>

<div class="p-5 bg-light">
	<div class="container">
		<h1 class="display-3">Bienvenid@s</h1>
			<p class="lead">Este es mi portafolio</p>
			<hr class="my-2">
			<p>Más información</p>
		</h1>
	</div>
	
</div>

<div class="row row-cols-1 row-cols-md-3 g-4">
  <?php foreach($proyectos as $proyecto){ ?>
    <div class="col">
      <div class="card">
      <img src="src/<?php echo $proyecto["imagen"]; ?>" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title"><?php echo $proyecto["nombre"]; ?></h5>
        <p class="card-text"><?php echo $proyecto["descripcion"]; ?>.</p>
        </div>
      </div>
    </div>
  <?php }?>
</div>

<div class="card-group">
  <div class="card">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div>
<?php include"pie.php"; ?>
