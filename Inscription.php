<html>
<body>
<?php
    //Appel du script de connexion
    include('connect.php');
   
    //---------------------------------------------------------------------
	// R�cup�rer les valeurs saisies dans le formulaire dans les variables
	//---------------------------------------------------------------------
    $denomination=$_POST["nom"];
    $mdp=$_POST["motDePasse"];
    $mel=$_POST["mel"];
    echo("$denomination"." "."$mdp"." "."$mel");
    //On récupère dans des variables les données saisies par l'utilisateur
    $reqSQL="INSERT INTO utilisateur VALUES ('$denomination','$mdp','$mel')";
    
    //Execution de la requête
    $connexion->exec($reqSQL) or die ("erreur dans la requête sql");

    //On affiche le résultat pour le visiteur 
    echo("insertion reussie, vous être membre de GLPI, vous pouvez vous connecter ");

    //on ferme la connexion
    $connexion=null;
    ?>
<a href = "index.php"> Retour à la page d'accueil </a>
</body>
</html>