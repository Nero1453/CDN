<?php

$mysqli = new mysqli('localhost','root','','cdn') or die(mysqli_error($mysqli));

if (isset($_POST['save'])) {
    $jugador = $_POST['jugador'];
    $equipo = $_POST['equipo'];
    $sancion = $_POST['sancion'];
    $cantidad_fechas = $_POST['cantidad_fechas'];
    //$getDate = date('m/d/Y');

    $mysqli->query("INSERT INTO tblsanciones (jugador,equipo,descripcion,cantidad,fecha) VALUES ('$jugador','$equipo','$sancion','$cantidad_fechas',CURDATE())") or die($mysqli->error());
    $_SESSION['message'] = "Sancion guardada correctamente";
    $_SESSION['msg_type'] = "success";

    header("location:../../todo.php");
}

?>


