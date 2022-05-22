<!DOCTYPE html>
<?php
    //démarrer une session
    session_start();
    //test vérifiant la présence de la variable de session
    if($_SESSION['ok']!='oui')
    {
        //redirection vers la page de démarrage du site(index.html)
        header("location:index.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSB | Depot de formulaire</title>
    <link rel="stylesheet" href="CSS/Banniere.css">
    <link rel="stylesheet" href="CSS/Formulaire.css">
    <link rel="stylesheet" href="CSS/GSBCSS.css">
    <link rel="icon" type="image/png" sizes="16x16" href="Image/Logo-gsb2.0.png">
    <!--Appelle du fichier contenant toutes les fonctions JavaScript-->
    <script src="JavaScript/function.js"></script>
</head>
<body>
    <?php
        include('connect.php');

        if(isset($_POST["ListeRapport"])){
            $IdentifiantDuRapport=$_POST["ListeRapport"];
        }else{
            $IdentifiantDuRapport=$_POST["RapportID"];
        }
            
        $reqSQL="SELECT * FROM rapport WHERE RapportID=$IdentifiantDuRapport";
        //Exécute la requête
        $result=$connexion->query($reqSQL);
        //Lecture de la 1re ligne du jeu d'enregistrements
        $ligne=$result->fetch();


        $ValDefautRapportID=$ligne['RapportID'];
        $ValDefautRapportVersion=$ligne['RapportVersion'];
        $ValDefautDefinitif=$ligne['RapportDefinitif'];
        $ValDefautMedID=$ligne['MedID'];
        $ValDefautRemplacent=$ligne['Remplacent'];
        $ValDefautCoefDeFiabiliter=$ligne['CoefDeFiabiliter'];
        $ValDefautRapportDate=$ligne['RapportDate'];
        $ValDefautMotifVisite=$ligne['MotifVisite'];
        $ValDefautRapport=$ligne['Rapport'];
        $ValDefautProduID1=$ligne['ProduitID1'];
        $ValDefautProduID2=$ligne['ProduitID2'];
        $ValDefautDocFournit=$ligne['DocFournit'];

        if (isset($_POST["ValiderRapport"])){
            $Validation=0;

            $UtilisateurIdentifiant=$_SESSION['IDUser'];

            $NumeroRapport=$_POST["RapportID"];
            $NumeroRapport="$NumeroRapport";
            $VersionRapport=1;

            //----------------
            if(isset($_POST["CheckDefinitif"])){
                $RapportDefinitif="TRUE";
            }else{
                $RapportDefinitif="FALSE";
            }

            //----------------
            if(isset($_POST["NomPractitien"])){
                $Validation+=1;
                $MedIdentifiant=$_POST["NomPractitien"];
            }else{
                echo("<script>alert('Aucune medecin n a était choisi. Veuillez en sélectionner un dans la liste.')</script>");
            }

            //----------------
            if(isset($_POST["CheckRemplacent"])){
                $Remplacent="TRUE";
            }else{
                $Remplacent="FALSE";
            }

            //----------------
            if(isset($_POST["CoefFiable"])){
                $Validation+=1;
                $CoefDeFiabiliter=$_POST["CoefFiable"];
            }else{
                echo("<script>alert('Aucune valeur n a ete saisie pour le coefficient. Veuillez en sélectionner une entre 0 et 100.')</script>");
            }

            //----------------
            $DateDuRapport=$_POST["DateRapport"];
            $MotifDeLaVisite=$_POST["TypeMotif"];

            //----------------
            if($_POST["TxtArBilan"]==""){
                echo("<script>alert('Attention rien n a ete saisi dans le bilan')</script>");
            }else{
                $Validation+=1;
                $Rapport=$_POST["TxtArBilan"];
            }

            //----------------
            if(isset($_POST["Prod1"])){
                $Validation+=1;
                $IdProduit1=$_POST["Prod1"];
            }else{
                echo("<script>alert('Aucune produit n a était choisi. Veuillez en sélectionner un dans la liste de produit 1.')</script>");
            }

            //----------------
            if(isset($_POST["Prod2"])){
                $Validation+=1;
                $IdProduit2=$_POST["Prod2"];
            }else{
                echo("<script>alert('Aucune produit n a était choisi. Veuillez en sélectionner un dans la liste de produit 2.')</script>");
            }

            //----------------
            if(isset($_POST["CheckDoc"])){
                $DocFourni="TRUE";
            }else{
                $DocFourni="FALSE";
            }

            //----------------
            $NbTotalEchantillons=0;
            for($i=1; $i<11; $i++){
                $NbTotalEchantillons=$NbTotalEchantillons+$_POST['NbEchantillons'.$i];
            }
            if($NbTotalEchantillons>10){
                echo("<script>alert('Le nombre d échantillons total est supérieur à 10. Veuillez en retirer quelques-uns')</script>");
            }else{
                $Validation+=1;
                $LesEchantillon="";
                for($i=1; $i<11; $i++){
                    $LesEchantillon=$LesEchantillon.$_POST['ListeEchantillons'.$i].":".$_POST['NbEchantillons'.$i]."|";
                }
            }

            if($Validation==6){

                if($VersionRapport>3){
                    $RapportDefinitif="TRUE";
                }
                
                /*
                $NumeroRapport=intval($NumeroRapport);
                $MedIdentifiant=intval($MedIdentifiant);
                $CoefDeFiabiliter=intval($CoefDeFiabiliter);
                $IdProduit1=intval($IdProduit1);
                $IdProduit2=intval($IdProduit2);

                echo($Validation.gettype($Validation)."<br>".$NumeroRapport.gettype($NumeroRapport)."<br>"
                .$VersionRapport.gettype($VersionRapport)."<br>".$RapportDefinitif.gettype($RapportDefinitif)."<br>"
                .$MedIdentifiant.gettype($MedIdentifiant)."<br>".$Remplacent.gettype($Remplacent)."<br>"
                .$CoefDeFiabiliter.gettype($CoefDeFiabiliter)."<br>".$DateDuRapport.gettype($DateDuRapport)."<br>"
                .$MotifDeLaVisite.gettype($MotifDeLaVisite)."<br>".$Rapport.gettype($Rapport)."<br>"
                .$IdProduit1.gettype($IdProduit1)."<br>".$IdProduit2.gettype($IdProduit2)."<br>"
                .$DocFourni.gettype($DocFourni)."<br>".$LesEchantillon.gettype($LesEchantillon));*/

                //On récupère dans des variables les données saisies par l'utilisateur
                /*$reqSQL="INSERT INTO rapport VALUES ($UtilisateurIdentifiant,$NumeroRapport,$VersionRapport,'$RapportDefinitif',$MedIdentifiant,'$Remplacent',$CoefDeFiabiliter,
                '$DateDuRapport','$MotifDeLaVisite','$Rapport',$IdProduit1,$IdProduit2,'$DocFourni','$LesEchantillon')";*/
                
                
                $reqSQL="UPDATE rapport SET UtilisateurID=$UtilisateurIdentifiant,RapportID=$NumeroRapport,RapportVersion=$VersionRapport+1,RapportDefinitif='$RapportDefinitif',MedID=$MedIdentifiant,Remplacent='$Remplacent',CoefDeFiabiliter=$CoefDeFiabiliter,
                RapportDate='$DateDuRapport',MotifVisite='$MotifDeLaVisite',Rapport='$Rapport',ProduitID1=$IdProduit1,ProduitID2=$IdProduit2,DocFournit='$DocFourni',lesEchantillons='$LesEchantillon'
                WHERE RapportID=$NumeroRapport";

                //echo("<br><br>".$reqSQL."<br><br>");
                
                //Execution de la requête
                $connexion->exec($reqSQL) or die ("erreur dans la requête sql");
                
                echo("<script>alert('Les information saisie on etait ajouter.')</script>");
                header("location:Page_acceuil.php"); 
            }
        }
    ?>
    <?php
    include('HautDePage.html');
    ?>
    <div style="display: flex" id="CorpDePage">
        <?php
        include('Raccourci.html')
        ?>
        <div style="display:inline-table;" id="CDPCentre">
            <form action="ModificationFormulaire.php" method="post">
                <div id="TitreSection">
                    <h2>RAPPORTS DE VISITE : MODIFICATION</h2>
                </div>
                <div id="CorpSection">
                    <table>
                        <tr>
                            <td>
                                Numéro de rapport
                            </td>
                            <td>
                                <?php
                                    echo('<input type="text" name="RapportID" class="bouton" readonly="false" value="'.$ValDefautRapportID.'">');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Practitien
                            </td>
                            <td>
                                <!--
                                Slct_Practitient : Selection de practition
                                <select> : Liste déroulante-->
                                <select name="NomPractitien" id="Slct_Practitient" class="bouton">
                                    <option selected disabled value="">Choisiser un(e) practitien(ne)</option>
                                    <?php
                                        $reqSQL="SELECT * FROM medecin";
                                        $result=$connexion->query($reqSQL);
                                        $ligne=$result->fetch();
                                        while($ligne!=false)
                                        {   //On stock les données du praticien dans des variables
                                            $code=$ligne["MedID"]; //code du praticien
                                            $nom=$ligne["MedNom"];  //Nom du praticien
                                            $prenom=$ligne["MedPrenom"];  //Prenom du praticien
                                            //On génère une ligne dans la liste déroulante 
                                            echo("<option value=".$code.">$nom $prenom</option>");
                                            //Lecture de la ligne suivante dans le jeu d'enregistrement
                                            $ligne=$result->fetch();
                                        }
                                    ?>
                                </select>
                                <button><a href="Page_PRACTICIEN.php" target="_blank">Detail</a></button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Coeficient de fiabiliter
                            </td>
                            <td>
                                <?php
                                echo('<input type="number" name="CoefFiable" id="Nb_Coef" class="bouton" min=0 max=100 value="'.$ValDefautCoefDeFiabiliter.'">')
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Date Rapport
                            </td>
                            <td>
                                <?php
                                echo('<input type="date" name="DateRapport" id="Date" class="bouton" value="'.$ValDefautRapportDate.'" min="'.$ValDefautRapportDate.'">')
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Motif de la visite : Par defaut le choix était <?php echo($ValDefautMotifVisite)?>
                            </td>
                            <td>
                                <select name="TypeMotif" id="Slct_Motif" class="bouton">
                                    <option value="PRD">Périodicité (PRD)</option>
                                    <option value="ACT">Actualisation (ACT)</option>
                                    <option value="REL">Relance (REL)</option>
                                    <option value="SOL">Sollicitation praticien (SOL)</option>
                                    <option value="AUT">Autre (AUT)</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Remplaçant
                            </td>
                            <td>
                                <input type="checkbox" name="CheckRemplacent" id="Cbx_Remp" class="bouton"
                                <?php
                                if ($ValDefautRemplacent=="TRUE"){
                                    echo('checked');
                                }
                                ?>>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                Bilan
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <textarea name="TxtArBilan" cols="30" rows="10" maxlength="1000"><?php echo($ValDefautRapport)?></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="TitreSection">
                    <h2>ÉLÉMENT PRÉSENTÉS</h2>
                </div>
                <div id="CorpSection">
                    <table>
                        <tr>
                            <td>
                                Produit 1 : Par defaut le choix était
                                <?php
                                $reqSQL="SELECT * FROM medicament";
                                $result=$connexion->query($reqSQL);
                                $ligne=$result->fetch();
                                while($ligne!=false)
                                {   
                                    $MedicCode=$ligne["MedicID"]; 
                                    $MedicNom=$ligne["NomCommercial"];
                                    if($ValDefautProduID1==$MedicCode){
                                        echo($MedicNom);
                                    }
                                    $ligne=$result->fetch();
                                }
                                ?>
                            </td>
                            <td>
                                <select name="Prod1" id="Slct_Prod1" class="bouton">
                                    <option selected disabled value="default">Choisir un produit</option>
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
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Produit 2 : Par defaut le choix était
                                <?php
                                $reqSQL="SELECT * FROM medicament";
                                $result=$connexion->query($reqSQL);
                                $ligne=$result->fetch();
                                while($ligne!=false)
                                {   
                                    $MedicCode=$ligne["MedicID"]; 
                                    $MedicNom=$ligne["NomCommercial"];
                                    if($ValDefautProduID2==$MedicCode){
                                        echo($MedicNom);
                                    }
                                    $ligne=$result->fetch();
                                }
                                ?>
                            </td>
                            <td>
                                <select name="Prod2" id="Slct_Prod2" class="bouton">
                                    <option selected disabled value="default">Choisir un produit</option>
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
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Documentation :
                            </td>
                            <td>
                                <input type="checkbox" name="CheckDoc" id="Cbx_Doc" class="bouton"
                                <?php
                                if ($ValDefautDocFournit=="TRUE"){
                                    echo('checked');
                                }
                                ?>>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="TitreSection">
                    <h2>
                        ENCHANTILLONS
                    </h2>
                </div>
                <div id="CorpSection">
                    <table>
                        <tr>
                            <td>Echantillons 1 :</td>
                            <td>
                                <select name="ListeEchantillons1" class="bouton" type="Slct_Echantillons1">
                                    <option value="0">Rien</option>
                                    <?php
                                    include('IncludeListeMedicament.php');
                                    ?>
                                </select>
                                <input type="number" name="NbEchantillons1" class="NbEnchantillons" min=0 max=10 value=0>
                            </td>
                        </tr>
                        <tr>
                            <td>Echantillons 2 :</td>
                            <td>
                                <select name="ListeEchantillons2" class="bouton" type="Slct_Echantillons2">
                                    <option value="0">Rien</option>
                                    <?php
                                    include('IncludeListeMedicament.php');
                                    ?>
                                </select>
                                <input type="number" name="NbEchantillons2" class="NbEnchantillons" min=0 max=10 value=0>
                            </td>
                        </tr>
                        <tr>
                            <td>Echantillons 3 :</td>
                            <td>
                                <select name="ListeEchantillons3" class="bouton" type="Slct_Echantillons3">
                                    <option value="0">Rien</option>
                                    <?php
                                    include('IncludeListeMedicament.php');
                                    ?>
                                </select>
                                <input type="number" name="NbEchantillons3" class="NbEnchantillons" min=0 max=10 value=0>
                            </td>
                        </tr>
                        <tr>
                            <td>Echantillons 4 :</td>
                            <td>
                                <select name="ListeEchantillons4" class="bouton" type="Slct_Echantillons4">
                                    <option value="0">Rien</option>
                                    <?php
                                    include('IncludeListeMedicament.php');
                                    ?>
                                </select>
                                <input type="number" name="NbEchantillons4" class="NbEnchantillons" min=0 max=10 value=0>
                            </td>
                        </tr>
                        <tr>
                            <td>Echantillons 5 :</td>
                            <td>
                                <select name="ListeEchantillons5" class="bouton" type="Slct_Echantillons5">
                                    <option value="0">Rien</option>
                                    <?php
                                    include('IncludeListeMedicament.php');
                                    ?>
                                </select>
                                <input type="number" name="NbEchantillons5" class="NbEnchantillons" min=0 max=10 value=0>
                            </td>
                        </tr>
                        <tr>
                            <td>Echantillons 6 :</td>
                            <td>
                                <select name="ListeEchantillons6" class="bouton" type="Slct_Echantillons6">
                                    <option value="0">Rien</option>
                                    <?php
                                    include('IncludeListeMedicament.php');
                                    ?>
                                </select>
                                <input type="number" name="NbEchantillons6" class="NbEnchantillons" min=0 max=10 value=0>
                            </td>
                        </tr>
                        <tr>
                            <td>Echantillons 7 :</td>
                            <td>
                                <select name="ListeEchantillons7" class="bouton" type="Slct_Echantillons7">
                                    <option value="0">Rien</option>
                                    <?php
                                    include('IncludeListeMedicament.php');
                                    ?>
                                </select>
                                <input type="number" name="NbEchantillons7" class="NbEnchantillons" min=0 max=10 value=0>
                            </td>
                        </tr>
                        <tr>
                            <td>Echantillons 8 :</td>
                            <td>
                                <select name="ListeEchantillons8" class="bouton" type="Slct_Echantillons8">
                                    <option value="0">Rien</option>
                                    <?php
                                    include('IncludeListeMedicament.php');
                                    ?>
                                </select>
                                <input type="number" name="NbEchantillons8" class="NbEnchantillons" min=0 max=10 value=0>
                            </td>
                        </tr>
                        <tr>
                            <td>Echantillons 9 :</td>
                            <td>
                                <select name="ListeEchantillons9" class="bouton" type="Slct_Echantillons9">
                                    <option value="0">Rien</option>
                                    <?php
                                    include('IncludeListeMedicament.php');
                                    ?>
                                </select>
                                <input type="number" name="NbEchantillons9" class="NbEnchantillons" min=0 max=10 value=0>
                            </td>
                        </tr>
                        <tr>
                            <td>Echantillons 10 :</td>
                            <td>
                                <select name="ListeEchantillons10" class="bouton" type="Slct_Echantillons9">
                                    <option value="0">Rien</option>
                                    <?php
                                    include('IncludeListeMedicament.php');
                                    ?>
                                </select>
                                <input type="number" name="NbEchantillons10" class="NbEnchantillons" min=0 max=10 value=0>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                Saisie définitive : 
                            </td>
                            <td>
                                <input type="checkbox" name="CheckDefinitif" id="Cbx_Definitif" class="bouton"
                                <?php
                                if ($ValDefautDefinitif=="TRUE"){
                                    echo('checked');
                                }
                                ?>>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="BoutonEdition">
                    <button type="submit" name="ValiderRapport">ENREGISTRER</button>
                </div>
            </form>
        </div>
        <div id="ZoneRaccourci">
            <figure id="FigureRaccourci">
                <div id="TitreRaccourci">
                    <h2>Option</h2>
                </div>
                <div id="CorpRaccourci">
                    <a href="SelectionFormulaireVisio.php">Afficher un formulaire<br>précedent</a><br>
                    <a href="SelectionFormulaireModif.php">Modifier un de<br>vos formulaire</a><br>
                </div>
            </figure>
        </div>
    </div>
    <?php
    include('BasDePage.HTML')
    ?>
</body>
</html>