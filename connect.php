<?php

    //définition de constantes pour la connexion MySQL
    define('SERVEUR', 'localhost');
    define('BASE','log');
    define('NOM','root');
    define('MOTPASSE','');

    //connexion au serveur
    try{
            $connexion = new PDO("mysql:host=".SERVEUR.";dbname=log".BASE,NOM,MOTPASSE);
    } catch ( Exception $e ) {
        die ("\n Connection".SERVEUR."impossible : ".$e->getMessage());
    }
?>