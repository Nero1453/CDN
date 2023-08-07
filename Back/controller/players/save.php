<?php


$tarea = '';
$update = false;

$mysqli = new mysqli('localhost','root','','cdn') or die(mysqli_error($mysqli));

if (isset($_POST['save'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nac = $_POST['fecha_nac'];
    $dropdownEquipo1=$_POST['dropdownEquipo1'];


    $mysqli->query("INSERT INTO tbljugadores (nombre,apellido,fecha_nac) VALUES ('$nombre','$apellido','$fecha_nac')") or die($mysqli->error());
    $resultDiv = $mysqli->query("SELECT id FROM tbljugadores ORDER BY id DESC LIMIT 1") or die($mysqli->error());
    
    while ($row1 = $resultDiv->fetch_assoc()){
        $idJugador =  $row1['id'];
    }

    $mysqli->query("INSERT INTO transjugadores_equipo (Id_jugador,Id_equipo,Fecha_alta_jug) VALUES ('$idJugador','$dropdownEquipo1',CURDATE())");

    $_SESSION['message'] = "Jugador guardada correctamente";
    $_SESSION['msg_type'] = "success";

    header("location:../../player.php");
}

?>