<?php  session_start(); ?>
<?php if (!isset($_SESSION['user_id'])) header ('Location: /index.php'); ?>
<?php if ($_SESSION["user_type"] != 3) header ('Location: /index.php'); ?>
<?php include "./resources/header.php" ?>
<?php include "./resources/navbar.php" ?>
<body onload="document.body.style.opacity='1'">
  <br/>
<div class="container">
	<h2><center>¿Qué desea hacer, <?php echo $_SESSION['user_name']; ?>?</center></h2>
	<br><br>
	<ol>
		<li><a style="color: white" href="video/subir.php">Subir un video</a></li>
		<li><a style="color: white" href="video/listar.php">Ver lista de videos Subidos</a></li>
		<li><a style="color: white" href="lista/crear.php">Crear una Lista de Reproducción</a></li>
	    <li><a style="color: white" href="lista/ver.php">Ver Listas de Reproducción</a></li>
	    <li><a style="color: white" href="lista/programar.php">Programar lista</a></li>
	    <li><a style="color: white" href="lista/asistentes.php">Bajar lista asistentes</a></li>
	    <li><a style="color: white" href="template/ver.php">Editar textos de correos y sitio</a></li>
	    <li><a style="color: white" href="sponsor/index.php">Ver auspiciadores</a></li>
	    <li><a style="color: white" href="fondo/index.php">Administrar fondos de pantalla</a></li>
	</ol>
<br><br><br><br><br><br><br><br>
</div>
</body>
<?php include "./resources/footer.php" ?>