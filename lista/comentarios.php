<?php

//session_start();

if (isset($_SESSION["user_id"])){

  include "../config/header.html";
//  include './config/conneccion.php';

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="../config/chat.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<!------ Include the above in your HEAD tag ---------->


<div class="container">
  <div class="post-comments">

      <div class="form-group" style="display: -webkit-box">
        <textarea id="padre" class="form-control" rows="3" style="resize: none;width: 50%;margin-right :10px" placeholder=" Tu Comentario"></textarea>
      
      <button onclick="agregar_comentario('padre', <?php echo $_SESSION['user_id'] ?>, <?php echo $id_lista ?>, '')" class="btn btn-success">Enviar</button>
      </div>
      
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  $db = new Database();
  $conn = $db->connect();
  $res = $conn->query("SELECT comment_id FROM comments WHERE Lista_id = ".$id_lista);
    $nRows = $res->num_rows;

    echo '<p>'. $nRows.' Comentarios</p>';

  $sql = "SELECT comment_id, descripcion, votes, comment_father_id, lista_id, A.user_id, fecha_hora, B.user_name FROM comments A, users B WHERE  B.user_id = A.user_id AND lista_id = ".$id_lista." AND  comment_father_id IS NULL ORDER BY votes DESC";
  $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){

?>

    <div class="row">

      <div class="media" style="width: 100%">
        <div class="media-heading">
          </div>
          <div class="panel-collapse collapse in">
            <div class="media-left">
              <div class="vote-wrap">

              </div>
            </div>
            <div class="media-body">
              <p> 
                 <?php if( $row["user_id"] != $propietario) { ?>
                    <b style="color: blue">
                 <?php } else{ ?>
                    <b style="color: darkgreen">
                 
                 <?php }?>
                  
                  <?php echo $row['user_name']?></b> (<?php echo date('d/m/Y', strtotime($row['fecha_hora']));?>)<br> <?php echo $row['descripcion']?></p>
              <div class="comment-meta">

              <span>
                        <span class="label label-info" style="padding :.1em 0.6em 0.1em;font-size: 100%"><?php echo $row['votes']?></span>

                        <a onclick="like(<?php echo $row['comment_id']?>, <?php echo $_SESSION['user_id'] ?>, 1);"><i class="fa fa-2x fa-thumbs-up"></i></a>
                        <a onclick="like(<thumbs-up?php echo $row['comment_id']?>, <?php echo $_SESSION['user_id'] ?>, -1);"><i class="fa fa-2x fa-thumbs-down"></i></a>
                        <a class="" role="button" data-toggle="collapse" onclick="aparecer('comentario_<?php echo $row['comment_id']?>')" aria-expanded="false" aria-controls="collapseExample">Responder</a>
                      </span>
              <div class="collapse" id="comentario_<?php echo $row['comment_id']?>">
                    <div class="form-group" style="display: -webkit-box">
                      <textarea id="hijo_<?php echo $row['comment_id'] ?>" class="form-control" rows="3" style="resize: none;margin-right :10px" placeholder=" Agregar comentario"></textarea>
                    
                    <button  onclick="agregar_comentario('hijo_<?php echo $row['comment_id'] ?>', <?php echo $_SESSION['user_id'] ?>, <?php echo $id_lista ?>, <?php echo $row['comment_id'] ?>)" class="btn btn-success">Post</button></div>
                </div>
              </div>

            <!-- comments -->

            <?php

            $sql = "SELECT comment_id, descripcion, votes, comment_father_id, lista_id, A.user_id, fecha_hora, B.user_name FROM comments A, users B WHERE  B.user_id = A.user_id AND lista_id = ".$id_lista." AND  comment_father_id = ".$row['comment_id']." ORDER BY votes DESC";
              $result2 = $conn->query($sql);
              while($row2 = $result2->fetch_assoc()){

            ?>

                  <div class="media" style="width: 100%">
        <div class="media-heading">
            
          </div>
          <div class="panel-collapse collapse in">
            <div class="media-left">
              <div class="vote-wrap">
              </div>
            </div>
            <div class="media-body">
              <p> 
              <?php if( $row["user_id"] != $propietario) { ?>
                <b style="color: blue">
              <?php } else{ ?>
                <b style="color: darkgreen">
                <?php }?>

                  <?php echo $row2['user_name']?></b> (<?php echo date('d/m/Y', strtotime($row2['fecha_hora']));?>)<br> <?php echo $row2['descripcion']?></p>
                            <div class="comment-meta">

              <span>
                        <span class="label label-info" style="padding :.1em 0.6em 0.1em;font-size: 100%"><?php echo $row2['votes']?></span>
                        <a onclick="like(<?php echo $row2['comment_id']?>, <?php echo $_SESSION['user_id'] ?>, 1);"><i class="fa fa-2x fa-thumbs-up"></i></a>
                        <a onclick="like(<?php echo $row2['comment_id']?>, <?php echo $_SESSION['user_id'] ?>, -1);"><i class="fa fa-2x fa-thumbs-down"></i></a>
                        
                      </span>
              </div>       
            </div>
          </div>
        </div>
<?php
}
?>
            <!-- fin commentario-->
            </div>
          </div>
        </div>



    </div>
<?php
}
?>
  </div>
  <!-- post-comments -->
</div>



<script type="text/javascript">
 
  function aparecer(id){

    if( $( "#"+id ).hasClass( "collapse" ) ){
      $('#'+id).show(500).removeClass('collapse');

    }
    else
      $('#'+id).hide(500).addClass('collapse');

  }

function like(comment_id, user_id, x){

  $.ajax({
    url: "like.php",
    data: {comment_id : comment_id, user_id: user_id, cantidad: x},
    method:"POST"
  }).done(function() {
    console.log("listo");
  });

  console.log(comment_id, user_id, x);
  $("#comentarios").load("play.php?nombre=<?php echo $nombre?> #comentarios");
}


function agregar_comentario(id_comment, user_id, id_lista, id_padre){
  var coment =  document.getElementById(id_comment).value;
   if( coment.length >= 2){
  $.post({
    url: "agregar_comentario.php",
    data: {comment : coment, id_lista : id_lista, user_id: user_id, id_padre: id_padre},
  }).done(function(){
    console.log("agregado");

  
  });
  $("#comentarios").load("play.php?nombre=<?php echo $nombre?> #comentarios");
  }
}


</script>

<?php
}
else
  header('Location: /cloud/index.php');

?>
