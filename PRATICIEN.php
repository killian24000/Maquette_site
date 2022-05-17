<?php
    //Appel du script de connexion
    require("connect.php");
  $res=$connexion->query('SELECT MedCode, MedNom, MedPrenom, MedAdresse, MedVille, MedCP FROM medecin');
  $ligne = $res->fetch();

  while($ligne!=false)
  {
    if($_POST['$nom']=='MedNom')
    {
      echo $ligne['MedCode'];
      echo $ligne['MedNom'];
      echo $ligne['MedPrenom'];
      echo $ligne['MedAdresse'];
      echo $ligne['MedVille'];
      echo $ligne['MedCP'];
      $ligne=$res->fetch();
    }
  }
  $res->closeCursor(); //termine le traitement de la requête
?>