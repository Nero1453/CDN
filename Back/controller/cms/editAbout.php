<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'cdn_cms') or die(mysqli_error($mysqli));
if(isset($_POST['edit'])){

	$todo = $_POST['todo'];
	$obj = $_POST['obj'];
		
	$mysqli->query("UPDATE  about SET todo='$todo',obj='$obj'") or die($mysqli->error());

	header("location:../../modAbout.php");

}
?>