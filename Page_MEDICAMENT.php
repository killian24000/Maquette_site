<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/MaquetteCSS.css" rel="stylesheet">
        <link href="CSS/Banniere.CSS" ref="stylesheet">
    <title>GLPI/Médicament</title>
</head>
    <body>
        <?php
        include("HautDePage.HTML")
        ?>
            <div id="test">
                    <p>
                        <h2>PHARMACOPEE</h2> 
                    </p>
                </div>
                <div id="medicament_corps">
                    <br>
                        DEPOT LEGAL : 
                            <p>
                                <input type="text">
                            </p>
                        NOM COMMERCIAL : 
                            <p>
                                <input type="text">
                            </p>
                        FAMILLE :
                            <p>
                                <input type="text">
                            </p>
                        COMPOSANT : 
                            <p>
                                <textarea name="" id="" cols="30" rows="10" maxlength="1000"></textarea>
                            </p>
                        EFFETS :
                            <p>
                                <textarea name="" id="" cols="30" rows="10" maxlength="1000"></textarea>
                            </p>
                        CONTRE INDICATION :
                            <p>
                                <textarea name="" id="" cols="30" rows="10" maxlength="1000"></textarea>
                            </p>
                        PRIX ECHANTILLON : 
                            <p>
                                <textarea name="" id="" cols="30" rows="10" maxlength="1000"></textarea>
                            </p>                        
                </div>
            </div>
            
        </div>
        <?php
        include("BasDePage.HTML")
        ?>
    </body>
</html>