<?php
session_start();
$_SESSION['test']="AAA";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="test7A.php">
        Entrez votre nom : <input type="TEXT" name="nom">
        <input type="SUBMIT" value="OK">
    </form>
</body>
</html>