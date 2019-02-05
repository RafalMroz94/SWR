<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="Stylesheet" type="text/css" href="style.css">
<title>SWR - Dodaj urządzenie</title>
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
		if (trim($_POST["nazwaurzadzenia"])!='') {
			DODAJURZADZENIE($_POST["idpola"],$_POST["nazwaurzadzenia"],$_POST["typurzadzenia"]);
			header("Location: urzadzenia.php");
			exit();
		}
		else {
			?>
			<br><br><br><br>
			<div class="blad">Nie wybrałeś wszystkich parametrów urządzenia!</div><br><br>
			<div class="przycisk_wysrodkuj"><a href="dodajurzadzenie.php" class="przycisk">Powrót</a></div>
			<?php
		}
	}
	else {
		$pola=CZYTAJ("id, number","BAY","id");
		?>
		<br><br><br>
		<form method="post" action="dodajurzadzenie.php" id="dodajurzadzenie">
		<select name="idpola" form="dodajurzadzenie">
		<?php
		$i=0;
		while ($i<count($pola)) {
			?>
			<option value="<?php echo htmlspecialchars($pola[$i]["id"]); ?>">ID pola: <?php echo htmlspecialchars($pola[$i]["id"]); ?> (Pole nr: <?php echo htmlspecialchars($pola[$i]["number"]); ?>)</option>
			<?php
			$i++;
		}
		?>
		</select><br>
		<input type="text" name="nazwaurzadzenia" placeholder="Nazwa urządzenia"><br>
		<select name="typurzadzenia" form="dodajurzadzenie">
		<?php
		$j=1;
		while ($j<TYPYURZADZEN(0)+1) {
			?>
			<option value="<?php echo htmlspecialchars($j); ?>"><?php echo htmlspecialchars(TYPYURZADZEN($j)); ?></option>
			<?php
			$j++;
		}
		?>
		</select><br>
		<div class="przycisk_wysrodkuj"><input type="submit" class="przycisk" value="Akceptuj">&nbsp<a href="urzadzenia.php" class="przycisk">Anuluj</a></div><br>
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
