<?php
require('model.php');

if (isset($_POST) && !empty($_POST)){
    $nom = $_POST['name'];
    $prenom = $_POST['firstname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordCrypt = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    //var_dump($_POST);

    $newAuteur = newAuteur($nom, $prenom, $email, $passwordCrypt);
    //var_dump($newAuteur);

    header('location:thankyou.php');
}


