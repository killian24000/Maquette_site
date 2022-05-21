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
    <link rel="stylesheet" href="CSS/Banniere.CSS">
    <link rel="stylesheet" href="CSS/Formulaire.CSS">
    <link rel="stylesheet" href="CSS/MaquetteCSS.CSS">
    <link rel="icon" type="image/png" sizes="16x16" href="Image/Logo-gsb2.0.png">
    <!--Appelle du fichier contenant toutes les fonctions JavaScript-->
    <script src="JavaScript/function.js"></script>
</head>
<body>
    <?php
        include('connect.php');

        if (isset($_POST["ValiderRapport"])){
            $Validation=0;

            $NumeroRapport=$_POST["RapportID"];
            $NumeroRapport="$NumeroRapport";
            $VersionRapport=1;

            //----------------
            if(isset($_POST["CheckDefinitif"])){
                $RapportDefinitif="TRUE";
            }else{
                $RapportDefinitif="FALSE";
            }

            //----------------AAA
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

            //----------------AAA
            if(isset($_POST["Prod1"])){
                $Validation+=1;
                $IdProduit1=$_POST["Prod1"];
            }else{
                echo("<script>alert('Aucune produit n a était choisi. Veuillez en sélectionner un dans la liste de produit 1.')</script>");
            }

            //----------------AAA
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

                /*
                echo($Validation."<br>".$NumeroRapport."<br>".$VersionRapport."<br>".$RapportDefinitif."<br>".$MedIdentifiant."<br>".$Remplacent."<br>"
                .$CoefDeFiabiliter."<br>".$DateDuRapport."<br>".$MotifDeLaVisite."<br>".$Rapport."<br>"
                .$IdProduit1."<br>".$IdProduit2."<br>".$DocFourni."<br>".$LesEchantillon);
                echo("<br><br>oui".$CoefDeFiabiliter."|");*/

                //On récupère dans des variables les données saisies par l'utilisateur
                $reqSQL="INSERT INTO rapport VALUES (1,$NumeroRapport,$VersionRapport,'$RapportDefinitif',$MedIdentifiant,'$Remplacent',$CoefDeFiabiliter,
                '$DateDuRapport','$MotifDeLaVisite','$Rapport',$IdProduit1,$IdProduit2,'$DocFourni','$LesEchantillon')";
                
                //Execution de la requête
                $connexion->exec($reqSQL) or die ("erreur dans la requête sql");
                
                echo("<script>alert('Les information saisie on etait ajouter.')</script>");
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
            <form action="DepotFormulaire.php" method="post">
                <div id="TitreSection">
                    <h2>RAPPORTS DE VISITE</h2>
                </div>
                <div id="CorpSection">
                    <table>
                        <tr>
                            <td>
                                Numéro de rapport
                            </td>
                            <td>
                                <?php
                                    $reqSQL="SELECT MAX(RapportID) FROM rapport";
                                    //Exécute la requête
                                    $result=$connexion->query($reqSQL);
                                    //Lecture de la 1re ligne du jeu d'enregistrements
                                    $ligne=$result->fetch();
                                    $ligne=$ligne[0]+1;
                                    $ligne="$ligne";
                                    //Tant qu'on n'a pas atteint la fin du jeu d'enregistrements,on boucle
                                    echo('<input type="text" name="RapportID" class="bouton" readonly="false" value="'.$ligne.'">');
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
                                <input type="number" name="CoefFiable" id="Nb_Coef" class="bouton" min=0 max=100 value=50>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Date Rapport
                            </td>
                            <td>
                                <script>
                                    //Pour que input type=date soit par defaut sur la date du jour il faut utiliser du javascript ou php
                                    //Utilisattion de la fonction DateDuJour() pour récuppérer et convertir au bon format la date
                                    document.write('<input type="date" name="DateRapport" id="Date" class="bouton" value="'+DateDuJour()+'" min="'+DateDuJour()+'">');
                                </script>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Motif de la visite
                            </td>
                            <td>
                                <select name="TypeMotif" id="Slct_Motif" class="bouton">
                                    <option value="PRD">Périodicité</option>
                                    <option value="ACT">Actualisation</option>
                                    <option value="REL">Relance</option>
                                    <option value="SOL">Sollicitation praticien</option>
                                    <option value="AUT">Autre</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Remplacent
                            </td>
                            <td>
                                <input type="checkbox" name="CheckRemplacent" id="Cbx_Remp" class="bouton">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                Bilan
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <textarea name="TxtArBilan" cols="30" rows="10" maxlength="1000"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="TitreSection">
                    <h2>ELEMENT PRESENTES</h2>
                </div>
                <div id="CorpSection">
                    <table>
                        <tr>
                            <td>
                                Produit 1 :
                            </td>
                            <td>
                                <select name="Prod1" id="Slct_Prod1" class="bouton">
                                    <option selected disabled value="default">Choisire un produit</option>
                                    <option value="1100">Prodtest</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Produit 2 :
                            </td>
                            <td>
                                <select name="Prod2" id="Slct_Prod2" class="bouton">
                                    <option selected disabled value="default">Choisire un produit</option>
                                    <option value="2032">Prodtest</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Documentation :
                            </td>
                            <td>
                                <input type="checkbox" name="CheckDoc" id="Cbx_Doc" class="bouton">
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
                        <?php
                        for($i=1; $i<11; $i++){
                            echo('
                                <tr>
                                    <td>Echantillons '.$i.' :</td>
                                    <td>
                                        <select name="ListeEchantillons'.$i.'" class="bouton" type="Slct_Echantillons'.$i.'">
                                            <option value="AAA'.$i.'">Rien</option>
                                            <option value="PPP'.$i.'">Prod1</option>
                                        </select>
                                        <input type="number" name="NbEchantillons'.$i.'" class="NbEnchantillons" min=0 max=10 value=0>
                                    </td>
                                </tr>
                            ');
                        }
                        ?>
                        <tr>
                            <td>
                                Saisie définitive : 
                            </td>
                            <td>
                                <input type="checkbox" name="CheckDefinitif" id="Cbx_Definitif" class="bouton">
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="BoutonEdition">
                    <button type="submit" name="ValiderRapport">ENREGISTRER</button>
                </div>
            </form>
        </div>
        <div id="ZoneRaccourci"></div>
    </div>
    <?php
    include('BasDePage.HTML')
    ?>
</body>
</html>