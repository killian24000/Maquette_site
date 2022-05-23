<!DOCTYPE html>
<?php
    //démarrer une session
    session_start();
    //test vérifiant la présence de la variable de session
    if($_SESSION['ok']!='oui')
    {
        //redirection vers la page d'entrée de démarrage du site (index.php)       
        header("location:index.php");
        
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSB | Selection du formulaire</title>
    <link rel="stylesheet" href="CSS/Banniere.css">
    <link rel="stylesheet" href="CSS/Formulaire.css">
    <link rel="stylesheet" href="CSS/GSBCSS.css">
    <link rel="icon" type="image/png" sizes="16x16" href="Image/Logo-gsb2.0.png">
</head>
<body>
    <?php
    //Appel du script de connexion 
    require('connect.php');
    ?>
    <?php
    include('HautDePage.html');
    ?>
    <div>
        <div id="TitreSection">
            <h1>Formulaire : Visionnage</h1>
        </div>
        <div id="CorpSection">
            <form action="AffichageFormulaire.php" method="post">
                <select name="ListeRapport" id="">
                    <option value="" selected disabled>Choisiser un formulaire a visionnée</option>
                    <?php
                        $reqSQL="SELECT * FROM rapport";
                        $reqSQL2="SELECT v.VisNom, v.VisPrenom FROM visiteur v INNER JOIN rapport r ON r.UtilisateurID=v.VisID";
                        //Exécute la requête
                        $result=$connexion->query($reqSQL);
                        $result2=$connexion->query($reqSQL2);
                        //Lecture de la 1re ligne du jeu d'enregistrements
                        $ligne=$result->fetch();
                        $ligne2=$result2->fetch();
                        //Tant qu'on n'a pas atteint la fin du jeu d'enregistrements,on boucle
                        for($i=1; $ligne!=false; $i++){
                            $IdentifiantUtilisateur=$ligne["UtilisateurID"];
                            $IdentifiantDuRapport=$ligne["RapportID"];
                            $VersionDuRapport=$ligne["RapportVersion"];
                            $Definitif=$ligne["RapportDefinitif"];
                            $Date=$ligne["RapportDate"];
                            $Nom=$ligne2["VisNom"];
                            $Prenom=$ligne2["VisPrenom"];
                            //On génère une ligne dans la liste déroulante
                            echo("<option name='Opt".$i."Rapport' value=".$IdentifiantDuRapport.">Rapport du $Date par $Nom $Prenom</option>");
                            
                            //Lecture de la ligne suivante dans le jeu d'enregistrement
                            $ligne=$result->fetch();
                            $ligne2=$result2->fetch();
                        }
                    ?>
                </select><br>
                <button type="submit">Afficher</button>
            </form>
        </div>
    </div>
    <?php
    include('BasDePage.html')
    ?>
</body>
</html>