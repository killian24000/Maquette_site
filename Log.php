<?php

// Appel du script de connexion au serveur et à la base de donnée 
    require("connect.php");

//On récupère les données saisies dans le formulaire
    $nomSaisi = $_POST["nom"];
    $motPasseSaisi = $_POST["mdp"];

//On récupère dans le base de données le mot de passe qui correspond au nom saisi par le visiteur 
    $resSQL ="SELECT motDePasse FROM utilisateur WHERE nom ='$nomSaisi'";

    $res = $connexion->query($resSQL);

	//$parcours du jeu d'enrgistrements : selection du premier enregistrement 
    $ligne = $res->fetch();
	// On affecte la valeur de chaque cellule du tebleau � une variable
		
	$motPasseBdd =$ligne['motDePasse'];

// On v�rifie que le mot de passe saisi est identique � celui enregistr� dans la base de donn�es

	if  ($motPasseSaisi!=$motPasseBdd)
	// Le mot de passe est diff�rent de celui de la base utilisateur
	{
		echo "Votre saisie est erron�e, Recommencez SVP...";

		// On inclut le formulaire d identification (index.html)
		include('page_mdp.html');
				
	}
	else
	// Le mot de passe saisi correspond � celui de la base utilisateur
	{
		// Retour vers la page d entr�e du site

		header("location:Page_acceuil.html");
		
				
	}
	//on lib�re le jeu d'enregistrement
	$res->closeCursor(); 
	// on ferme la connexion au SGBD
	$connexion = null;

?>