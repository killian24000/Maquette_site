<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="BanniereCSS.css" rel="stylesheet">
  <link href="MaquetteCSS.css" rel="stylesheet">
  <title>GSB/PRACTICIEN/RECHERCHE</title>
</head>
<body>
<?php
include("HautDePage.HTML");
?>
<?php
    //Appel du script de connexion
    require("connect.php");
  $res=$connexion->query('SELECT MedCode, MedNom, MedPrenom, MedAdresse, MedVille, MedCP FROM medecin');
  $ligne = $res->fetch();

  while($ligne!=false)
  {   
    if($_POST["Valider"]==$ligne['MedCode']){
      echo $ligne['MedCode'];
      echo $ligne['MedNom'];
      echo $ligne['MedPrenom'];
      echo $ligne['MedAdresse'];
      echo $ligne['MedVille'];
      echo $ligne['MedCP'];
    }
    $ligne=$res->fetch();
  }
  $res->closeCursor(); //termine le traitement de la requête
?>
</body>
</html>