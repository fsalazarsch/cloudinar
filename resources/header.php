<!DOCTYPE html>
<html lang="es">
  <head>
<?php
// Agregado por Tan 20200904 19:10
// $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// if ((!isset($_SESSION['user_id'])) && ($actual_link != 'https://eiam.site/cloud/index.php')) header ('Location: /index.php');
?>
<link rel="icon" type="image/png" href="/cloud/favicon.ico"/>
  <meta property="og:image" content="/cloud/social.jpg">
  <meta property="og:image:type" content="image/jpg">
  <meta property="og:image:width" content="1024">
  <meta property="og:image:height" content="1024">

<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>EIAM 2020</title>


<meta charset="UTF-8">
<script  src="/cloud/resources/js/jquery-3.5.1.min.js"></script>
<script src="/cloud/resources/js/popper.min.js" crossorigin="anonymous"></script>
<script src="/cloud/resources/js/bootstrap.min.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/cloud/resources/css/bootstrap.min.css" crossorigin="anonymous">
<!--link rel="stylesheet" href="/cloud/resources/css/mdb.min.css" crossorigin="anonymous"-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="/cloud/resources/css/main.css" crossorigin="anonymous">


<script type='text/javascript'>
 //document.oncontextmenu = function(){return false}
</script> 

</head>

<?php
  $dirsub = "/var/www/html/cloud/fondo_pantalla";
  $fondos = array_diff(scandir($dirsub), array('..', '.'));
  $a=array_rand($fondos);

  ?>

<style type="text/css">
body {
  background-image: url(https://eiam.site/cloud/fondo_pantalla/<?php echo $fondos[$a]; ?>); 
  background-position: center;
  background-size: cover;
  background-attachment: fixed;
  background-repeat: no-repeat;
  font-family: Candara;
  font-size: larger;
  color: white;
}
</style>

<?php
	ini_set('session.cookie_lifetime', 60 * 60 * 24 * 365);
ini_set('session.gc-maxlifetime', 60 * 60 * 24 * 365);


//setear background



?>