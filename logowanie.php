<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="Stylesheet" type="text/css" href="style.css">
<title>SWR - Logowanie</title>
</head>
<body>

<?php
include 'res/naglowek.php';
include 'res/menu.php';
require_once('res/funkcje.php');

session_start();
if(!isset($_SESSION['logowanie'])) {
	if($_SERVER['REQUEST_METHOD']=='POST') {
		$logowanie=LOGIN($_POST['login'],$_POST['haslo']);
		if ($logowanie==1) {
			$_SESSION['logowanie'] = 1;
			$_SESSION['oki'] = $_POST['login'];
			header("Location: logowanie.php");
			exit();
		}
		else if ($logowanie==2) {
			$_SESSION['logowanie'] = 1;
			$_SESSION['oki'] = $_POST['login'];
			$_SESSION['administrator'] = 1;
			header("Location: logowanie.php");
			exit();
		}
		else {
			$_SESSION['logowanie'] = 1;
			header("Location: logowanie.php");
			exit();
		}
	}
	else {
		?>
		<br><br><br>
		<form method="post" action="logowanie.php">
		<input type="text" name="login" placeholder="Nazwa użytkownika"><br>
		<input type="password" name="haslo" placeholder="Hasło"><br>
		<div class="przycisk_wysrodkuj"><input type="submit" class="przycisk" value="Zaloguj"></div>
		<?php
	}
}
else header('Location: panel.php');

include 'res/stopka.php';
?>

</body>
</html>
