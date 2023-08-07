<?php


$tarea = '';
$update = false;

$mysqli = new mysqli('localhost','root','','cdn') or die(mysqli_error($mysqli));

if (isset($_POST['save'])) {
    $tarea = $_POST['todo'];

    $mysqli->query("INSERT INTO todo (tarea) VALUES ('$tarea')") or die($mysqli->error());

    $_SESSION['message'] = "Tarea guardada correctamente";
    $_SESSION['msg_type'] = "success";

    header("location:../../todo.php");
}

?>