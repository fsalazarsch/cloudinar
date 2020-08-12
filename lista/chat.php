<?php

//session_start();

if (isset($_SESSION["user_id"])){

  //include "../config/header.html";

?>


<style>

.containerchat {
  width: 100%;
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
  margin-left: 15px;
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

      <div class="form-group" style="display: -webkit-box">
        <textarea id="padre2" class="form-control" rows="3" style="resize: none;width: 50%;margin-right :10px" placeholder="Tu Chat" minlength="2"></textarea>
      
      <button onclick="agregar_chat('padre2', <?php echo $_SESSION['user_id'] ?>, <?php echo $id_lista ?>)" class="btn btn-success">Enviar</button>
      </div>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  $db = new Database();
  $conn = $db->connect();

  $sql = "SELECT id, msg, fecha_hora, A.user_id, B.user_name FROM chat A, users B WHERE B.user_id = A.user_id  AND lista_id = ".$id_lista." ORDER BY fecha_hora DESC";
  $result = $conn->query($sql);
  echo '<div id="chatreload">';
  echo '<p>'.$result->num_rows.' Mensajes de Chats</p>';

  while($row = $result->fetch_assoc()){
    if($propietario != $row["user_id"]){
      echo '<div class="row"><div class="containerchat">';
      echo '<span><b style="color: blue">'.$row["user_name"].'</b> ('.date('d/m/Y H:i',strtotime($row["fecha_hora"])).') </span><br>';
      echo '<span>'.$row["msg"].'</span>';
      echo '</div></div>';
    }
    else{
      echo '<div class="row"><div class="containerchat">';
      echo '<span><b style="color: darkgreen">'.$row["user_name"].':</b> ('.date('d/m/Y H:i',strtotime($row["fecha_hora"])).')</span><br>';
      echo '<span>'.$row["msg"].'</span>';
      echo '</div></div>';      
    }
  }
echo '</div>';

?>
</div>
</div>


<script type="text/javascript">


function agregar_chat(id_comment, user_id, id_lista){
  var msg =  document.getElementById(id_comment).value;

  if( msg.length >= 2){
    $.post({
      url: "agregar_chat.php",
      data: {msg : msg, id_lista : id_lista, user_id: user_id},
    }).done(function(){
      console.log("agregado");

    });
    $("#chat2").load("play.php?nombre=<?php echo $nombre?> #chat2");
  }

}


</script>

<?php
}
else
  header('Location: /cloud/index.php');

?>
