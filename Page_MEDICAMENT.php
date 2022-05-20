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
    <?php
    include('connect.php');

    if (isset($_POST["ValiderMedoc"])){
        $
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
            <div id="TitreSection">
                <h2>PHARMACOPEE</h2>
            </div>
            <div id="CorpSection">
                <table>
                    <tr>
                        <td>
                            <p>DEPOT LEGAL :</p>
                        </td>
                        <td>
                            <input type="text" name="DepotLegal" class="bouton">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>NOM COMMERCIAL :</p>
                        </td>
                        <td>
                            <input type="text" name="NomCommercial" id="bouton">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>FAMILLE :</p>
                        </td>
                        <td>
                            <input type="text" name="MedoFamille" id="bouton">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>COMPOSANT :</p>
                        </td>
                    <tr>
                        <td colspan="2">
                            <textarea name="TxtARComposant" cols="30" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>EFFETS :</p>
                        </td>
                    <tr>
                        <td colspan="2">
                            <textarea name="TxtAREffets" cols="30" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>CONTRE INDICATION :</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea name="TxtARContreIndic" cols="30" rows="10"></textarea>
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <td>
                            <p>COMBIEN A AJOUTER :</p>
                        </td>
                        <td>
                            <input type="number" name="NbAjouter" id="bouton">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>PRIX :</p>
                        </td>
                        <td>
                            <input type="number" name="NbPrix" id="">
                        </td>
                    </tr>
                </table>
            </div>
            <div id="BoutonEdition">
                <button type="submit" name="ValiderMedoc">AJOUTER</button>
            </div>
        </div>
        <div id="ZoneRaccourci"></div>
    </div>
    
    <?php
    include("BasDePage.HTML")
    ?>
</body>
</html>