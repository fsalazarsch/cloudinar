<?php  session_start(); ?>
<?php include "./resources/header.php" ?>
<?php include "./resources/navbar.php" ?>
<link rel="stylesheet" href="/cloud/resources/css/main.css" crossorigin="anonymous">

<?php
  include './config/conneccion.php';  


  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $db = new Database();
  $conn = $db->connect();

  $sql = "SELECT cuerpo FROM template where accion like 'quienes_somos' LIMIT 1";
  $quienes_somos = $conn->query($sql)->fetch_assoc();
  ?>

<body onload="document.body.style.opacity='1'">
<div class="container">
	<br>
	<h2><center>Quiénes somos</center></h2>
	<?php echo $quienes_somos['cuerpo']; ?>
</div>
</body>
<?php include "./resources/footer.php" ?>