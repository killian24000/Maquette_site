<!DOCTYPE html>
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
<<<<<<< Updated upstream
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
        //echo("<div>$DepotLegal"." | "."$NomCommercial"." | "."$Famille"." | "."$Composition"." | "."$Effets"." | "."$ContreIndication<div>");
        //On récupère dans des variables les données saisies par l'utilisateur
        //$reqSQL="INSERT INTO medicament VALUES ('AAA','$DepotLegal','$NomCommercial','$Famille','$Composition','$Effets','$ContreIndication','$Prix')";
        
        //Execution de la requête
        //$connexion->exec($reqSQL) or die ("erreur dans la requête sql");
    
        //on ferme la connexion
<<<<<<< HEAD
        //$connexion=null;

=======
        $connexion=null;
<<<<<<< HEAD
=======
>>>>>>> f7e2d82d7214aea7776e83f683c591a2ada27cfd
    }else{
        echo("null");
>>>>>>> e66d6da5dfd415b45e028022371a854203510fc4
    }
    ?>
    <form action="Page_MEDICAMENT.php" method="post" onsubmit="test()">
    <div id="CDPCentre">
        <div id="Test245">
            <p>
            <h2>PHARMACOPEE</h2> 
            </p>
=======
        <?php
        include('HautDePage.HTML');
        ?>
            <div id="test">
                    <p>
                        <h2>PHARMACOPEE</h2> 
                    </p>
>>>>>>> Stashed changes
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
<<<<<<< HEAD
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
=======
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
>>>>>>> f7e2d82d7214aea7776e83f683c591a2ada27cfd
                </p>
<<<<<<< HEAD
                <button type="submit" name="Ajout" value="Ajouter">Ajouter</button>            
=======
                <button type="submit" name="BouttonValider">Ajouter</button>            
>>>>>>> e66d6da5dfd415b45e028022371a854203510fc4
            </div>
        </div>
<<<<<<< Updated upstream
        <div id="ZoneRaccourci"></div>
        </div>
    </form>
    </div>     
    </div>
    <?php
    include("BasDePage.HTML")
    ?>
=======
        <?php
        include('BasDePage.HTML')
        ?>
>>>>>>> Stashed changes
    </body>
</html>