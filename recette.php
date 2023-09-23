<?php 
$id= $_GET["id"];
$mysqli = new mysqli("localhost","root","","creocette");
$result = $mysqli->query("SELECT id, name,imgUrl, ingredient, recette,videoUrl,category FROM recette WHERE id=$id");
$categorie = ["Entrée Froide","Entrée Chaude","Plat","Dessert"];
$rows = $result->fetch_array(MYSQLI_ASSOC);

?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cuisine Creole - <?php echo $rows['name']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css"> 
    <script src="script/script.js"></script>
</head>
<body>
<div class="custom_menu">
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-8 custom_center">
        <!-- Contenu menu -->
            <div class="container">
            <div class="row">
                <div class="col custom_title" id="Menu_tel">
                Créo'  Cette
                </div>
                <div class="col-8">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="entree.php">Entrée</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="plat.php">Plat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="dessert.php">Dessert</a>
                                </li>

                            </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col">

                <?php
                    if(isset($_COOKIE['nameuser'])){
                        echo' <a href="controller/deconnexion.php"><div class="custom_profil">'.$_COOKIE['nameuser'].'</div></a>';
                    }else{
                        echo '
                            <button type="button" class="btn btn-primary custom_button_login" data-bs-toggle="modal" data-bs-target="#loginModal">
                                Login
                            </button>
                            <button type="button" class="btn btn-primary custom_button_login" data-bs-toggle="modal" data-bs-target="#registerModal">
                                Register
                            </button>
                        ';
                    }
                ?>

            </div>
            
            </div>
        </div>
        <div class="col">
        </div>
    </div>
</div>
 <!-- Login Windows -->
<form action="controller/connexion.php" method="get">
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content custom_login">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="loginModalLabel">Connectez-vous</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Adresse mail</label>
                        <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="col-form-label">Mot de passe</label>
                        <input name="password" type="password" class="form-control" id="inputPassword">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermé</button>
                    <input type="submit" value="Enregistré" class="btn btn-primary"></input>
                </div>
            </div>
        </div>
        </div>
    </div>
</form>
 <!-- Register Windows -->
 <form action="controller/register.php" method="post">
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content custom_login">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="loginModalLabel">Enregister-vous</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nom d'utilisateur</label>
                        <input name="username" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Adresse mail</label>
                        <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="col-form-label">Mot de passe</label>
                        <input name="password" type="password" class="form-control" id="inputPassword">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermé</button>
                    <input type="submit" value="Enregistré" class="btn btn-primary"></input>
                </div>
            </div>
        </div>
        </div>
    </div>
</form>

<div class="mx-auto text-center" style="width: 1000px;">
    <div class="d-flex flex-row-reverse p-1">
        <a href="<?php echo 'controller/delete_recette.php?id='.$id; ?>" type="button" class="btn btn-danger">
                Supprimer la Creo'Cette
        </a>
    </div>
    <div class="p-5">
        <h1><?php echo $rows['name']?></h1>
        <p class="card-text"><small class="text-muted"><?php echo $categorie[$rows['category']]?> </small></p>
    </div>
    
    <div class="card mb-3">
        <img class="card-img-top" src="<?php echo $rows['imgUrl']?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Ingrédient</h3>
            <p class="card-text"><?php echo str_replace("  ", "<br>",$rows['ingredient'] ); ?></p>
            <h5 class="card-title">Recettes</h3>
            <p class="card-text"><?php echo  str_replace("  ", "<br>",$rows['recette'] ) ?> </p>
            <h5 class="card-title">Voir la recette en image</h3>
            <video width="400" controls>
                <source src="<?php echo $rows['videoUrl']?>" type="video/webm">
                <source src="<?php echo $rows['videoUrl']?>" type="video/mp4">
                <source src="<?php echo $rows['videoUrl']?>" type="video/avi">
            </video>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
