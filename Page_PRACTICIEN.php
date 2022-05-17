<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="CSS/MaquetteCSS.css" rel="stylesheet">
            <link href="CSS/Banniere.CSS" rel="stylesheet">
        <title>GLPI/Practicien</title>
<?php
//Appel du script de connexion 
require('connect.php');
?>
</head>
<body>
<?php
include("HautDePage.HTML")
?>
 <div id="titre">
    <h1>Praticien</h1>
    <form name="lstDeroulante" action="PRATICIEN.php" method="POST">
    <?php
    ?>
    <select name="Valider">
    <option value="*">---Choisir un praticien---</option>
        <?php
        $reqSQL="SELECT * FROM medecin";
        //Exécute la requête
        $result=$connexion->query($reqSQL);
        //Lecture de la 1re ligne du jeu d'enregistrements
        $ligne=$result->fetch();
        //Tant qu'on n'a pas atteint la fin du jeu d'enregistrements,on boucle
        while($ligne!=false)
        {   //On stock les données du praticien dans des variables
            $i+=1;
            $code=$ligne["MedCode"]; //code du praticien
            $nom=$ligne["MedNom"];  //Nom du praticien
            $prenom=$ligne["MedPrenom"];  //Prenom du praticien
            //On génère une ligne dans la liste déroulante 
            echo("<option value=".$code.">$nom $prenom</option>");
            //Lecture de la ligne suivante dans le jeu d'enregistrement
            $ligne=$result->fetch();
        }
        ?>
    </select>
        <br>
        <br>
        <button type="submit">Rechercher</button>               
        <br>
        <br>
        </form>
    </div>
<?php
include("BasDePage.HTML")
?>    
</body>
</html>