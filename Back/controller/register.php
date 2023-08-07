<?php

session_start();

$mysqli = new mysqli('localhost','root','','cdn') or die(mysqli_error($mysqli));

if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $userq = "SELECT * FROM users WHERE user='$username' && email='$email'";

    $resultUser = mysqli_query($mysqli, $userq);

    $numUser = mysqli_num_rows($resultUser);

    if ($numUser == 1) {
        echo "Usuario o email ya existente";
    }else{
        if ($password == $password2) {
            $reg = "INSERT INTO users (user,email,password) VALUES ('$username','$email','$password')" or die($mysqli->error());
            mysqli_query($mysqli,$reg);
            
            header("location:../../login.php");
        } else {
            echo "Contraseña no son iguales";
        }
        
    }
}
