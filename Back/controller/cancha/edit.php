<?php
	session_start();
    $mysqli = new mysqli('localhost','root','','cdn') or die(mysqli_error($mysqli));
 
	if(isset($_POST['edit'])){
		$id = $_GET['id'];
		$nombre = $_POST['nombre'];
		$observacion = $_POST['observacion'];

			
		$mysqli->query("UPDATE tblcanchas SET nombre='$nombre',observacion='$observacion' WHERE id=$id") or die($mysqli->error());

		header("location:../../cancha.php");
    }
?>