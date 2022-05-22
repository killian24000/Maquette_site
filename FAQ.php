<!DOCTYPE html>
<?php
//démarrer une session
session_start();
//test vérifiant la présence de la variable de session
if($_SESSION['ok']!='oui')
{
    //redirection vers la page de démarrage du site(index.html)
    if($_SESSION['ok']!='oui2')
    header("location:index.php");
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <link a href="CSS/GSBCSS.css" rel="stylesheet">
        <link href="CSS/Banniere.CSS" rel="stylesheet">
        <link href="CSS/Formulaire.CSS" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="16x16" href="Image/Logo-gsb2.0.png">
        <title>GSB | FAQ</title>
    </head>
    <body>
        <?php
        include("HautDePage.html"); //Inclusion de la page correspondant à la bannière du Haut de Page 
        ?>
        <div style="display: flex">
            <?php
            include("Raccourci.html"); // Inclusion de la page correspondant au menu 
            ?>
            <div id="FAQ">
                <div class="question" id="Q1">
                <h2>Je n'arrive pas à me connecter que dois-je faire ? </h2>
                </div>
                <h3>Pour cela il suffit de contacter le service réseau</h3>
                <div class="question"> 
                <h2>J'ai perdu mes identifiants, qui dois-je contacter ?</h2>
                </div>
                <h3>En cas de perte de vos identifiants, contacter le service informatique qui vous en attribuera des nouveaux  </h3>
                <div class="question">        
                <h2>Que doit-je faire en cas de piratage du compte ?</h2>
                </div>
                <h3>En cas de piratage de votre compte nous vous recommandons de changer votre mot de passe</h3>
                <div class="question">
                <h2>Je suis un nouveau dans l'entreprise, comment obtenir mes identifiants ?</h2>
                </div>
                <h3>Veuillez vous rapprochez du service informatique de l'entreprise </h3> 
            </div>
            <div id="ZoneRaccourci"></div>
        </div>
        <?php 
        include("BasDePage.html") //Inclusion de la bannière correspondant à la bannière du bas de page
        ?>
    </body>
</html>