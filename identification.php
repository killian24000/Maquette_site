<?php

    //Appel du script de connexion au serveur et à la base de donnée 
    require("connect.php");

    //On récupère les données saisies dans le formulaire 
    $nomSaisi = $_POST["nom"];
    $motPasseSaisi = $_POST["motDePasse"];

    //On récupère dans la base de données le mot de passe qui correspond au nom saisi par le visiteur 
     $reqSQL ="SELECT motDePasse FROM utilisateur WHERE nom = '$nomSaisi'";

     $res = $connexion->query($reqSQL);

    //$parcours du jeu d'enrgistrements : selection du premier enregistrement
    $ligne = $res->fetch();
    //on affecte la valeur de chaque cellule du tableau à une variable 

    $motDePasseBdd = $ligne['motDePasse'];

    //On vérifie que le mot de passe saisi est identique à celui enregistrer dans la base de données

    if ($motPasseSaisi!=$motDePasseBdd)
    // Le mot de passe est différent de celui de la base utilisateur 
    {
        echo"Votre saisi est erroné, Recommencer SVP... ";

        //On inclu le formulaire d'identification ()
        include('index.php');    
    }
    else 
    // Le mot de passe saisi correspond � celui de la base utilisateur
    {
        //démarrage d'une session 
        session_start();
        //Création d'une variable de session
        $_SESSION['ok']="oui";
        //retour vers la page d'entrée du site
        header("location:index.php"); 
        exit;
    }
    //On libère le jeu d'enregistrement
    $res->closeCursor();
    //on ferme la connexion au SGBD
    $connexion = null;
?>