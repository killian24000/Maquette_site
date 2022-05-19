<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/MaquetteCSS.css" rel="stylesheet">
    <link href="CSS/Banniere.CSS" rel="stylesheet">
    <link href="CSS/Formulaire.css" rel="stylesheet">
    <title>GSB/Médicament</title>
</head>
    <body>
    <?php
    include("HautDePage.HTML")
    ?>
    <div style="display: flex" id="CorpDePage">
    <?php
    include('Raccourci.html')
    ?>
   
    <?php
    //Appel du script de connexion
    include('connect.php');
    //---------------------------------------------------------------------
	// R�cup�rer les valeurs saisies dans le formulaire dans les variables
	//---------------------------------------------------------------------
    if(isset($_POST["BouttonValider"])){
        $DepotLegal=$_POST["DepotLegal"];
        $NomCommercial=$_POST["NomCommercial"];
        $Famille=$_POST["Famille"];
        $Composition=$_POST["Composition"];
        $Effets=$_POST["Effets"];
        $ContraIndication=$_POST["ContreIndication"];
        $Prix=$_POST["Prix"];
        echo("$DepotLegal"." "."$NomCommercial"." "."$Famille".""."$Composition".""."$Effets".""."$ContreIndication");
        //On récupère dans des variables les données saisies par l'utilisateur
        $reqSQL="INSERT INTO medicament VALUES ('$DepotLegal','$NomCommercial','$Famille','$Composition','$Effets','$ContraIndication','$Prix')";
        
        //Execution de la requête
        $connexion->exec($reqSQL) or die ("erreur dans la requête sql");
    
        //on ferme la connexion
        $connexion=null;
    }else{
        echo("null");
    }
    ?>
    <form action="Page_MEDICAMENT.php" method="POST" onsubmit="test()">
    <div id="CDPCentre">
        <div id="Test245">
            <p>
            <h2>PHARMACOPEE</h2> 
            </p>
                </div>
                <div id="medicament_corps">
                <br>
                <p>
                DEPOT LEGAL :  <input type="text" name='$DepotLegal'>
                </p>
                <p>
                NOM COMMERCIAL : <input type="text" name='$NomCommercial'>
                </p>
                <p>
                FAMILLE: <input type="text" name='$Famille'>
                </p>
                COMPOSANT : 
                <p>
                <textarea name="" id="" cols="30" rows="10" maxlength="1000" name='$Composition'></textarea>
                </p>
                EFFETS :
                <p>
                <textarea name="" id="" cols="30" rows="10" maxlength="1000" name='$Effets'></textarea>
                </p>
                CONTRE INDICATION :
                <p>
                <textarea name="" id="" cols="30" rows="10" maxlength="1000" name='$ContraIndication'></textarea>
                </p>
                PRIX ECHANTILLON : 
                <p>
                <textarea name="" id="" cols="30" rows="10" maxlength="1000" name='$Prix'></textarea>
                </p>
                <button type="submit" name="BouttonValider">Ajouter</button>            
            </div>
        </div>
        <div id="ZoneRaccourci"></div>
        </div>
    </form>
    </div>     
    </div>
    <?php
    include("BasDePage.HTML")
    ?>
    </body>
</html>