<?php 
//session_start();
//$articles = getArticles();
//var_dump($articles);
//print_r($articles);
$categories =  categorie();
//$auteurs = auteur();
?>

<div class="container-fluid text-center">
    <div class="row mt-3 p-4">

            <div class="col-4 offset-8 text-center bg-light p-2 rounded mb-3">
            <i class="fas fa-pizza-slice text-warning mr-2"></i>Catégories : <?php foreach ($categories as $categorie) {
                    echo ("<span class='badge badge-warning ml-2 mt-1 categorie'><a class='text-white' href="."categorie.php?id="."$categorie[ID]>$categorie[nom_categorie]</a></span>");}?>
            </div>
        
            <div class="col-12 d-flex justify-content-center order-12 mt-4">
            <?php $articles = getArticles();?>
            </div>
    
    
        <?php 
        foreach ($articles as $article) {
            echo ("<div class='col-sm-12 col-md-6 col-lg-4 text-dark mt-5 img'><h2 class='titreArt'>$article[titre]<h2>
            <img class='img-fluid image' src='$article[image]'><br>
            <a href="."./article.php?id="."$article[ID]><button type='button' class='btn btn-lg btn-outline-light bouton mt-2'>Lire l'article</button></a></div>");
        }
?>
    </div>

    <div>
        <?php 
        
        ?>
    </div>
</div>
