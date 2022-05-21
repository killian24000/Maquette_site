<?php
session_start();
echo($_SESSION['test']);
$_SESSION['nom'] = $_POST['nom'];
?>
<html>
<body>
Bienvenue sur ce site
<b>
<?php
echo $_SESSION['nom'];
?>
</b>.<br />
Regardons ce qui se passe sur la <a href="page3.php">page</a> suivante.<br />
</body>
</html>