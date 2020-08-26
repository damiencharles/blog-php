<?php
$id = $_GET['id'];
$cat = categorieList($id);
$catID = $cat['ID'];
$artCategories = getArticlesFromCat($catID);
$categories =  categorie();

//$articles = getArticles();

//print_r();
?>

<div class="container">
    <div class="row mt-3 p-4">

    <div class="col-4 offset-8 text-center bg-light p-2 rounded mb-3">
            <i class="fas fa-pizza-slice text-warning mr-2"></i>Catégories : <?php foreach ($categories as $categorie) {
                    echo ("<span class='badge badge-warning ml-2 mt-1 categorie'><a class='text-white' href="."categorie.php?id="."$categorie[ID]>$categorie[nom_categorie]</a></span>");}?>
            </div>

        <div class="col-12 text-center mt-4">
            <h1><?php echo $cat["nom_categorie"]?></h1>
            </div>

            <?php 
        foreach ($artCategories as $artCategorie) {
            echo ("<div class='col-sm-12 col-md-6 col-lg-4 text-center text-dark mt-5'><h4>$artCategorie[titre]<h4>
            <img class='img-fluid image' src='$artCategorie[image]'><br>
            <a href="."./article.php?id="."$artCategorie[ID]><button type='button' class='btn btn-lg btn-outline-light bouton mt-2'>Lire l'article</button></a></div>");
        }
?>
        
        
        
    </div>
</div>