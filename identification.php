<?php

    //Appel du script de connexion au serveur et à la base de donnée 
    require("connect.php");
    session_start();
    $_SESSION['ok']='non';
    $_SESSION['IDUser']="";

    //On récupère les données saisies dans le formulaire 
    $nomSaisi = $_POST["nom"];
    $motPasseSaisi = $_POST["motDePasse"];

    //On récupère dans la base de données le mot de passe qui correspond au nom saisi par le visiteur 
    $reqSQL="SELECT * FROM authentification WHERE Identifiant ='$nomSaisi'";
    $res = $connexion->query($reqSQL);
    $ligne = $res->fetch();
    $motPasseBdd = $ligne['MotDePasse'];
    $IDUser=$ligne['UtilisateurID'];

    //On vérifie que le mot de passe saisi est identique à celui enregistrer dans la base de données

    if ($motPasseSaisi!==$motPasseBdd)
    // Le mot de passe est différent de celui de la base utilisateur 
    {
        echo"Votre saisi est erroné, Recommencer SVP... ";

        //On inclu le formulaire d'identification (index.php)
        include('index.php');
        
    }
    else    
    // Le mot de passe saisi correspond � celui de la base utilisateur
    {  
        //démarrage d'une session 
        session_start();
        //Création d'une variable de session 
        $_SESSION['ok']='oui';
        $_SESSION['IDUser']=$IDUser;
        //retour vers la page d'entrée du site
        header("location:Page_acceuil.php"); 
    }
    //On libère le jeu d'enregistrement
    $res->closeCursor();
    //on ferme la connexion au SGBD
    $connexion = null;
?>