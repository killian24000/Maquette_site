<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLPI/login</title>
    <link href="CSS/MaquetteCSS.css" rel="stylesheet">
    <link href="CSS/Banniere.css" rel="stylesheet">
    <script type="text/javascript">
        function verifChamps()
        {
            if(document.getElementById('nom').value==''
            ||document.getElementById('motDePasse').value=='')
            {
            alert("remplir tout les champs");
            return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <?php
    include("HautDePage.HTML")
    ?>
    <form action="identification.php" method="post" onsubmit="return verifChamps()">
        <div id="mot_de_passe">
            <h3>Identifiant</h3>
        <input type="text" name="nom" id="nom">
            <h3>Mot de Passe</h3>
        <input type="password" name="motDePasse" id="motDePasse">
        <br>
        <br>
        <button type="submit" name="valider" value="Valider">Valider</button>
        <button type="reset" name="annulation" value="Annuler">Annuler</button>
        <br>
        <br>
        </div>
    </form>
    <?php
    include("BasDePage.HTML")
    ?>
</body>
</html>