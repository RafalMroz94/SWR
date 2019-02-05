<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="Stylesheet" type="text/css" href="style.css">
<title>SWR - Edytuj urządzenie</title>
</head>
<body>

<?php
include 'res/naglowek.php';
include 'res/menu.php';
require_once('res/funkcje.php');

session_start();
if (isset($_SESSION['logowanie'])&&isset($_SESSION['oki']))
{
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		if ($_POST["idpola"]!='0') AKTUALIZUJURZADZENIEIDPOLA($_SESSION["wyborurzadzenia"],$_POST["idpola"]);
		if ($_POST["typurzadzenia"]!='0') AKTUALIZUJURZADZENIETYP($_SESSION["wyborurzadzenia"],$_POST["typurzadzenia"]);
		AKTUALIZUJURZADZENIENAZWA($_SESSION["wyborurzadzenia"],$_POST["nazwaurzadzenia"]);
		unset($_SESSION["wyborurzadzenia"]);
		header("Location: urzadzenia.php");
		exit();
	}
	else {
		$urzadzenie=CZYTAJJEDNO($_SESSION["wyborurzadzenia"],"DEVICE");
		$pola=CZYTAJ("id, number","BAY","id");
		?>
		<br><br>
		<div class="tekst_bialy_srodek">ID urządzenia: <?php echo $urzadzenie[0]['id']; ?>,&nbsp
		ID pola: <?php echo $urzadzenie[0]['bay_id']; ?><br>
		Typ urządzenia: <?php echo TYPYURZADZEN($urzadzenie[0]['type']); ?>	</div><br>
		<form method="post" action="edytujurzadzenie.php" id="edycjaurzadzenia">
		<select name="idpola" form="edycjaurzadzenia">
		<option value="0" selected>Nie zmieniaj ID pola</option>
		<?php
		$i=0;
		while ($i<count($pola)) {
			?>
			<option value="<?php echo htmlspecialchars($pola[$i]["id"]); ?>"><?php echo htmlspecialchars($pola[$i]["id"]); ?> (Pole nr: <?php echo htmlspecialchars($pola[$i]["number"]); ?>)</option>
			<?php
			$i++;
		}
		?>
		</select><br>
		<input type="text" name="nazwaurzadzenia" value="<?php echo htmlspecialchars($urzadzenie[0]['name']); ?>"><br>
		<select name="typurzadzenia" form="edycjaurzadzenia">
		<option value="0" selected>Nie zmieniaj typu urządzenia</option>
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
		<div class="przycisk_wysrodkuj"><input type="submit" class="przycisk" value="Akceptuj"><a href="urzadzenia.php" class="przycisk">Anuluj</a></div>
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
