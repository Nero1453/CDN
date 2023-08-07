<?php


$tarea = '';
$update = false;

$mysqli = new mysqli('localhost','root','','cdn') or die(mysqli_error($mysqli));

if (isset($_POST['save'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];


    $mysqli->query("INSERT INTO tblarbitros (nombre,apellido) VALUES ('$nombre','$apellido')") or die($mysqli->error());

    $_SESSION['message'] = "Tarea guardada correctamente";
    $_SESSION['msg_type'] = "success";

    header("location:../../arbitro.php");
}

?>