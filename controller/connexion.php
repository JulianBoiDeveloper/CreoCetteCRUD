<?php
    $mysqli = new mysqli("localhost","root","","creocette");
    $result = $mysqli->query("SELECT id, username,email FROM users WHERE email='".$_GET["email"]."' AND password='".$_GET["password"]."'");
    // Tableau : ID,username,email
    // Index   : 0,1,2
    $row = $result->fetch_array(MYSQLI_NUM);
    if ($row != null ){
        $username= $row[1];
        $id= $row[0];
        setcookie('nameuser',$username,0,'/');
        header('Location: ../index.php');
    }
    else{
        echo "Vous n'ètes pas connectez.";
    }
?>