<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    
</head>

<body>
    <div class="container-fluid bkgd">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <span class="blog">Blog</span>
                <div class="col-8 offset-2 p-4 menu">
                <ul class="d-inline d-flex justify-content-around mt-4 menu">
                    <li class="d-inline"><i class="fas fa-home mr-1"></i><a href="./index.php" class="text-dark">Accueil</a></li>
                    <?php
                        session_start();
                        //session_destroy();
                        include ('connexion_traitement.php');
                        if ($_SESSION){
                            ;
                        echo ("<span class='text-success menu'> Tu es connecté(e) en tant que $_SESSION[usr_firstname]</span><a href='./newpost.php' class='text-success'><i class='fas fa-pen text-success mr-1'></i>Ecrire un article</a>");
                        echo ("<li class='d-inline menu'><i class='fas fa-user mr-1'></i><a href='./deconnexion.php' class='text-dark'>Deconnexion</a></li>");
                        }
                        else{
                            echo ("<li class='d-inline menu'><i class='fas fa-arrow-alt-circle-right mr-1'></i><a href='./form.php' class='text-dark'>Inscription</a></li>
                            ");
                            echo ("<li class='d-inline menu'><i class='fas fa-user mr-1'></i><a href='./connexion.php' class='text-dark'>Connexion</a></li>");
                            echo ("<span class='text-success menu'> Tu n'es pas connecté(e)</span>");
                        }?>
                </ul>
                </div>
            </div> 
        </div>
    </div>