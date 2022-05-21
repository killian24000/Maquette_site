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
    include('HautDePage.html');
    ?>
    <div style="display: flex" id="CorpDePage">
        <?php
        include('Raccourci.html')
        ?>
        <div style="display:inline-table;" id="CDPCentre">
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
                            <input type="text" id="RapportID" class="bouton">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Praticien
                        </td>
                        <td>
                            <!--
                            Slct_Practitient : Selection de practition
                            <select> : Liste déroulante-->
                            <select name="NomPractitien" id="Slct_Practitient" class="bouton">
                                <option value="">Choisir un Praticien</option>
                                <!-- lier a la base de donne pour reccupérer les nom -->
                            </select>
                            <button>Detail</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Coefficient
                        </td>
                        <td>
                            <input type="number" name="Coef" id="Coef" class="bouton">
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
                                document.write('<input type="date" name="des" id="des" class="bouton" value="'+DateDuJour()+'" min="'+DateDuJour()+'">');
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
                                <option value=""></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Produit 2 :
                        </td>
                        <td>
                            <select name="Prod2" id="Slct_Prod2" class="bouton">
                                <option value=""></option>
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
                                        <option value="">Rien</option>
                                        <option value="">Prod1</option>
                                    </select>
                                    <input type="number" name="NbForEchantillons'.$i.'" class="NbEnchantillons" min=0 max=10>
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
                <button>
                    Précédant
                </button>
                <button>
                    Suivant
                </button>
                <button>
                    Nouveau
                </button>
            </div>
        </div>
        <div id="ZoneRaccourci"></div>
    </div>
    <?php
    include('BasDePage.HTML')
    ?>
</body>
</html>