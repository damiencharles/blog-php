<?php 
include('bdd_connection.php');

//FONCTION ARTICLES

function getArticles (){
    $bdd = dbconnect();
    $resultFoundRows = $bdd->query('SELECT count(ID) FROM `Articles`');
    $nombredElementsTotal = $resultFoundRows->fetchColumn();
    $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
    $limite = 10;
    $debut = ($page - 1) * $limite ;
    $nombreDePages = ceil($nombredElementsTotal / $limite);
    $query = "SELECT * FROM Articles LIMIT $debut,$limite";
    $articles = $bdd->query($query)->fetchALL(PDO::FETCH_ASSOC);
    if ($page > 1):
        ?><a href="?page=<?php echo $page - 1; ?>" class="text-dark" >Page précédente</a><?php
    endif;
    
    /* On va effectuer une boucle autant de fois que l'on a de pages */
    for ($i = 1; $i <= $nombreDePages; $i++):
        ?><a href="?page=<?php echo $i; ?>" class="text-dark mx-2"><?php echo "[".$i."]"; ?></a><?php
    endfor;
    
    /* Avec le nombre total de pages, on peut aussi masquer le lien
     * vers la page suivante quand on est sur la dernière */
    if ($page < $nombreDePages):
        ?>— <a href="?page=<?php echo $page + 1; ?>" class="text-dark ml-2">Page suivante</a><?php
    endif;
    return $articles;
}

function getArticleFromAuteur($auteurId){
    $bdd = dbconnect();
    $query= 'SELECT * FROM Articles
    WHERE Articles.article_auteur ='.$auteurId;
    $articles = $bdd->query($query)->fetchALL(PDO::FETCH_ASSOC);
    return $articles;
}

function getInfoArticles($id) {
    $bdd = dbconnect();
    $query_infos= 'SELECT * FROM Articles
    WHERE Articles.id='.$id;
    $articles_info = $bdd->query($query_infos)->fetch(PDO::FETCH_ASSOC);
    return $articles_info;
}

//FONCTION AUTEUR ET CATEGORIE

function auteur(){
    $bdd = dbconnect();
    $query = "SELECT * FROM Auteurs";
    $resultat= $bdd->query($query)->fetchAll(PDO::FETCH_ASSOC);
    return $resultat;
}

function getArticles_auteur($id){
    $bdd = dbconnect();
    $query_articles_auteur = "SELECT * FROM Articles
    INNER JOIN Auteurs on Auteurs.ID = Articles.article_auteur
    WHERE Articles.ID=".$id;
    $articles_auteur = $bdd->query($query_articles_auteur)->fetch(PDO::FETCH_ASSOC);
    return $articles_auteur;
    
}

function getCategorie_article($id){
    $bdd = dbconnect();
    $query_articles_categorie = "SELECT * FROM Articles
    INNER JOIN Catégorie on Catégorie.ID = Articles.article_categorie
    WHERE Articles.ID=".$id;
    $articles_categorie = $bdd->query($query_articles_categorie)->fetch(PDO::FETCH_ASSOC);
    return $articles_categorie;
}

function categorie(){
    $bdd = dbconnect();
    $query = "SELECT * FROM Catégorie";
    $resultat= $bdd->query($query)->fetchAll(PDO::FETCH_ASSOC);
    return $resultat;
}

function getArticlesFromCat($catID){
    $bdd = dbconnect();
    $query = "SELECT * FROM Articles
    /*INNER JOIN Catégorie on Articles.article_categorie = Catégorie.ID*/
    WHERE Articles.article_categorie=".$catID;
    $artFromCat = $bdd->query($query)->fetchALL(PDO::FETCH_ASSOC);
    return $artFromCat;
}

function categorieList($id){
    $bdd = dbconnect();
    $query = "SELECT * FROM Catégorie
    WHERE Catégorie.ID=".$id ;
    $categorie = $bdd->query($query)->fetch(PDO::FETCH_ASSOC);
    //var_dump($categorie);
    return $categorie;
}

//FONCTION COMMENTAIRE

function getCommentaire($id){
    $bdd = dbconnect();
    $query_commentaire = "SELECT * FROM Commentaires
    INNER JOIN Commentaire_Article on Commentaire_Article.ID_commentaire = Commentaires.ID
    INNER JOIN Articles on Commentaire_Article.ID_article = Articles.ID
    WHERE Articles.ID=".$id;
    $articles_commentaire = $bdd->query($query_commentaire)->fetchAll(PDO::FETCH_ASSOC);
    return $articles_commentaire;
}

function newCom($nom, $commentaire,$id){
    $bdd = dbconnect();
    if ($nom !="" && $commentaire !="")
    $query = "INSERT INTO Commentaires (auteur_commentaire, commentaire)
    VALUES (:auteur_commentaire, :commentaire)";
    $stmt = $bdd->prepare($query);
    $success = $stmt ->execute(['auteur_commentaire'=>$nom, 'commentaire'=>$commentaire]);
        if ($success){
            $lastcom = $bdd->lastInsertId();
            $lastid = 'INSERT INTO Commentaire_Article (ID_commentaire, ID_article)
            VALUES (:ID_commentaire, :ID_article)';
            $newstmt = $bdd->prepare($lastid); 
            $req = $newstmt ->execute(['ID_commentaire'=>$lastcom, 'ID_article'=>$id]);
            header('location:article.php?id='.$id);
            exit;
        }
    $res = $stmt->fetchAll();
    return $res;

        }


// NOUVEL AUTEUR 

function newAuteur ($nom, $prenom, $email, $passwordCrypt){
    $bdd = dbconnect();
    if ($nom !="" && $prenom !="" && $email !="" && $passwordCrypt !="" )
    $query = "INSERT INTO Auteurs (nom, prenom, adresse_mail, mot_de_passe)
    VALUES (:nom, :prenom, :adresse_mail, :mot_de_passe)";
    $stmt = $bdd->prepare($query);
    $stmt ->execute(array('nom'=>$nom,'prenom'=>$prenom,'adresse_mail'=>$email, 'mot_de_passe'=>$passwordCrypt));
    $res = $stmt->fetchAll();
    return $res;
}

// CONNEXION 

function connection($login){
    $bdd = dbconnect();
    $query = "SELECT * FROM Auteurs WHERE Auteurs.adresse_mail='$login'";
    try {
        $usr = $bdd->query($query)->fetch(PDO::FETCH_ASSOC);
        return $usr;
    } catch(PDOException $e) {
        $e->getMessage();
        exit;
    }
} 


// CATEGORIE

function getCategories(){
    $bdd = dbconnect();
    $query = "SELECT * FROM Catégorie";
    $categories = $bdd->query($query)->fetchAll(PDO ::FETCH_ASSOC);
    return $categories;
}
    /*$stmt= $bdd->prepare($query);
    $stmt->execute(array($login, $mdp));
    if ($stmt->rowCount() == 1) {
        $_SESSION['login'] = $login;
        $_SESSION['mdp'] = $mdp;
        //var_dump($_SESSION['login']);
    }
*/

// NOUVEL ARTICLE 

function newPost ($titre, $texte, $img, $auth, $catId){
    if ($titre !="" && $texte !="" && $img !="" && $catId !=""){
    $bdd = dbconnect();
    $query = "INSERT INTO Articles (`id`,`titre`, `slug`, `texte`, `image`, `article_auteur`, `article_categorie`)
    VALUES (NULL,'$titre', NULL, '$texte', '$img', '$auth', '$catId')";
    $newpost = $bdd->query($query);
    //var_dump($query);
    return $newpost;

    }
}


