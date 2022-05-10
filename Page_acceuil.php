<!DOCTYPE html>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>GLPI/page_d'acceuil</title>
        <link href="CSS/MaquetteCSS.css" rel="stylesheet">
        <link href="CSS/Banniere.CSS" ref="stylesheet">
    </head>
    <body>
        <?php
        include("HautDePage.HTML")
        ?>
        <!audio autoplay>
            <!source src="audio/Galeries_Balder_-_The_Legend_of_Zelda_Twilight_Princess_HD_OST.mp3" type="audio/mpeg">
        <!/audio> 
        <div id="menu">
            <h3>Compte-rendu :</h3>
        <div class="sous-menu">
            <a href="Depôt_formulaire.html">Nouveaux</a>
            <br>
            <br>                        
        </div>      
        </div>
        <div id="Menu2">
            <h3>Consulter :</h3>
        <div class="sous-menu2">
            <a href="Page_MEDICAMENT.php">Médicaments</a>
            <br>
            <br>
           <a href="Page_PRACTICIEN.html">Praticien</a>
            <br>
            <br>
            <a href="Page_VISITEUR.php">FAQ</a>
            <br>
            <br>
        </div>
        </div>
        <?php
        include("BasDePage.HTML")
        ?>
    </body>
</HTML>