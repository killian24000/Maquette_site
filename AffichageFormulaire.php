<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSB | Affichage de formulaire</title>
    <link rel="stylesheet" href="CSS/Banniere.CSS">
    <link rel="stylesheet" href="CSS/Formulaire.CSS">
    <link rel="stylesheet" href="CSS/MaquetteCSS.CSS">
    <script src="JavaScript/function.js"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="Image/Logo-gsb2.0.png">
</head>
<body>
    <?php
    require('connect.php');
    
    $IdentifiantDuRapport=$_POST["ListeRapport"];
    
    $reqSQL="SELECT * FROM rapport WHERE RapportID=$IdentifiantDuRapport";
    //Exécute la requête
    $result=$connexion->query($reqSQL);
    //Lecture de la 1re ligne du jeu d'enregistrements
    $ligne=$result->fetch();
    //Intégration des données dans des variables
    $IdentifiantUtilisateur=$ligne["UtilisateurID"];
    $VersionDuRapport=$ligne["RapportVersion"];
    $Definitif=$ligne["RapportDefinitif"];
    $IdentifiantDuMedecin=$ligne["MedID"];
    $Remplacent=$ligne["Remplacent"];
    $CoeficientFiabiliter=$ligne["CoefDeFiabiliter"];
    $Date=$ligne["RapportDate"];
    $Motif=$ligne["MotifVisite"];
    $CompteRendu=$ligne["Rapport"];
    $IdentifiantDuProduit1=$ligne["ProduitID1"];
    $IdentifiantDuProduit2=$ligne["ProduitID2"];
    $Documentation=$ligne["DocFournit"];
    $LesEchantillons=$ligne["LesEchantillons"];
    //Décomposition du champ donner LesEchantillons
    //Séparation des différents échantillons du champ complet
    $LesEchantillons=explode("|",$LesEchantillons);
    //Séparation de l'identifiant et du nombre d'échantillons
    $Echantillons1=explode(":",$LesEchantillons[0]);
    $Echantillons2=explode(":",$LesEchantillons[1]);
    $Echantillons3=explode(":",$LesEchantillons[2]);
    $Echantillons4=explode(":",$LesEchantillons[3]);
    $Echantillons5=explode(":",$LesEchantillons[4]);
    $Echantillons6=explode(":",$LesEchantillons[5]);
    $Echantillons7=explode(":",$LesEchantillons[6]);
    $Echantillons8=explode(":",$LesEchantillons[7]);
    $Echantillons9=explode(":",$LesEchantillons[8]);
    $Echantillons10=explode(":",$LesEchantillons[9]);

    //Récupération du nom prénom du visiteur via son identifiant
    $reqSQL="SELECT * FROM visiteur WHERE VisID=$IdentifiantUtilisateur";
    $result=$connexion->query($reqSQL);
    $ligne=$result->fetch();

    $VisisteurNom=$ligne["VisNom"];
    $VisisteurPrenom=$ligne["VisPrenom"];

    //Récupération du nom prénom du medecin via son identifiant
    $reqSQL="SELECT * FROM medecin WHERE MedID=$IdentifiantDuMedecin";
    $result=$connexion->query($reqSQL);
    $ligne=$result->fetch();

    $MedecinNom=$ligne["MedNom"];
    $MedecinPrenom=$ligne["MedPrenom"];

    $reqSQL="SELECT * FROM medicament WHERE MedicID=$IdentifiantDuProduit1 OR MedicID=$IdentifiantDuProduit2";
    $result=$connexion->query($reqSQL);
    $ligne=$result->fetch();

    while($ligne!=false){
        if ($ligne['MedicID']==$IdentifiantDuProduit1){
            $NomProduit1=$ligne['NomCommercial'];
        }
        if ($ligne['MedicID']==$IdentifiantDuProduit2){
            $NomProduit2=$ligne['NomCommercial'];
        }
        $ligne=$result->fetch();
    }
    echo($NomProduit1."<br>".$NomProduit2);
    ?>
    <?php
    include('HautDePage.html');
    ?>
    <div style="display: flex" id="CorpDePage">
        <?php
        include('Raccourci.html')
        ?>
        <div style="display:inline-table;" id="CDPCentre">
            <div id=TitreSection>
                <?php
                echo("<h2>Rapport de ".$VisisteurNom." ".$VisisteurPrenom." le <script>document.write(DateFormatTrad())</script></h2>")
                ?>
            </div>
            <div id="CorpSection">
                <table>
                    <tr>
                        <tr>
                            <td colspan=2>
                                <h1>Médecin vu</h1>
                                <?php
                                echo($MedecinNom." ".$MedecinPrenom."<br>");
                                echo("Motif de la visite : ");
                                if($Motif=="PRD"){
                                    echo("Contrôle périodique<br>");
                                }
                                if($Motif=="ACT"){
                                    echo("Mise à jour des information<br>");
                                }
                                if($Motif=="REL"){
                                    echo("Reprise de contacte<br>");
                                }
                                if($Motif=="SOL"){
                                    echo("Prise de rendez-vous avec le Practitien<br>");
                                }
                                if($Motif=="AUT"){
                                    echo("Autre<br>");
                                }
                                ?>
                            </td>
                        </tr>
                    </tr>
                    <tr>
                        <td colspan=2>
                            <h1>Compte rendu</h1><br>
                            <?php
                            echo('<textarea cols="30" rows="10" selected disabled >'.$CompteRendu.'</textarea>');
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h1>Les produits présentés</h1>
                            <?php
                            echo("1er produit présenter : ".$IdentifiantDuProduit1."<br>");
                            echo("2eme produit présenter : ".$IdentifiantDuProduit2."<br>");
                            ?>
                        </td>
                        <td>
                            <h1>Les échantillons présentés</h1>
                            <?php
                            if($Echantillons1[1]!=0){
                                echo($Echantillons1[1]." echantillons de ".$Echantillons1[0]." ont étaient donnée<br>");
                            }
                            if($Echantillons2[1]!=0){
                                echo($Echantillons2[1]." echantillons de ".$Echantillons2[0]." ont étaient donnée<br>");
                            }
                            if($Echantillons3[1]!=0){
                                echo($Echantillons3[1]." echantillons de ".$Echantillons3[0]." ont étaient donnée<br>");
                            }
                            if($Echantillons4[1]!=0){
                                echo($Echantillons4[1]." echantillons de ".$Echantillons4[0]." ont étaient donnée<br>");
                            }
                            if($Echantillons5[1]!=0){
                                echo($Echantillons5[1]." echantillons de ".$Echantillons5[0]." ont étaient donnée<br>");
                            }
                            if($Echantillons6[1]!=0){
                                echo($Echantillons6[1]." echantillons de ".$Echantillons6[0]." ont étaient donnée<br>");
                            }
                            if($Echantillons7[1]!=0){
                                echo($Echantillons7[1]." echantillons de ".$Echantillons7[0]." ont étaient donnée<br>");
                            }
                            if($Echantillons8[1]!=0){
                                echo($Echantillons8[1]." echantillons de ".$Echantillons8[0]." ont étaient donnée<br>");
                            }
                            if($Echantillons9[1]!=0){
                                echo($Echantillons9[1]." echantillons de ".$Echantillons9[0]." ont étaient donnée<br>");
                            }
                            if($Echantillons10[1]!=0){
                                echo($Echantillons10[1]." echantillons de ".$Echantillons10[0]." ont étaient donnée<br>");
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=2>
                            <br>
                            <h4>Documentation</h4>
                            <?php
                            if($Documentation=="TRUE"){
                                echo("De la documentation est fournie avec les produits et les échantillons");
                            }else{
                                echo("Il n'y a pas de documentation fournie avec les produits et les échantillons");
                            }
                            ?>
                        </td>
                    </tr>
                    <tr >
                        <td colspan=2>
                            <h1>Information complementaire</h1><br>
                            <?php
                                echo("Rapport crée par ".$VisisteurNom." ".$VisisteurPrenom."<br>");
                                echo("Version du rapport: ".$VersionDuRapport."<br>");
                                if($Definitif=="TRUE"){
                                    echo("Le rapport n'est plus modifiable<br>");
                                }else{
                                    echo("Le rapport est modifiable<br>");
                                }
                                echo($IdentifiantDuMedecin." est ".$CoeficientFiabiliter."% Fiabiliter<br>");
                                if($Remplacent=="TRUE"){
                                    echo("Le médecin vu est un remplaçant<br>");
                                }
                                if($Remplacent=="FALSE"){
                                    echo("Le médecin vu est le médecin hadituel<br>");
                                }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="ZoneRaccourci"></div>
    </div>
    <?php
    include('BasDePage.HTML')
    ?>
</body>
</html>


<?php
/*
$IdentifiantUtilisateur=$ligne["UtilisateurID"];
$IdentifiantDuRapport=$ligne["RapportID"];
$VersionDuRapport=$ligne["RapportVersion"];
$Definitif=$ligne["RapportDefinitif"];
$IdentifiantDuMedecin=$ligne["MedID"];
$Remplacent=$ligne["Remplacent"];
$CoeficientFiabiliter=$ligne["CoefDeFiabiliter"];
$Date=$ligne["RapportDate"];
$Motif=$ligne["MotifVisite"];
$CompteRendu=$ligne["Rapport"];
$IdentifiantDuProduit1=$ligne["ProduitID1"];
$IdentifiantDuProduit2=$ligne["ProduitID2"];
$Documentation=$ligne["DocFournit"];
$LesEchantillons=$ligne["LesEchantillons"];
*/
?>