<?php  session_start(); ?>
<?php include "./config/header.html" ?>
<?php include "./config/navbar.php" ?>

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

<body>
<div class="container">
	<br>
	<h3>Quienes somos</h3>
	<?php echo $quienes_somos['cuerpo']; ?>
</div>
</body>
<?php include "./config/footer.php" ?>