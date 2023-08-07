<?php


$tarea = '';
$update = false;

$mysqli = new mysqli('localhost','root','','cdn') or die(mysqli_error($mysqli));

if (isset($_POST['save'])) {
    $nombre = $_POST['nombre'];
    $observacion = $_POST['observacion'];

    

    $mysqli->query("INSERT INTO tblcanchas (nombre,observacion) VALUES ('$nombre','$observacion')") or die($mysqli->error());

    $_SESSION['message'] = "Tarea guardada correctamente";
    $_SESSION['msg_type'] = "success";

    header("location:../../cancha.php");
}

?>