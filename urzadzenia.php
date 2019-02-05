<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="Stylesheet" type="text/css" href="style.css">
<title>SWR - Urządzenia stacji</title>
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
		if ((isset($_POST["wyborurzadzenia"]))&&(isset($_POST["edytujurzadzenie"]))) {
			$_SESSION["wyborurzadzenia"]=$_POST["wyborurzadzenia"];
			header("Location: edytujurzadzenie.php");
			exit();
		}
		else if ((isset($_POST["wyborurzadzenia"]))&&(isset($_POST["usunurzadzenie"]))) {
			USUN(($_POST["wyborurzadzenia"]),"DEVICE");
			header("Location: urzadzenia.php");
			exit();
		}
		else {
			?>
			<br><br><br><br>
			<div class="blad">Nie wybrałeś urządzenia!</div><br><br>
			<div class="przycisk_wysrodkuj"><a href="urzadzenia.php" class="przycisk_panel">Powrót</a></div>
			<?php
		}
	}
	else {
		$urzadzenia=CZYTAJ("*","DEVICE","bay_id");
		?>
		<br><br>
		<table>
		<tr>
		<th>ID URZĄDZENIA</th>
		<th>ID POLA</th>
		<th>NAZWA URZĄDZENIA</th>
		<th>TYP URZĄDZENIA</th>
		<th></th>
		</tr>
		<form method="post" action="urzadzenia.php">
		<?php
		$i=0;
		while ($i<count($urzadzenia)) {
			$urzadzenie=$urzadzenia[$i];
			echo '<tr>';
			echo '<td>';
			echo $urzadzenie['id'];
			echo '</td>';
			echo '<td>';
			echo $urzadzenie['bay_id'];
			echo '</td>';
			echo '<td>';
			echo $urzadzenie['name'];
			echo '</td>';
			echo '<td>';
			echo TYPYURZADZEN($urzadzenie['type']);
			echo '</td>';
			?>
			<td><input type="radio" name="wyborurzadzenia" value="<?php echo htmlspecialchars($urzadzenie['id']); ?>"></td>
			<?php
			echo '</tr>';
			$i++;
			}
			?>
		</table>
		<br>
		<div class="przycisk_wysrodkuj"><a href="dodajurzadzenie.php" class="przycisk">Dodaj urządzenie</a>
		<input type="submit" name="edytujurzadzenie" class="przycisk" value="Edytuj urządzenie">
		<input type="submit" name="usunurzadzenie" class="przycisk" value="Usuń urządzenie">
		<br><br><br>
		<a href="panel.php" class="przycisk">Powrót</a></div><br>
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
