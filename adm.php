<?php  session_start(); ?>
<?php include "./resources/header.html" ?>
<?php include "./resources/navbar.php" ?>
<body>
  <br/>
<div class="container">
	<h3>Que desea hacer, <?php echo $_SESSION['user_name']; ?></h3>
	<ol>
		<li><a href="video/subir.php">Subir un video</a></li>
		<li><a href="video/listar.php">Ver lista de videos Subidos</a></li>
		<li><a href="lista/crear.php">Crear una Lista de Reproducción</a></li>
	    <li><a href="lista/ver.php">Ver Listas de Reproducción</a></li>
	    <li><a href="lista/programar.php">Programar lista</a></li>
	    <li><a href="lista/asistentes.php">Bajar lista asistentes</a></li>
	    <li><a href="template/ver.php">Editar cuerpo de correos</a></li>
	</ol>
</div>
</body>
<?php include "./resources/footer.php" ?>