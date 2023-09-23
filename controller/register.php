<?php


    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $mysqli = new mysqli("localhost","root","","creocette");
    $sql = "INSERT INTO users (id, username,email,password ) VALUES (NULL,'".$username."','".$email."','".$password."')";
    $mysqli->query($sql);
    header('Location: ../index.php');

?>