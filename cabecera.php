<?php
session_start();
if(isset($_SESSION["usuario"])!="Levianix"){
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Integracion de bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>Portafolio</title>
</head>
<body>
<div class="container">
	<a href="index.php"> | Inicio |</a>
	<a href="portafolio.php"> | Portafolio |</a>
	<a href="cerrar.php"> | Cerrar |</a>
