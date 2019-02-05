<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="Stylesheet" type="text/css" href="style.css">
<title>SWR - Edytuj pole</title>
</head>
<body>

<?php
include 'res/naglowek.php';
include 'res/menu.php';
require_once('res/funkcje.php');

session_start();
if(isset($_SESSION['logowanie'])&&isset($_SESSION['oki']))
{

	if ($_SERVER['REQUEST_METHOD']=='POST') {
		if ($_POST["nazwapola"]!='0') AKTUALIZUJPOLENAZWA($_SESSION["wyborpola"],$_POST["nazwapola"]);
		if (is_numeric($_POST["numerpola"])) AKTUALIZUJPOLENUMER($_SESSION["wyborpola"],$_POST["numerpola"]);
		else {
			echo 'Złe id pola!';
			echo '<br><br>';
			echo '<a href="dodajpole.php" class="przycisk">Cofnij</a>';
		}
		if ($_POST["czyaktywne"]!='2') AKTUALIZUJPOLECZYAKTYWNE($_SESSION["wyborpola"],$_POST["czyaktywne"]);
		unset($_SESSION["wyborurzadzenia"]);
		header("Location: pola.php");
		exit();
	}
	else {
		$pole=CZYTAJJEDNO($_SESSION["wyborpola"],"BAY");
		?>
		<br><br>
		<div class="tekst_bialy_srodek">ID pola: <?php echo $pole[0]['id']; ?>,&nbsp
		Czy aktywne: <?php echo KONWERSJA($pole[0]['is_active']); ?><br>
		Nazwa pola: <?php echo TYPYPOL($pole[0]['name']); ?></div><br>
		<form method="post" action="edytujpole.php" id="edycjapola">
		<select name="nazwapola" form="edycjapola">
		<option value="0" selected>Nie zmieniaj nazwy pola</option>
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
		<input type="text" name="numerpola" value="<?php echo htmlspecialchars($pole[0]['number']); ?>"><br>
		<select name="czyaktywne" form="edycjapola">
		<option value="2" selected>Nie zmieniaj stanu pola</option>
		<option value="1">TAK</option>
		<option value="0">NIE</option>
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
