<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>GSB | Connexion</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/GSBCSS.css" rel="stylesheet">
    <link href="CSS/Banniere.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="Image/Logo-gsb2.0.png">
    <script type="text/javascript">
        function verifChamps() //Verifie si les champs de connexion sont remplis 
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
    include("HautDePage.html")
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
    include("BasDePage.html")
    ?>
</body>
</html>