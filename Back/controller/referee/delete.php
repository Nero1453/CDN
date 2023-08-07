<?php
	session_start();
    $mysqli = new mysqli('localhost','root','','cdn') or die(mysqli_error($mysqli));

	if(isset($_GET['id'])){
        $id = $_GET['id'];
	
		$mysqli->query("DELETE FROM tblarbitros WHERE id=$id") or die($mysqli->error());

        header("location:../../arbitro.php");
    }

?>