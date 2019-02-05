<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="Stylesheet" type="text/css" href="style.css">
<title>SWR - Pola stacji</title>
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
		if ((isset($_POST["wyborpola"]))&&(isset($_POST["edytujpole"]))) {
			$_SESSION["wyborpola"]=$_POST["wyborpola"];
			header("Location: edytujpole.php");
			exit();
		}
		else if ((isset($_POST["wyborpola"]))&&(isset($_POST["usunpole"]))) {
			USUN(($_POST["wyborpola"]),"BAY");
			header("Location: pola.php");
			exit();
		}
		else {
			?>
			<br><br><br><br>
			<div class="blad">Nie wybrałeś pola!</div><br><br>
			<div class="przycisk_wysrodkuj"><a href="pola.php" class="przycisk_panel">Powrót</a></div>
			<?php
		}
	}
	else {
		$pola=CZYTAJ("*","BAY","number");
		?>
		<br><br>
		<table>
		<tr>
		<th>ID POLA</th>
		<th>NAZWA POLA</th>
		<th>NUMER POLA</th>
		<th>CZY AKTYWNE</th>
		<th></th>
		</tr>
		<form method="post" action="pola.php">
		<?php
		$i=0;
		while ($i<count($pola)) {
			$pole=$pola[$i];
			echo '<tr>';
			echo '<td>';
			echo $pole['id'];
			echo '</td>';
			echo '<td>';
			echo TYPYPOL($pole['name']);
			echo '</td>';
			echo '<td>';
			echo $pole['number'];
			echo '</td>';
			echo '<td>';
			echo KONWERSJA($pole['is_active']);
			echo '</td>';
			?>
			<td><input type="radio" name="wyborpola" value="<?php echo htmlspecialchars($pole['id']); ?>"></td>
			<?php
			echo '</tr>';
			$i++;
			}
			?>
		</table>
		<br>
		<div class="przycisk_wysrodkuj"><a href="dodajpole.php" class="przycisk">Dodaj pole</a>
		<input type="submit" name="edytujpole" class="przycisk" value="Edytuj pole">
		<input type="submit" name="usunpole" class="przycisk" value="Usuń pole">
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
