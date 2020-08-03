<?php

//session_start();

if (isset($_SESSION["user_id"])){

  include "../config/header.html";

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="../config/chat.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<style>

.containerchat {
  width: 100%;
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.containerchat::after {
  content: "";
  clear: both;
  display: table;
}



.time-right {
  float: right;
}

.time-left {
  float: left;
}
</style>
<!------ Include the above in your HEAD tag ---------->

<br>

<div class="container">
  <div class="post-comments">

      <div class="form-group">
        <label for="comment">Tu Chat</label>
        <textarea id="padre2" class="form-control" rows="3"></textarea>
      </div>
      <button onclick="agregar_chat('padre2', <?php echo $_SESSION['user_id'] ?>, <?php echo $id_lista ?>)" class="btn btn-default">Enviar</button>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  $db = new Database();
  $conn = $db->connect();

  $sql = "SELECT id, msg, fecha_hora, A.user_id, B.user_name FROM chat A, users B WHERE B.user_id = A.user_id  AND lista_id = ".$id_lista;
  $result = $conn->query($sql);

  while($row = $result->fetch_assoc()){
    if($propietario != $row["user_id"]){
      echo '<div class="row"><div class="containerchat bg-info">';
      echo '<span><b>'.$row["user_name"].'</b></span>';
      echo '<p>'.$row["msg"].'</p>';
      echo '<span class="time-right">'.$row["fecha_hora"].'</span>';
      echo '</div></div>';
    }
    else{
      echo '<div class="row"><div class="containerchat bg-primary" style="text-align: right;">';
      echo '<span><b>'.$row["user_name"].'</b></span>';
      echo '<p>'.$row["msg"].'</p>';
      echo '<span class="time-left">'.$row["fecha_hora"].'</span>';
      echo '</div></div>';      
    }
  }
?>

</div>
</div>



<script type="text/javascript">


function agregar_chat(id_comment, user_id, id_lista){
  var msg =  document.getElementById(id_comment).value;

  $.post({
    url: "agregar_chat.php",
    data: {msg : msg, id_lista : id_lista, user_id: user_id},
  }).done(function(){
    console.log("agregado");

  
  });
  $("#chat2").load("play.php?nombre=<?php echo $nombre?> #chat2");

}


</script>

<?php
}
else
  header('Location: /cloud/index.php');

?>
