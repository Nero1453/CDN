<?php
	session_start();
    $mysqli = new mysqli('localhost','root','','cdn') or die(mysqli_error($mysqli));
 
	if(isset($_POST['edit'])){
		$id = $_GET['id'];
		$nombre = $_POST['nombre'];
    	$apellido = $_POST['apellido'];
	
		$mysqli->query("UPDATE  tblarbitros SET nombre='$nombre',apellido='$apellido' WHERE id=$id") or die($mysqli->error());

		header("location:../../arbitro.php");
    }
?>