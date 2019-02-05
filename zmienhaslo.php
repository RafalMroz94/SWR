<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="Stylesheet" type="text/css" href="style.css">
<title>SWR - Zmień hasło</title>
</head>
<body>

<?php
include 'res/naglowek.php';
include 'res/menu.php';
require_once('res/funkcje.php');

session_start();
if(isset($_SESSION['logowanie'])&&isset($_SESSION['oki']))
{
	if($_SERVER['REQUEST_METHOD']=='POST') {
		if (password_verify($_POST["starehaslo"],CZYTAJHASLO($_SESSION['oki'])[0]['password'])) {
			ZMIENHASLO($_SESSION["oki"],password_hash($_POST["haslouzytkownika"], PASSWORD_DEFAULT));
			header("Location: panel.php");
			exit();
		}
		else {
			?>
			<br><br><br><br>
			<div class="blad">Nieprawidłowe hasło!</div><br><br>
			<div class="przycisk_wysrodkuj"><a href="zmienhaslo.php" class="przycisk_panel">Powrót</a></div>
			<?php
		}
	}
	else {
		?>
		<form method="post" action="zmienhaslo.php" id="zmienhaslo"><br>
		<input type="password" name="starehaslo" placeholder="Stare hasło"><br>
		<input type="text" name="haslouzytkownika" placeholder="Nowe hasło"><br>
		<div class="przycisk_wysrodkuj"><input type="submit" class="przycisk" value="Akceptuj"><a href="panel.php" class="przycisk">Anuluj</a></div>
		<?php
	}
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
