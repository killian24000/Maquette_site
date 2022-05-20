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
    <link href="CSS/MaquetteCSS.css" rel="stylesheet">
    <link href="CSS/Banniere.CSS" rel="stylesheet">
    <link href="CSS/Formulaire.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="Image/Logo-gsb2.0.png">
    <title>GSB | Medicament</title>
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
        $ContreIndication=$_POST["ContreIndication"];
        $Prix=$_POST["Prix"];

        $reqSQL='SELECT COUNT(*) FROM medicament WHERE MedicType = "AAA"';
        echo("result : ");
        $result->exec($reqSQL);
        echo $result;
        echo("<div>$DepotLegal"." | "."$NomCommercial"." | "."$Famille"." | "."$Composition"." | "."$Effets"." | "."$ContreIndication<div>");
        //On récupère dans des variables les données saisies par l'utilisateur
        $reqSQL="INSERT INTO medicament VALUES ('AAA','$DepotLegal','$NomCommercial','$Famille','$Composition','$Effets','$ContreIndication','$Prix')";
        
        //Execution de la requête
        $connexion->exec($reqSQL) or die ("erreur dans la requête sql");
    
        //on ferme la connexion
        $connexion=null;
        $connexion=null;
    }else{
        echo("null");
    }
    ?>
    <form action="Page_MEDICAMENT.php" method="post" onsubmit="test()">
    <div id="CDPCentre">
        <div id="Test245">
            <p>
            <h2>PHARMACOPEE</h2> 
            </p>
                </div>
                <div id="medicament_corps">
                <br>
                <p>
                DEPOT LEGAL :  <input type="text" name='DepotLegal' value="A">
                </p>
                <p>
                NOM COMMERCIAL : <input type="text" name='NomCommercial' value="B">
                </p>
                <p>
                FAMILLE: <input type="text" name='Famille' value="C">
                </p>
                COMPOSANT : 
                <p>
                <textarea name="Composition" id="" cols="30" rows="10" maxlength="1000">D</textarea>
                </p>
                EFFETS :
                <p>
                <textarea name="Effets" id="" cols="30" rows="10" maxlength="1000">E</textarea>
                </p>
                CONTRE INDICATION :
                <p>
                <textarea name="ContreIndication" id="" cols="30" rows="10" maxlength="1000" >F</textarea>
                </p>
                PRIX ECHANTILLON : 
                <p>
                <textarea name="Prix" id="" cols="30" rows="10" maxlength="1000">1</textarea>
                <textarea id="" cols="30" rows="10" maxlength="1000" name='$Composition'></textarea>
                </p>
                EFFETS :
                <p>
                <textarea  id="" cols="30" rows="10" maxlength="1000" name='$Effets'></textarea>
                </p>
                CONTRE INDICATION :
                <p>
                <textarea  id="" cols="30" rows="10" maxlength="1000" name='$ContraIndication'></textarea>
                </p>
                PRIX ECHANTILLON : 
                <p>
                <textarea id="" cols="30" rows="10" maxlength="1000" name='$Prix'></textarea>
                </p>
                <button type="submit" name="Ajout" value="Ajouter">Ajouter</button>       
                
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