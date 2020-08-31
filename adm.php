<?php  session_start(); ?>
<?php include "./resources/header.html" ?>
<?php include "./resources/navbar.php" ?>
<body>
  <br/>
<div class="container">
	<h2><center>¿Qué desea hacer, <?php echo $_SESSION['user_name']; ?>?</center></h2>
	<ol>
		<li><a style="color: white" href="video/subir.php">Subir un video</a></li>
		<li><a style="color: white" href="video/listar.php">Ver lista de videos Subidos</a></li>
		<li><a style="color: white" href="lista/crear.php">Crear una Lista de Reproducción</a></li>
	    <li><a style="color: white" href="lista/ver.php">Ver Listas de Reproducción</a></li>
	    <li><a style="color: white" href="lista/programar.php">Programar lista</a></li>
	    <li><a style="color: white" href="lista/asistentes.php">Bajar lista asistentes</a></li>
	    <li><a style="color: white" href="template/ver.php">Editar textos de correos y sitio</a></li>
	    <li><a style="color: white" href="sponsor/index.php">Ver auspiciadores</a></li>
	</ol>
</div>
</body>
<?php include "./resources/footer.php" ?>