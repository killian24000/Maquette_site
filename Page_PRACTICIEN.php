<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="CSS/MaquetteCSS.css" rel="stylesheet">
            <link href="CSS/Banniere.CSS" rel="stylesheet">
        <title>GLPI/Practicien</title>
    </head>
    <body>
    <?php
    include("HautDePage.HTML")
    ?>
    <?php
    //Appel du script de connexion 
    require('connect.php');
    ?>
    <div id="titre">
    <h1>Praticien</h1>
    <form name="ListeRecherche">
        <select name="LstPraticien" class="titre">
            <option>Choisissez un praticien</option>
            <option value="1">Dupont</option>
            <option value="2">Gosselin</option>
            <option value="3">Delacoure</option>
        </select>    
    </form>
    <?php
    $reqSQL="SELECT mednom FROM medecin";
    $result=$connexion->query($reqSQL);
    $ligne=$result->fetch();
    while($ligne!=false)
    {
       $ligne = $result->fetch(); 
    }
    ?>
    <select name="Valider">
        <?php
        $reqSQL="SELECT mednom FROM classe";
        //Exécute la requête
        $result=$connexion->query($reqSQL);
        //Lecture de la 1re ligne du jeu d'enregistrements
        $ligne=$result->fetch();
        //Tant qu'on n'a pas atteint la fin du jeu d'enregistrements,on boucle
        while($ligne!=false)
        {   //On stock les données de la classe dans des variables
            $code=$ligne["MedCode"]; //code du praticien
            $nom=$ligne["MedNom"];  //Nom du praticien
            $prenom=$ligne["MedPrenom"]; //Prenom du praticien
            $adresse=$ligne["MedAdresse"]; //adresse du praticien
            $ville=$ligne["MedVille"]; //ville du praticien
            $CP=$ligne["MedCP"]; //Code postal du praticien
            //On génère une ligne dans la liste déroulante 
            echo"<option value='$_POST'>$_POST</option>";
            $ligne=$result->fetch();
        }
        ?>
    </select>
    <br>
    <button type="submit" name="Valider" value="Valider">Rechercher</button>
    <ul>
    </div>
    <?php
    include("BasDePage.HTML")
    ?>    
</body>
</html>