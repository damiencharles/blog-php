<?php

function dbconnect() {
    try {
        $bdd = new PDO('mysql:host=localhost; dbname=blog', 'root');
        return $bdd;
    }
    catch (PDOException $e) {
        echo('echec de la connexion : ' . $e->getMessage());
        exit;
    }  
}
