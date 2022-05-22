<!DOCTYPE html>
<?php
    //démarrer une session
    session_start();
    //test vérifiant la présence de la variable de session
    if($_SESSION['ok']!='oui')
    {
        //redirection vers la page d'entrée de démarrage du site (index.php)       
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
    <link rel="icon" type="image/png" sizes="16x16" href="Image/Logo-gsb2.0.png">
    <title>GSB | Conditions d'utilisation</title>
</head>
<body>
    <?php
    include('HautDePage.HTML');
    ?>
    <div style="display: flex" id="CorpDePage">
        <?php
        include("Raccourci.html");
        ?>
        <div class="FAQ" id="CDPCentre">    
            <div class="question" id="Q1">
                <h2>Condition d'utilisation</h2>
            </div>
                <h3>Vous ne pourrez utiliser ce service que si vous être membre de l'entreprise GSB.
                <p>Si vous acceptez les présentes conditions vous serez dans l'obligations de les respecter.</p></h3>
            <div class="question">
                <h2>Confidentialité</h2>
            </div>
                <h3>En utilisant le service GSB, vous consentez à ce que nous collections et utilisions vos données en accord avec le RGPD.</p></h3>
            <div class="question">
                <h2>Contenu des services</h2>
            </div>
                <h3>Vous êtes résponsable de l'utilisation que vous faites des Services et de tout Contenu                
                <p>que vous fournissez, y compris de la conformité aux lois, règles et réglementations en vigueur</p></h3>                 
        </div>
        <div id="ZoneRaccourci"></div>
    </div>
    
    <?php
    include('BasDePage.HTML');
    ?>            
</body>
</html>