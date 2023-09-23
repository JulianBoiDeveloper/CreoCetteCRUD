<?php 

$mysqli = new mysqli("localhost","root","","creocette");
$result = $mysqli->query("SELECT id, name,imgUrl, ingredient, recette,videoUrl,category FROM recette WHERE category=2");
$categorie = ["Entrée Froide","Entrée Chaude","Plat","Dessert"];
$rows = $result->fetch_all(MYSQLI_ASSOC);
?>




<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cuisine Creole - Plat</title>
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
                                        <a class="nav-link" aria-current="page" href="index.php">Accueil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="entree.php">Entrée</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">Plat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="dessert.php">Dessert</a>
                                    </li>

                                </ul>
                                <form class="d-flex" role="search">
                                    <input class="form-control me-2 custom_search" type="search" placeholder="Recherche..." aria-label="Search">
                                    <button class="btn btn-outline-success custom_button_search" type="submit">Rechercher</button>
                                </form>
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
    <!-- Contenu page -->
    <br>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                </div>
                <div class="col">
                </div>
                <div class="col">
                    <!-- Bouton Ajouter -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                    Ajouter une Creo'Cette
                </button>
            </div>
        </div>
        <div class="card-group" >
        <?php 
            for($i=0;$i<count($rows);$i++){
                echo '
                <a href="recette.php?id='.$rows[$i]['id'].'">
                    <div class="card  rounded" style="min-width: 20rem; max-width: 20rem; max-height: 30rem; min-height: 30rem; margin:2rem;">
                        <img class="card-img-top rounded-top" src="'. $rows[$i]['imgUrl'] .'" alt=""  style="max-height: 15rem; min-height: 15rem; ">
                        <div class="card-body">
                        <h5 class="card-title">'.$rows[$i]['name'] .'</h5>
                        <p class="card-text" style="text-overflow: ellipsis;">'. substr_replace($rows[$i]['recette'] , "...", 170) .'</p>
                        <p class="card-text"><small class="text-muted">'.$categorie[$rows[$i]['category']] .'</small></p>
                        </div>
                    </div>
                </a>
                ';
            }
            if(count($rows) == 0){
                echo '
                <div class="text-center w-100 pt-5"> Aucune recette ajouté ! Ajoutez en ! </div>
                ';
            }
        ?>
        </div>
    </div>
    <!-- Menu Ajouter -->
    <form action="controller/add_recette.php" method="post" enctype="multipart/form-data">
        <div class="modal" tabindex="-1" id="addModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- Creation de recette  -->
                        <h5 class="modal-title">Création de ta Creo'Cette</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Nom de la recette -->
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nom de la Creo'Cette</label>
                            <input type="text" name="recetteName" class="form-control" id="exampleFormControlInput1" placeholder="" require>
                            <label for="exampleFormControlInput3" class="form-label">Catégorie</label>
                            <select class="form-select" required="required" name="categorie">
                                <option value="0">Entrée Froide</option>
                                <option value="1">Entrée Chaude</option>
                                <option value="2">Plat</option>
                                <option value="3">Dessert</option>
                            </select>
                            <!-- Form FILE IMPORT -->
                            <div class="mb-3">
                                <label for="formFile" class="form-label" required="required">Image</label>
                                <input class="form-control" type="file" id="formFile" max-size="20" name="formFile" accept=".png,.jpeg,.jpg">
                            </div>
                            <div class="mb-3">
                                <label for="formVideo" class="form-label" required="required">Vidéo</label>
                                <input class="form-control" type="file" id="formVideo" max-size="10000" name="formVideo" accept=".mp4,.avi">
                            </div> 
                            <label for="exampleFormControlInput2" class="form-label" >Ingrédients</label>
                            <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="" name="ingredient" required="required">
                            <label for="exampleFormControlTextarea1" class="form-label" require>Recettes</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name="recette" required="required"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <input type="submit" class="btn btn-primary" value="Ajouter cette Creo'Cette"></button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>