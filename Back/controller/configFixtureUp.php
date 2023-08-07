<?php
if (isset($_POST['save-fixture'])) {
    $idFecha = $_POST['idfecha'];
    $hora = $_POST['hora'];
    $cancha = $_POST['dropdownCancha'];
    $a = $_POST['dropdownArbitro'];
    $l1 = $_POST['dropdownLinea1'];
    $l2 = $_POST['dropdownLinea2'];
    $mysqli = new mysqli('localhost', 'root', '', 'cdn') or die(mysqli_error($mysqli));
    $into = ("INSERT INTO tblfixture (id_fecha,id_cancha,id_arbitro,id_arbitro_linea1,id_arbitro_linea2,horario) VALUES ('$idFecha','$cancha','$a','$l1','$l2','$hora')") or die($mysqli->error());
    mysqli_query($mysqli, $into);
    header('location:../configFixture.php');
}

if (isset($_POST['edit-fixture'])) {
    $idFecha = $_POST['idfecha'];
    $hora = $_POST['hora2'];
    $cancha = $_POST['dropdownCancha'];
    $a = $_POST['dropdownArbitro'];
    $l1 = $_POST['dropdownLinea1'];
    $l2 = $_POST['dropdownLinea2'];
    $mysqli = new mysqli('localhost', 'root', '', 'cdn') or die(mysqli_error($mysqli));
    $mysqli->query("UPDATE  tblfixture SET id_cancha='$cancha',id_arbitro='$a',id_arbitro_linea1='$l1',id_arbitro_linea2='$l2',horario='$hora' WHERE id_fecha = '$idFecha'") or die($mysqli->error());

    mysqli_query($mysqli, $edit);
    header('location:../configFixture.php');
}
?>
