<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="Stylesheet" type="text/css" href="style.css">
<title>SWR - Strona główna</title>
</head>
<body>

<?php
date_default_timezone_set('Europe/Warsaw');
include 'res/naglowek.php';
?>

<div id="MENU">
<a href="logowanie.php" class="przycisk_duzy">PANEL UŻYTKOWNIKA</a>
</div>

<?php include 'res/rysowanie.php'; ?>

<div><img src="rozdzielnia.png?=<?php echo htmlspecialchars(Date('U')); ?>"></div><br>

<?php include 'res/stopka.php'; ?>

</body>
</html>
