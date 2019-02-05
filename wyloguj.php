<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="Stylesheet" type="text/css" href="style.css">
<title>SWR - Wylogowano</title>
</head>
<body>

<?php
include 'res/naglowek.php';
include 'res/menu.php';
?>

<br><br>
<div class="tekst_bialy_srodek">Wylogowano pomyślnie!</div>

<?php
session_start();
session_unset();
session_destroy();
?>

<br><br>
<div class="przycisk_wysrodkuj"><a href="logowanie.php" class="przycisk">Zaloguj ponownie</a></div>

<?php include 'res/stopka.php'; ?>

</body>
</html>
