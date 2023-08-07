<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'cdn_cms') or die(mysqli_error($mysqli));
if(isset($_POST['edit'])){

	$cancha = $_POST['cancha'];
	$circuito = $_POST['circuito'];
	$cerrado = $_POST['cerrado'];
	$arbitros = $_POST['arbitros'];
	$todo = $_POST['todo'];
		
	$mysqli->query("UPDATE servicios SET service_one='$cancha',service_two='$circuito',service_three='$cerrado',service_four='$arbitros',todo='$todo'") or die($mysqli->error());

	header("location:../../modService.php");

}
