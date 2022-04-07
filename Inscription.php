<html>
<body>
<?php
    //Appel du script de connexion
    include('connect.php');

    //On récupère dans des variables les données saisies par l'utilisateur
    $reqSQL="INSERT INTO utilisateur VALUES ('$denomination','$mdp',$mel')";

    //Execution de la requête
    $connexion->exec($reqSQL) or die ("erreur dans la requête sql");

    //On affiche le résultat pour le visiteur 
    echo("insertion reussie, vous être membre de GLPI, vous pouvez vous connecter ");

    //on ferme la connexion
    $connexion=null;
    ?>
<a href = "page_mdp.html"> Retour à la page d'accueil <a/>
</body>
</html>