<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="Stylesheet" type="text/css" href="style.css">
<title>SWR - Użytkownicy</title>
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
		if ((isset($_POST["wyboruzytkownika"]))&&(isset($_POST["edytujuzytkownika"]))) {
			$_SESSION["wyboruzytkownika"]=$_POST["wyboruzytkownika"];
			header("Location: edytujuzytkownika.php");
			exit();
		}
		else if ((isset($_POST["wyboruzytkownika"]))&&(isset($_POST["usunuzytkownika"]))) {
			USUN(($_POST["wyboruzytkownika"]),"USER");
			header("Location: uzytkownicy.php");
			exit();
		}
		else {
			?>
			<br><br><br><br>
			<div class="blad">Nie wybrałeś użytkownika!</div><br><br>
			<div class="przycisk_wysrodkuj"><a href="uzytkownicy.php" class="przycisk_panel">Powrót</a></div>
			<?php
		}
	}
	else {
		$uzytkownicy=CZYTAJ("*","USER","id");
		?>
		<br><br>
		<table>
		<tr>
		<th>ID UŻYTKOWNIKA</th>
		<th>NAZWA UŻYTKOWNIKA</th>
		<th>CZY ADMINISTRATOR</th>
		<th></th>
		</tr>
		<form method="post" action="uzytkownicy.php">
		<?php
		$i=0;
		while ($i<count($uzytkownicy)) {
			$uzytkownik=$uzytkownicy[$i];
			echo '<tr>';
			echo '<td>';
			echo $uzytkownik['id'];
			echo '</td>';
			echo '<td>';
			echo $uzytkownik['username'];
			echo '</td>';
			echo '<td>';
			echo KONWERSJA($uzytkownik['admin_flag']);
			echo '</td>';
			?>
			<td><input type="radio" name="wyboruzytkownika" value="<?php echo htmlspecialchars($uzytkownik['id']); ?>"></td>
			<?php
			echo '</tr>';
			$i++;
			}
			?>
		</table>
		<br>
		<div class="przycisk_wysrodkuj"><a href="dodajuzytkownika.php" class="przycisk">Dodaj użytkownika</a>
		<input type="submit" name="edytujuzytkownika" class="przycisk" value="Edytuj użytkownika">
		<input type="submit" name="usunuzytkownika" class="przycisk" value="Usuń użytkownika">
		<br><br><br>
		<a href="panel.php" class="przycisk">Powrót</a></div><br>
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
