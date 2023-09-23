<?php 
$id= $_GET["id"];
$mysqli = new mysqli("localhost","root","","creocette");
$videolinkResult = $mysqli->query("SELECT videoUrl FROM recette WHERE id=$id");
$videolink= $videolinkResult->fetch_array(MYSQLI_ASSOC);
unlink('../'.$videolink['videoUrl']);
$result = $mysqli->query("DELETE FROM recette WHERE id=$id");
header('Location: ../index.php');

?>