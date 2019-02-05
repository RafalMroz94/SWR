<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="Stylesheet" type="text/css" href="style.css">
<title>SWR - Panel użytkownika</title>
</head>
<body>

<?php
include 'res/naglowek.php';
include 'res/menu.php';
require_once('res/funkcje.php');

session_start();
if(isset($_SESSION['logowanie'])&&isset($_SESSION['oki'])&&isset($_SESSION['administrator']))
{
	?>
	<br><br>
	<div class="tekst_bialy_srodek">Zalogowany jako administrator: <?php echo $_SESSION['oki']; ?></div>
	<br><br>
	<div class="przycisk_wysrodkuj"><a href="pola.php" class="przycisk_panel">Zarządzaj polami stacji</a></div>
	<div class="przycisk_wysrodkuj"><a href="urzadzenia.php" class="przycisk_panel">Zarządzaj urządzeniami stacji</a></div>
	<div class="przycisk_wysrodkuj"><a href="uzytkownicy.php" class="przycisk_panel">Zarządzaj użytkownikami</a></div>
	<div class="przycisk_wysrodkuj"><a href="zmienhaslo.php" class="przycisk_panel">Zmień hasło</a></div>
	<div class="przycisk_wysrodkuj"><a href="wyloguj.php" class="przycisk_panel">Wyloguj</a></div>
	<?php
}
else if(isset($_SESSION['logowanie'])&&isset($_SESSION['oki']))
{
	?>
	<br><br>
	<div class="tekst_bialy_srodek">Zalogowany jako użytkownik: <?php echo $_SESSION['oki']; ?></div>
	<br><br>
	<div class="przycisk_wysrodkuj"><a href="pola.php" class="przycisk_panel">Zarządzaj polami stacji</a></div>
	<div class="przycisk_wysrodkuj"><a href="urzadzenia.php" class="przycisk_panel">Zarządzaj urządzeniami stacji</a></div>
	<div class="przycisk_wysrodkuj"><a href="zmienhaslo.php" class="przycisk_panel">Zmień hasło</a></div>
	<div class="przycisk_wysrodkuj"><a href="wyloguj.php" class="przycisk_panel">Wyloguj</a></div>
	<?php
}
else if(isset($_SESSION['logowanie']))
{
	session_unset();
	session_destroy();
	?>
	<br><br><br><br>
	<div class="blad">Nazwa użytkownika lub hasło nieprawidłowe!</div><br><br>
	<div class="przycisk_wysrodkuj"><a href="logowanie.php" class="przycisk_panel">Spróbuj ponownie</a></div>
	<?php
}
else
{
	?>
	<br><br><br><br>
	<div class="blad">Nie jesteś zalogowany!</div><br><br>
	<div class="przycisk_wysrodkuj"><a href="logowanie.php" class="przycisk_panel">Zaloguj się</a></div>
	<?php
}

include 'res/stopka.php';
?>

</body>
</html>
