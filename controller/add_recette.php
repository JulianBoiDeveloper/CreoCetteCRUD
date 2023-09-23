<?php

    
    $url = $_FILES['formFile'];
    $video = $_FILES['formVideo'];
    $name = $_POST["recetteName"];
    $category = $_POST["categorie"];
    $ingredient=$_POST["ingredient"];
    $recette=$_POST["recette"];


    $image = $url['tmp_name'];
    $type = "png";
    $data = file_get_contents($image);
    $dataUri = 'data:image/'.$type.';base64,' . base64_encode($data);
    $name_video = $video['name'];
    $name_video_tmp = $video['full_path'];
    $name_video_tab = explode(".", $name_video_tmp);
    $type_video = $name_video_tab[count($name_video_tab)-1];
    $video_path_url = $video['tmp_name'];
    $url_page = uniqid("",true);
    $url_video = 'video-'.$url_page.'.'.$type_video;
    $path_video = "media\\video\\";
    $dir = getcwd();
    $replace_dir = str_replace('controller', "",$dir);
    $upload_url = $replace_dir . $path_video.$url_video;
    
    
    
    move_uploaded_file($video_path_url,$upload_url);

    

    $mysqli = new mysqli("localhost","root","","creocette");
    $url_fake = mysqli_real_escape_string($mysqli, $upload_url);
    $sql = "INSERT INTO recette (id, name, imgUrl, ingredient, recette,videoUrl,category) VALUES (NULL, '".$name."', '".$dataUri."', '".$mysqli->real_escape_string($ingredient)."', '".$mysqli->real_escape_string($recette)."', '".$mysqli->real_escape_string($path_video . $url_video)."',".$category.")";
    $mysqli->query($sql);
     header('Location: ../index.php');

?>



