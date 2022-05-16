<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="CSS/MaquetteCSS.css" rel="stylesheet">
            <link href="CSS/Banniere.CSS" rel="stylesheet">
        <title>GLPI/Practicien</title>
    </head>
    <body>
    <?php
    include("HautDePage.HTML")
    ?>
    <div id="Titre">
    <h1>Praticien</h1>
    <form name="ListeRecherche">
        <select name="LstPraticien" class="titre">
            <option>Choisissez un praticien</option>
    </form>
    </div>
    <?php
    include("BasDePage.HTML")
    ?>    
</body>
</html>