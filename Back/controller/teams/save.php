<?php


$tarea = '';
$update = false;

$mysqli = new mysqli('localhost','root','','cdn') or die(mysqli_error($mysqli));

if (isset($_POST['save'])) {
    $nombre = $_POST['nombre'];
    $fecha_inscripcion = $_POST['fecha_inscripcion'];
    $campeonato = $_POST['dropdown'];


    $mysqli->query("INSERT INTO tblequipos (nombre,fecha_inscripcion,id_campeonato) VALUES ('$nombre','$fecha_inscripcion','$campeonato')") or die($mysqli->error());

    $_SESSION['message'] = "Tarea guardada correctamente";
    $_SESSION['msg_type'] = "success";

    header("location:../../team.php");
}

?>