<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        <?php
        if(isset($_POST["Titre"])){
            echo($_POST["Titre"]);
        }else{
            echo("Vide");
        }
        ?>
    </h1>
    <form action="test5A.php" method="post">
        <input type="text" name="Titre">
        <button type="submit">Valider</button>
    </form>
    <form action="test5.php" method="post">
        <select name="liste" id="listeID">
        <?php
        for($i=0; $i<20; $i++){
            echo('<option value=perso'.$i.'>Michel'.$i.'</option>');
        }
        ?>
        </select>
        <button type="submit">Valider</button>
    </form>

</body>
</html>