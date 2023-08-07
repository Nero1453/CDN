<?php
	session_start();
    $mysqli = new mysqli('localhost','root','','cdn') or die(mysqli_error($mysqli));
 
	if(isset($_POST['edit'])){
		$id = $_GET['id'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$fecha_nac = $_POST['fecha_nac'];
		$dropdownEquipo1 = $_POST['dropdownEquipo1'];
		$dropdownEquipo2 = $_POST['dropdownEquipo2'];

		$mysqli->query("UPDATE tbljugadores SET nombre='$nombre',apellido='$apellido',fecha_nac='$fecha_nac' WHERE id=$id") or die($mysqli->error());
		
		if (isset($_POST['dropdownEquipo1'])) {
			$mysqli->query("INSERT INTO transjugadores_equipo (Id_jugador,Id_equipo,Fecha_alta_jug) VALUES ('$id','$dropdownEquipo1',CURDATE())");
		}
		if (isset($_POST['dropdownEquipo2'])) {
			$mysqli->query("INSERT INTO transjugadores_equipo (Id_jugador,Id_equipo,Fecha_alta_jug) VALUES ('$id','$dropdownEquipo2',CURDATE())");
		}
		
		header("location:../../player.php");
    }
?>