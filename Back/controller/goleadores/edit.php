<?php
	session_start();
    $mysqli = new mysqli('localhost','root','','cdn') or die(mysqli_error($mysqli));
 
	if(isset($_POST['edit'])){
		$id = $_GET['id'];
	    $goles = $_POST['Goles'];
        
        $mysqli->query("UPDATE tblgoleadores SET Goles='$goles' WHERE id=$id") or die($mysqli->error());

		header('location: ../../goleadores.php');
    }
?>