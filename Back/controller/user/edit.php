<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'cdn') or die(mysqli_error($mysqli));
if(isset($_POST['edit'])){

	$id = $_GET['id'];
	$user = $_POST['user'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$rol = $_POST['dropdown'];
	
		
	$mysqli->query("UPDATE  users SET user='$user',email='$email',password='$password',id_rol='$rol' WHERE id=$id") or die($mysqli->error());

	header("location:../../user.php");

}
?>