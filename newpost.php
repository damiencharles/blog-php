<?php
//session_start();
include('header.php');
//include('model.php');
$categories = getCategories();
//var_dump($categories);


if (isset($_POST) && !empty($_POST)){
    $titre = $_POST['titre'];
    $texte = $_POST['texte'];
    //var_dump($_POST);
    $uploads_dir = 'assets/uploads';
    $tmp_name = $_FILES["img"]["tmp_name"];
    // basename() peut empêcher les attaques de système de fichiers;
    // la validation/assainissement supplémentaire du nom de fichier peut être approprié
    $name = basename($_FILES["img"]["name"]);
    move_uploaded_file($tmp_name, "$uploads_dir/$name");

    $img = "$uploads_dir/$name";

    $cat = $_POST['categorie'];
    //var_dump($cat);
    $catId = intval($cat, 10);
    //var_dump($catId);
    $auth = $_SESSION['usr_id'];

    newPost ($titre, $texte, $img, $auth, $catId);

    echo ("<div class='col-12 text-success text-center mt-4'><i class='far fa-check-circle mr-2 text-success'></i>Votre article a été ajouté !</div>");
    //var_dump($newpost);
}


include('./views/newpost_view.php');
include('footer.php');