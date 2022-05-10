<?php

    //définition de constantes pour la connexion MySQL
    define('SERVEUR', 'localhost');
    define('BASE','bddappwebgsb');
    define('NOM','root');
    define('MOTPASSE','');

    //connexion au serveur
    try{
            $connexion = new PDO("mysql:host=".SERVEUR.";dbname=".BASE,NOM,MOTPASSE);
    } catch ( Exception $e ) {
        die ("\n Connection".SERVEUR."impossible : ".$e->getMessage());
    }
?>