<?php
include('model.php');
$id = $_GET['id'];
//var_dump($id);

if (isset($_POST) && !empty ($_POST)) {
    $nom = $_POST['auteur_commentaire'];
    $commentaire = $_POST['commentaire'];
    
    newCom($nom, $commentaire,$id);


}



