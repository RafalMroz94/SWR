<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="Stylesheet" type="text/css" href="style.css">
<title>SWR - Edytuj użytkownika</title>
</head>
<body>

<?php
include 'res/naglowek.php';
include 'res/menu.php';
require_once('res/funkcje.php');

session_start();
if (isset($_SESSION['logowanie'])&&isset($_SESSION['oki'])&&isset($_SESSION['administrator']))
{
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		if (trim($_POST["haslouzytkownika"])!='') AKTUALIZUJUZYTKOWNIKAHASLO($_SESSION["wyboruzytkownika"],password_hash($_POST["haslouzytkownika"], PASSWORD_DEFAULT));
		if (($_POST["czyadministrator"]==0)||($_POST["czyadministrator"]==1)) AKTUALIZUJUZYTKOWNIKAFLAGE($_SESSION["wyboruzytkownika"],$_POST["czyadministrator"]);
		AKTUALIZUJUZYTKOWNIKANAZWE($_SESSION["wyboruzytkownika"],$_POST["nazwauzytkownika"]);
		unset($_SESSION["wyboruzytkownika"]);
		header("Location: uzytkownicy.php");
		exit();
	}
	else {
		$uzytkownik=CZYTAJJEDNO($_SESSION["wyboruzytkownika"],"USER");
		?>
		<br><br>
		<div class="tekst_bialy_srodek">ID użytkownika: <?php echo $uzytkownik[0]['id']; ?><br>
		Administrator: <?php echo KONWERSJA($uzytkownik[0]['admin_flag']); ?></div><br>
		<form method="post" action="edytujuzytkownika.php" id="edycjauzytkownika"><br>
		<input type="text" name="nazwauzytkownika" value="<?php echo htmlspecialchars($uzytkownik[0]['username']); ?>"><br>
		<select name="czyadministrator" form="edycjauzytkownika">
		<option value="2" selected>Nie zmieniaj uprawnień</option>
		<option value="1">Administrator</option>
		<option value="0">Użytkownik</option>
		</select><br>
		<input type="text" name="haslouzytkownika" placeholder="Nowe hasło (bez zmian - pozostaw puste)"><br>
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
