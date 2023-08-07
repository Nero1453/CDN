<?php

$mysqli = new mysqli('localhost','root','','cdn') or die(mysqli_error($mysqli));

if (isset($_POST['save'])) {
    
    $equipo = (int) $_POST['dropdownEquipos'];
    $jugador = (int)$_POST['dropdownJugadores'];
    $goles = (int) $_POST['goles'];
    $idJugador = '';

    $resultDiv = $mysqli->query("SELECT Id FROM transjugadores_equipo WHERE Id_jugador = '$jugador' AND Id_equipo = '$equipo'") or die($mysqli->error());
   
    while ($row1 = $resultDiv->fetch_assoc()){
        $idJugador =  $row1['Id'];
    }
    
    $mysqli->query("INSERT INTO tblgoleadores (Id_jugador,Goles) VALUES ('$idJugador','$goles')") or die($mysqli->error());

    $_SESSION['message'] = "Goleador guardado correctamente";
    $_SESSION['msg_type'] = "success";

    header("location:../../goleadores.php");
}

?>