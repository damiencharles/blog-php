<?php 
$id = $_GET['id'];
$articles = getInfoArticles($id);
$auteurId = $articles["article_auteur"];
$catId = $articles["article_categorie"];
$auteur = getArticles_auteur($id);
$categorie = getCategorie_article($id);
$commentaires = getCommentaire($id);
$allArticles = getArticleFromAuteur($auteurId);
//print_r ($commentaire);

?>

<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
        <h2 class="titre"><?php echo $articles['titre']?></h2>
    <span>Ecrit par <?php echo $auteur['prenom']." ".$auteur['nom']." "?>le <?php echo $articles['date_creation']?></span>

        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 mt-4">
                <div>
                <img class="img-fluid" style="border-radius: 5%;" src="<?php echo $articles['image']?>">
                </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-6 text-justify mt-4">
        <?php echo $articles['texte']?><br>
        <?php echo ("<div class='badge badge-pill bg-warning mt-5'><a href='categorie.php?id=$catId' class='text-dark'>$categorie[nom_categorie]</a></div>")?>

        </div>

        <div class="col-12">
            <hr>
        
            <div>
                <i>Ecrire un commentaire</i>
            </div>
            <form action="commentaire.php?id=<?php echo $id?>" method="post"  class="mt-4">
                        <div class="form-group">
                            <label for="titre">Votre nom</label>
                            <input type="text" class="form-control w-50" name="auteur_commentaire" id="auteur_commentaire">
                        </div>

                        <div class="form-group">
                            <label for="texte">Commentaire</label>
                            <textarea class="form-control" rows=3 name="commentaire" id="commentaire"></textarea>
                        </div>

                        <div class="mt-4">
                        <button type="submit" class="btn btn-success mt-3 mb-5">Envoyer</button>
                        </div>
                </form>

                <h3>Commentaire(s):</h3>
                <hr>
                    <div>
                        <?php
                        foreach ($commentaires as $commentaire){
                            echo ("<div class='font-weight-bold'>$commentaire[auteur_commentaire]</div>");
                            echo ("<div><i>$commentaire[date_commentaire]</i></div>");
                            echo ("<div class='mb-5'>$commentaire[commentaire]</div><hr>");
                        }
                        ?>
                    </div>
        </div>

        <div class="col-12 mt-4">
            <h4>Articles de <?php echo $auteur['prenom']." ".$auteur['nom']." "?></h4>
        
                <?php foreach ($allArticles as $allArticle){
                    //var_dump($allArticle);
                        echo ("<a href='article.php?id=$allArticle[ID]'><img class='img-fluid w-25 little' src='$allArticle[image]'></a>");
                    }?>
        </div>
                
    </div>
</div>
