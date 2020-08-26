<?php
require('model.php');

if (isset($_POST['login']) && !empty($_POST['login'])){
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    $userInfo = connection($login);
    //var_dump($userInfo);
    $mdpCrypt = $userInfo['mot_de_passe'];
    $mdpVerif = password_verify($mdp, $mdpCrypt);
    //var_dump($mdpVerif);
    if($mdpVerif) {
        session_start();
        $_SESSION['usr_id'] = $userInfo['ID'];
        $_SESSION['usr_name'] = $userInfo['nom'];
        $_SESSION['usr_firstname'] = $userInfo['prenom'];
        header ('location:index.php');
        //header ('location:connexion_success.php');
        //echo "vous êtes connecté";
        //var_dump($_SESSION);
    } else {
        echo "aucun utilisateur correspondant";
    }
}
?>





