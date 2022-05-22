<?php
    $reqSQL="SELECT * FROM medicament";
    $result=$connexion->query($reqSQL);
    $ligne=$result->fetch();
    while($ligne!=false)
    {   //On stock les données du praticien dans des variables
        $MedicCode=$ligne["MedicID"]; //code du medicament
        $MedicNom=$ligne["NomCommercial"];  //Nom du medicament
        //On génère une ligne dans la liste déroulante 
        echo("<option value=".$MedicCode.">$MedicNom</option>");
        //Lecture de la ligne suivante dans le jeu d'enregistrement
        $ligne=$result->fetch();
    }
?>