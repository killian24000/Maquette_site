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
    <link href="CSS/GSBCSS.css" rel="stylesheet">
    <link href="CSS/Banniere.CSS" rel="stylesheet">
    <link href="CSS/Formulaire.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="Image/Logo-gsb2.0.png">
    <title>GSB | Medicament</title>
</head>
<body>
    <?php
        include('connect.php');
            
        if (isset($_POST["ValiderMedoc"])){
            $IdentifiantMedicament=$_POST["MedicamentID"];
            $Type=$_POST["ListeType"];
            $DepotLegal=$_POST["DepotLegal"];
            $NomCommercial=$_POST["NomCommercial"];
            $Famille=$_POST["MedocFamille"];
            $Composition=$_POST["TxtARComposant"];
            $Effets=$_POST["TxtAREffets"];
            $ContreIndication=$_POST["TxtARContreIndic"];
            $Ajouter=$_POST["NbAjouter"];
            $Prix=$_POST["NbPrix"];


            $reqSQL="SELECT COUNT(*) FROM medicament 
                    WHERE MedicType='$Type'
                    AND DepotLegal='$DepotLegal'
                    AND NomCommercial='$NomCommercial'
                    AND Famille='$Famille'
                    AND Composition='$Composition'
                    AND Effets='$Effets'
                    AND ContreIndication='$ContreIndication'
            ";
            $res = $connexion->query($reqSQL);
            $ligne = $res->fetch();

            if ($ligne[0]>0){
                echo("<script>alert('Les information saisie corresponde a des donnée exsistante. Ces donnée on donc était mise a jour.')</script>");
                //On récupère dans des variables les données saisies par l'utilisateur
                $reqSQL="UPDATE medicament SET MedicNb=MedicNb+'$Ajouter',Prix='$Prix'
                        WHERE MedicType='$Type'
                        AND DepotLegal='$DepotLegal'
                        AND NomCommercial='$NomCommercial'
                        AND Famille='$Famille'
                        AND Composition='$Composition'
                        AND Effets='$Effets'
                        AND ContreIndication='$ContreIndication'
                ";
                
                //Execution de la requête
                $connexion->exec($reqSQL) or die ("erreur dans la requête sql");
            
                //on ferme la connexion
                $connexion=null;
            }else{
                echo("<script>alert('Les information saisie on etait ajouter.')</script>");
                //On récupère dans des variables les données saisies par l'utilisateur
                $reqSQL="INSERT INTO medicament VALUES ('$IdentifiantMedicament','$Type','$DepotLegal','$NomCommercial','$Famille','$Composition','$Effets','$ContreIndication','$Ajouter','$Prix')";
                
                //Execution de la requête
                $connexion->exec($reqSQL) or die ("erreur dans la requête sql");
            
                //on ferme la connexion
            }
        }
    ?>
    <?php
    include("HautDePage.HTML")
    ?>
    <div style="display: flex" id="CorpDePage">
        <?php
        include('Raccourci.html')
        ?>
        <div style="display:inline-table;" id="CDPCentre">
            <form action="Page_MEDICAMENT.php" method="post">
                <div id="TitreSection">
                    <h2>PHARMACOPEE</h2>
                </div>
                <div id="CorpSection">
                    <table>
                        <tr>
                            <td>
                                Identifiant du médicament
                            </td>
                            <td>
                                <?php
                                    $reqSQL="SELECT MAX(MedicID) FROM medicament";
                                    //Exécute la requête
                                    $result=$connexion->query($reqSQL);
                                    //Lecture de la 1re ligne du jeu d'enregistrements
                                    $ligne=$result->fetch();
                                    $ligne=$ligne[0]+1;
                                    $ligne="$ligne";
                                    //Tant qu'on n'a pas atteint la fin du jeu d'enregistrements,on boucle
                                    echo('<input type="text" name="MedicamentID" class="bouton" readonly="false" value="'.$ligne.'">');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>DEPOT LEGAL :</p>
                            </td>
                            <td>
                                <input type="text" name="DepotLegal" class="bouton" value="A">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>NOM COMMERCIAL :</p>
                            </td>
                            <td>
                                <input type="text" name="NomCommercial" id="bouton" value="B">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>TYPE :</p>
                            </td>
                            <td>
                                <select name="ListeType" id="bouton">
                                    <option value="Generique">Générique</option>
                                    <option value="Biosimilaire">Biosimilaire</option>
                                    <option value="Orphelin">Orphelin</option>
                                    <option value="Biologique">Biologique</option>
                                    <option value="A_base_de_plantes">À base de plantes</option>
                                    <option value="Essentiel">Essentiel</option>
                                    <option value="Stupéfiant">Stupéfiant</option>
                                    <option value="Autre">Autre</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>FAMILLE :</p>
                            </td>
                            <td>
                                <input type="text" name="MedocFamille" id="bouton" value="C">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>COMPOSANT :</p>
                            </td>
                        <tr>
                            <td colspan="2">
                                <textarea name="TxtARComposant" cols="30" rows="10">D</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>EFFETS :</p>
                            </td>
                        <tr>
                            <td colspan="2">
                                <textarea name="TxtAREffets" cols="30" rows="10">E</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>CONTRE INDICATION :</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <textarea name="TxtARContreIndic" cols="30" rows="10">F</textarea>
                            </td>
                        </tr>
                        </tr>
                        <tr>
                            <td>
                                <p>COMBIEN A AJOUTER :</p>
                            </td>
                            <td>
                                <input type="number" name="NbAjouter" id="bouton" value=1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>PRIX :</p>
                            </td>
                            <td>
                                <input type="number" name="NbPrix" id="" value=2>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="BoutonEdition">
                    <button type="submit" name="ValiderMedoc">AJOUTER</button>
                </div>
            </form>
        </div>
        <div id="ZoneRaccourci"></div>
    </div>
    <?php
    include("BasDePage.HTML")
    ?>
</body>
</html>