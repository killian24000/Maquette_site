<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSB | Selection du formulaire</title>
    <link rel="stylesheet" href="CSS/Banniere.CSS">
    <link rel="stylesheet" href="CSS/Formulaire.CSS">
    <link rel="stylesheet" href="CSS/MaquetteCSS.CSS">
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
                        //Exécute la requête
                        $result=$connexion->query($reqSQL);
                        //Lecture de la 1re ligne du jeu d'enregistrements
                        $ligne=$result->fetch();
                        //Tant qu'on n'a pas atteint la fin du jeu d'enregistrements,on boucle
                        for($i=1; $ligne!=false; $i++){
                            $IdentifiantUtilisateur=$ligne["UtilisateurID"];
                            $IdentifiantDuRapport=$ligne["RapportID"];
                            $VersionDuRapport=$ligne["RapportVersion"];
                            $Definitif=$ligne["RapportDefinitif"];
                            $Date=$ligne["RapportDate"];
                            //On génère une ligne dans la liste déroulante 
                            echo("<option name='Opt".$i."Rapport' value=".$IdentifiantDuRapport.">Rapport du $Date par $IdentifiantUtilisateur</option>");
                            //Lecture de la ligne suivante dans le jeu d'enregistrement
                            $ligne=$result->fetch();
                        }
                    ?>
                </select><br>
                <button type="submit">Afficher</button>
            </form>
        </div>
    </div>
    <?php
    include('BasDePage.HTML')
    ?>
</body>
</html>