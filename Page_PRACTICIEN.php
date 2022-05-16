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
    <div id="titre">
    <h1>Praticien</h1>
    <form name="ListeRecherche">
        <select name="LstPraticien" class="titre">
            <option>Choisissez un praticien</option>
            <option value="1">Dupont</option>
            <option value="2">Gosselin</option>
            <option value="3">Delacoure</option>
        </select>    
    </form>
    <br>
    <button type="submit" name="Valider" value="Valider">Rechercher</button>
    <ul>
    </div>
    <?php
    include("BasDePage.HTML")
    ?>    
</body>
</html>