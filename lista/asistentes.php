<?php  session_start(); ?>
<?php include '../config/conneccion.php'; ?>

<?php
	if (isset($_SESSION["user_id"])){
		$db = new Database();
		$conn = $db->connect();
		$sql = "SELECT distinct user_id, user_name, user_email, B.profession, C.university, user_company FROM users A, professions B, universities C WHERE user_type = 1 AND A.university_id <> 0 AND B.profession_id = A.profession_id AND C.university_id = A.university_id";
		$usuarios = $conn->query($sql); 

		$sql = "SELECT distinct user_id, user_name, user_email, B.profession, '', user_company FROM users A, professions B WHERE user_type = 1 AND A.university_id = 0 AND B.profession_id = A.profession_id";
		$usuarios2 = $conn->query($sql); 



		$filename = "usuarios.xls";
		
		header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
		header("Content-Disposition: attachment; filename=".$filename);

		$mostrar_columnas = false;

		foreach($usuarios as $item) {
			$item =  mb_convert_encoding($item,'utf-16','utf-8');
			if(!$mostrar_columnas) {
				echo implode("\t", array_keys($item)) . "\n";
				$mostrar_columnas = true;
			}
			echo implode("\t", array_values($item)) . "\n";
		}

		foreach($usuarios2 as $item) {
			$item =  mb_convert_encoding($item,'utf-16','utf-8');
			if(!$mostrar_columnas) {
				echo implode("\t", array_keys($item)) . "\n";
				$mostrar_columnas = true;
			}
			echo implode("\t", array_values($item)) . "\n";
		}
	}
	else
		header('Location: /cloud/index.php');

?>