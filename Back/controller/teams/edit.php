<?php
	session_start();
    $mysqli = new mysqli('localhost','root','','cdn') or die(mysqli_error($mysqli));
 
	if(isset($_POST['edit'])){
		$id = $_GET['id'];
		$nombre = $_POST['nombre'];
		$fecha_inscripcion = $_POST['fecha_inscripcion'];
		$campeonato = $_POST['dropdown'];
   		$fecha_baja = $_POST['fecha_baja'];


			
		$mysqli->query("UPDATE  tblequipos SET nombre='$nombre',fecha_inscripcion='$fecha_inscripcion',fecha_baja='$fecha_baja',id_campeonato='$campeonato' WHERE id=$id") or die($mysqli->error());

		header("location:../../team.php");
    }
?>