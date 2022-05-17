<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="CSS/MaquetteCSS.css" rel="stylesheet">
  <link href="CSS/Banniere.CSS" rel="stylesheet">
  <link href="cSS/Formulaire.css" rel="stylesheet">
  <title>GSB/PRATICIEN/RECHERCHE</title>
</head>
<body>
  <?php
  include("HautDePage.HTML");
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
            $res=$connexion->query('SELECT MedCode, MedNom, MedPrenom, MedAdresse, MedVille, MedCP FROM medecin');
            $ligne = $res->fetch();

            while($ligne!=false) //Tant que la requête n'est pas fausse 
            {   
              if($_POST["Valider"]==$ligne['MedCode']){  //Si le code du Praticien correspond au nom 
                $id = $ligne['MedCode'];
                $nom = $ligne['MedNom'];
                $prenom = $ligne['MedPrenom'];
                $adresse = $ligne['MedAdresse'];
                $ville = $ligne['MedVille'];
                $CP = $ligne['MedCP'];
              }
              $ligne=$res->fetch();
            }
            $res->closeCursor(); //termine le traitement de la requête

            //Mise en page et affichage des requêtes
            echo"<h3>"."Nom et Prénom Praticien : ".$nom." ".$prenom."</h3>"; 
            echo"<h3>"."Adresse : ".$adresse.", ".$CP.", ".$ville."</h3>"; 
          ?>
        </div>
      </div>
      <div id="ZoneRaccourci"></div>
  </div>
  <?php
  include("BasDePage.HTML")
  ?>
</body>
</html>