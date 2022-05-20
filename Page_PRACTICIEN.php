<!DOCTYPE html>
<?php
//démarrer une session
session_start();
//test vérifiant la présence de la variable de session
if($_SESSION['ok']!='oui')
{
    //redirection vers la page de démarrage du site(index.html)
    if($_SESSION['ok']!='oui2')
    header("location:index.php");
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <link href="CSS/MaquetteCSS.css" rel="stylesheet">
        <link href="CSS/Banniere.CSS" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="16x16" href="Image/Logo-gsb2.0.png">
        <title>GSB | PRATICIEN</title>
<?php
//Appel du script de connexion 
require('connect.php');
?>
</head>
<body>
<?php
include("HautDePage.HTML")
?>
<div id="PraticienBis">
<h1>Praticien</h1>
</div>
 <div id="titre"> 
    <form name="lstDeroulante" action="PRATICIEN.php" method="POST">
    <?php
    ?>
    <br>
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
            $code=$ligne["MedID"]; //code du praticien
            $nom=$ligne["MedNom"];  //Nom du praticien
            $prenom=$ligne["MedPrenom"];  //Prenom du praticien
            $adresse = $ligne['MedAdresse'];
            $ville = $ligne['MedVille'];
            $CP = $ligne['MedCP'];
            $AdresseComplement = $ligne['MedAdresseComplement'];
            $Coordonnee = $ligne['MedCoordonnee'];
            $fonction = $ligne['MedFonction'];
            $Associé = $ligne['MedAssocierA'];
            $Description = $ligne['MedDescription'];
            $notoriete = $ligne['MedCoefDeNotoriete'];
            $confiance = $ligne ['MedCoefDeConfience'];
            $formation = $ligne ['MedFormation'];
            $moyenne = $ligne ['MedMoyPatientele'];
            $nouveau = $ligne ['MedNouveau'];
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