<!DOCTYPE html>
<?php
    include("HautDePage.html");
?>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>GSB | Acceuil</title>
        <link href="CSS/MaquetteCSS.css" rel="stylesheet">
        <link href="CSS/Banniere.CSS" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="16x16" href="Image/Logo-gsb2.0.png">
    </head>
    <body>
         <div id="Cpt-rendu">
            <h3>Compte-rendu</h3>
            </div>
        <div id="menu">
           
        <div class="sous-menu">
            <br>
            <a href="DepotFormulaire.php">Nouveaux</a>
            <br>
            <br>          
        </div>      
        </div>
        <div id="Consulter">
            <h3>Consulter</h3>
        </div>
        <div id="Menu2">
            <br>
            <a href="Page_MEDICAMENT.php">Médicaments</a>
            <br>
            <br>
            <a href="Page_PRACTICIEN.php">Praticien</a>
            <br>
            <br>
            <a href="FAQ.php">FAQ</a>
            <br>
            <br>
            <form name="BtnDeconnexion" action="FormulaireDeconnexion.php" method="post">
            <button type="submit">Déconnexion</button>
            </form>
            <br>
        </div>
        <?php
        include("BasDePage.HTML")
        ?>
    </body>
</HTML>