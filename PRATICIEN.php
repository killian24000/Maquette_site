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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="CSS/GSBCSS.css" rel="stylesheet">
  <link href="CSS/Banniere.css" rel="stylesheet">
  <link href="cSS/Formulaire.css" rel="stylesheet">
  <link rel="icon" type="image/png" sizes="16x16" href="Image/Logo-gsb2.0.png">
  <title>GSB | Selection du PRATICIEN</title>
</head>
<body>
  <?php
  include("HautDePage.html");
  ?>
  <div style="display: flex" id="CorpDePage">
      <?php
        include('Raccourci.html')
      ?>
      <div id=CDPCentre>
        <div id="PraticienTitre">
          <h2>PRATICIEN</h2>
        </div>
        <div id="Praticien">
          <?php
              //Appel du script de connexion
              require("connect.php");
            $res=$connexion->query('SELECT *  FROM medecin');
            $ligne = $res->fetch();

            while($ligne!=false) //Tant que la requête n'est pas fausse 
            {   
              if($_POST["Valider"]==$ligne['MedID']){  //Si le code du Praticien correspond au nom 
                $id = $ligne['MedID'];
                $nom = $ligne['MedNom'];
                $prenom = $ligne['MedPrenom'];
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
              }
              $ligne=$res->fetch();
            }
            $res->closeCursor(); //termine le traitement de la requête

            //Mise en page et affichage des requêtes
            echo"<h3>"."Nom et Prénom Praticien : ".$nom." ".$prenom."</h3>"; 
            echo"<h3>"."Adresse : ".$adresse.", ".$CP.", ".$ville.",".$AdresseComplement."</h3>"; 
            echo"<h3>"."Coordonées : ".$Coordonnee."</h3>";
            echo"<h3>"."Fonction : ".$fonction."</h3>";
            echo"<h3>"."Etablissement : ".$Associé."</h3>";
            echo"<h3>"."Description : ".$Description."</h3>";
            echo"<h3>"."Notoriété : ".$notoriete."</h3>";
            echo"<h3>"."Confiance : ".$confiance."</h3>";
            echo"<h3>"."Formation : ".$formation."</h3>";
            echo"<h3>"."Moyenne : ".$moyenne."</h3>";
            echo"<h3>"."Experience : ".$nouveau."</h3>";
            ?>
        </div>
      </div>
      <div id="ZoneRaccourci"></div>
  </div>
  <?php
  include("BasDePage.html")
  ?>
</body>
</html>