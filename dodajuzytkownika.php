<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="Stylesheet" type="text/css" href="style.css">
<title>SWR - Dodaj użytkownika</title>
</head>
<body>

<?php
include 'res/naglowek.php';
include 'res/menu.php';
require_once('res/funkcje.php');

session_start();
if(isset($_SESSION['logowanie'])&&isset($_SESSION['oki'])&&isset($_SESSION['administrator']))
{
	if($_SERVER['REQUEST_METHOD']=='POST') {
		DODAJUZYTKOWNIKA($_POST["nazwauzytkownika"],password_hash($_POST["haslouzytkownika"], PASSWORD_DEFAULT),$_POST["czyadministrator"]);
		header("Location: uzytkownicy.php");
		exit();
	}
	else {
		?>
		<form method="post" action="dodajuzytkownika.php" id="dodajuzytkownika"><br>
		<input type="text" name="nazwauzytkownika" placeholder="Nazwa użytkownika"><br>
		<input type="text" name="haslouzytkownika" placeholder="Hasło"><br>
		<select name="czyadministrator" form="dodajuzytkownika">
		<option value="1">Konto administratora</option>
		<option value="0" selected>Konto użytkownika</option>
		</select><br>
		<div class="przycisk_wysrodkuj"><input type="submit" class="przycisk" value="Akceptuj"><a href="uzytkownicy.php" class="przycisk">Anuluj</a></div>
		<?php
	}
}
else if(isset($_SESSION['logowanie'])&&isset($_SESSION['oki'])&&!isset($_SESSION['administrator']))
{
	?>
	<br><br><br><br>
	<div class="blad">Nie masz uprawnień!</div><br><br>
	<div class="przycisk_wysrodkuj"><a href="logowanie.php" class="przycisk_panel">Panel użytkownika</a></div>
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
