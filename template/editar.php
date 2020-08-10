<?php  session_start(); ?>
<?php include "../config/header.html" ?>
<?php include "../config/navbar.php" ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.12/tinymce.min.js" integrity="sha512-d0g+KQCJo+/uZT1AnOD2d00LepW5V3kSyIG7s3ruia6gb1k3V1rcIOu7qTDAnNHEauhrQEGML7vkV3htQOIAxA==" crossorigin="anonymous"></script>



<?php
  include '../config/conneccion.php';


  $db = new Database();
  $conn = $db->connect();

  $sql = "SELECT * FROM template WHERE id = ".$_GET['id'];
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

?>

<body>

<br>

<div class="container">
  <h3>Editar template</h3>
  <form  method="POST" action="doedittemplate.php">
  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
  <textarea name="cuerpo" style="width: 100%;resize: none;" placeholder=" Escribe aqui el cuerpo de tu mensaje" required> <?php echo $row['cuerpo']; ?></textarea>
  <button id="submitButton" type="submit"  name="submit" class="btn btn-primary">Editar</button>
    </form>
  </div>

  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
       height: 300
    });
  </script>
 <br><br><br>
</body>
<?php include "../config/footer.php" ?>