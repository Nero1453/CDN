<?php
	session_start();
    $mysqli = new mysqli('localhost','root','','cdn') or die(mysqli_error($mysqli));
 
	if(isset($_POST['edit'])){
		$id = $_GET['id'];
	    $tarea = $_POST['tarea'];
			
		$mysqli->query("UPDATE todo SET tarea='$tarea' WHERE id=$id") or die($mysqli->error());

		header('location: ../../todo.php');
    }
?>