<?php

session_start();
$mysqli = new mysqli('localhost','root','','cdn') or die(mysqli_error($mysqli));
$navRol = false;

if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {
        case 1:
            $navRol = true;
            // header("location:..\index.php");
            break;
        case 2:
            // header("location:..\index.php");
            break;
            
        default:
    }
}


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = "SELECT * FROM users WHERE user='$username' && password='$password'";

    $resultUser = mysqli_query($mysqli, $user);

    $numUser = mysqli_num_rows($resultUser);
    
    if ($numUser == 1) {
        $row = $resultUser->fetch_array();
        $rol = $row['id_rol'];
        $_SESSION['rol'] = $rol;
        switch ($_SESSION['rol']) {
            case 1:
                $navRol = true;
                header("location:..\index.php");
                break;
            case 2:
                header("location:..\index.php");
                break;
                
            default:
        }
    }else{
        header("location:../../login.php");
    }
}
?>