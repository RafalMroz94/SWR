<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="Stylesheet" type="text/css" href="style.css">
<title>SWR - Dodaj pole</title>
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
		if (is_numeric($_POST["numerpola"])) {
			DODAJPOLE($_POST["nazwapola"],$_POST["numerpola"],$_POST["czyaktywne"]);
			header("Location: pola.php");
			exit();
		}
		else {
			?>
			<br><br><br><br>
			<div class="blad">Nie wybrałeś wszystkich parametrów pola!</div><br><br>
			<div class="przycisk_wysrodkuj"><a href="dodajpole.php" class="przycisk">Powrót</a></div>
			<?php
		}
	}
	else {
		?>
		<form method="post" action="dodajpole.php" id="dodajpole"><br>
		<select name="nazwapola" form="dodajpole">
		<?php
		$i=1;
		while ($i<TYPYPOL(0)+1) {
			?>
			<option value="<?php echo htmlspecialchars($i); ?>"><?php echo htmlspecialchars(TYPYPOL($i)); ?></option>
			<?php
			$i++;
		}
		?>
		</select><br>
		<input type="text" name="numerpola" placeholder="Numer pola"><br>
		<select name="czyaktywne" form="dodajpole">
		<option value="1" selected>Pole aktywne</option>
		<option value="0">Pole nieaktywne</option>
		</select><br>
		<div class="przycisk_wysrodkuj"><input type="submit" class="przycisk" value="Akceptuj"><a href="pola.php" class="przycisk">Anuluj</a></div>
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
