<?php

//OBSŁUGA SQLITE

function CZYTAJ($kolumna,$tabela,$sortowanie)
{
	$conn=new PDO("sqlite:res/baza.db");
	$sql="SELECT $kolumna FROM $tabela ORDER BY $sortowanie ASC";
	$st=$conn->prepare($sql);
	$st->execute();
	$wyniki = array();
	while($row=$st->fetch(PDO::FETCH_ASSOC))
	{
		array_push($wyniki, $row);
	}
	return $wyniki;
}

function CZYTAJJEDNO($id,$tabela)
{
	$conn=new PDO("sqlite:res/baza.db");
	$sql="SELECT * FROM $tabela WHERE id=:id";
	$st=$conn->prepare($sql);
	$st->bindValue(':id', $id, PDO::PARAM_INT);
	$st->execute();
	$wyniki = array();
	while($row=$st->fetch(PDO::FETCH_ASSOC))
	{
		array_push($wyniki, $row);
	}
	return $wyniki;
}

function CZYTAJHASLO($username)
{
	$conn=new PDO("sqlite:res/baza.db");
	$sql="SELECT password FROM USER WHERE username=:username";
	$st=$conn->prepare($sql);
	$st->bindValue(':username', $username, PDO::PARAM_STR);
	$st->execute();
	$wyniki = array();
	while($row=$st->fetch(PDO::FETCH_ASSOC))
	{
		array_push($wyniki, $row);
	}
	return $wyniki;
}

function USUN($id,$tabela)
{
	$conn=new PDO("sqlite:res/baza.db");
	$sql="DELETE FROM $tabela WHERE id=:id";
	$st=$conn->prepare($sql);
	$st->bindValue(':id', $id, PDO::PARAM_INT);
	$st->execute();
}

function DODAJPOLE($name,$number,$is_active)
{
	$conn=new PDO("sqlite:res/baza.db");
	$sql="INSERT INTO BAY (name, number, is_active) VALUES (:name, :number, :is_active)";
	$st=$conn->prepare($sql);
	$st->bindValue(':name', $name, PDO::PARAM_INT);
	$st->bindValue(':number', $number, PDO::PARAM_STR);
	$st->bindValue(':is_active', $is_active, PDO::PARAM_INT);
	$st->execute();
}

function DODAJURZADZENIE($bay_id,$name,$type)
{
	$conn=new PDO("sqlite:res/baza.db");
	$sql="INSERT INTO DEVICE (bay_id, name, type) VALUES (:bay_id, :name, :type)";
	$st=$conn->prepare($sql);
	$st->bindValue(':bay_id', $bay_id, PDO::PARAM_INT);
	$st->bindValue(':name', $name, PDO::PARAM_STR);
	$st->bindValue(':type', $type, PDO::PARAM_STR);
	$st->execute();
}

function DODAJUZYTKOWNIKA($username,$password,$admin_flag)
{
	$conn=new PDO("sqlite:res/baza.db");
	$sql="INSERT INTO USER (username, password, admin_flag) VALUES (:username, :password, :admin_flag)";
	$st=$conn->prepare($sql);
	$st->bindValue(':username', $username, PDO::PARAM_STR);
	$st->bindValue(':password', $password, PDO::PARAM_STR);
	$st->bindValue(':admin_flag', $admin_flag, PDO::PARAM_INT);
	$st->execute();
}

function AKTUALIZUJPOLENAZWA($id,$name)
{
	$conn=new PDO("sqlite:res/baza.db");
	$sql="UPDATE BAY SET name=:name WHERE id=:id";
	$st=$conn->prepare($sql);
	$st->bindValue(':id', $id, PDO::PARAM_INT);
	$st->bindValue(':name', $name, PDO::PARAM_INT);
	$st->execute();
}

function AKTUALIZUJPOLENUMER($id,$number)
{
	$conn=new PDO("sqlite:res/baza.db");
	$sql="UPDATE BAY SET number=:number WHERE id=:id";
	$st=$conn->prepare($sql);
	$st->bindValue(':id', $id, PDO::PARAM_INT);
	$st->bindValue(':number', $number, PDO::PARAM_INT);
	$st->execute();
}

function AKTUALIZUJPOLECZYAKTYWNE($id,$is_active)
{
	$conn=new PDO("sqlite:res/baza.db");
	$sql="UPDATE BAY SET is_active=:is_active WHERE id=:id";
	$st=$conn->prepare($sql);
	$st->bindValue(':id', $id, PDO::PARAM_INT);
	$st->bindValue(':is_active', $is_active, PDO::PARAM_INT);
	$st->execute();
}

function AKTUALIZUJURZADZENIEIDPOLA($id,$bay_id)
{
	$conn=new PDO("sqlite:res/baza.db");
	$sql="UPDATE DEVICE SET bay_id=:bay_id WHERE id=:id";
	$st=$conn->prepare($sql);
	$st->bindValue(':id', $id, PDO::PARAM_INT);
	$st->bindValue(':bay_id', $bay_id, PDO::PARAM_INT);
	$st->execute();
}

function AKTUALIZUJURZADZENIETYP($id,$type)
{
	$conn=new PDO("sqlite:res/baza.db");
	$sql="UPDATE DEVICE SET type=:type WHERE id=:id";
	$st=$conn->prepare($sql);
	$st->bindValue(':id', $id, PDO::PARAM_INT);
	$st->bindValue(':type', $type, PDO::PARAM_STR);
	$st->execute();
}

function AKTUALIZUJURZADZENIENAZWA($id,$name)
{
	$conn=new PDO("sqlite:res/baza.db");
	$sql="UPDATE DEVICE SET name=:name WHERE id=:id";
	$st=$conn->prepare($sql);
	$st->bindValue(':id', $id, PDO::PARAM_INT);
	$st->bindValue(':name', $name, PDO::PARAM_STR);
	$st->execute();
}

function AKTUALIZUJUZYTKOWNIKAHASLO($id,$password)
{
	$conn=new PDO("sqlite:res/baza.db");
	$sql="UPDATE USER SET password=:password WHERE id=:id";
	$st=$conn->prepare($sql);
	$st->bindValue(':id', $id, PDO::PARAM_INT);
	$st->bindValue(':password', $password, PDO::PARAM_STR);
	$st->execute();
}

function AKTUALIZUJUZYTKOWNIKAFLAGE($id,$admin_flag)
{
	$conn=new PDO("sqlite:res/baza.db");
	$sql="UPDATE USER SET admin_flag=:admin_flag WHERE id=:id";
	$st=$conn->prepare($sql);
	$st->bindValue(':id', $id, PDO::PARAM_INT);
	$st->bindValue(':admin_flag', $admin_flag, PDO::PARAM_INT);
	$st->execute();
}

function AKTUALIZUJUZYTKOWNIKANAZWE($id,$username)
{
	$conn=new PDO("sqlite:res/baza.db");
	$sql="UPDATE USER SET username=:username WHERE id=:id";
	$st=$conn->prepare($sql);
	$st->bindValue(':id', $id, PDO::PARAM_INT);
	$st->bindValue(':username', $username, PDO::PARAM_STR);
	$st->execute();
}

function LOGIN($username, $password){
	$conn=new PDO("sqlite:res/baza.db");
	$sql="SELECT username,password,admin_flag FROM USER WHERE username = :username";
	$st=$conn->prepare($sql);
	$st->bindValue(':username', $username);
	$st->execute();
	$wyniki = array();
	while($row=$st->fetch(PDO::FETCH_ASSOC))
	{
		array_push($wyniki, $row);
	}
	if (password_verify($password,$wyniki[0]["password"])&&(!$wyniki[0]["admin_flag"])) return "1";
	else if (password_verify($password,$wyniki[0]["password"])&&($wyniki[0]["admin_flag"])) return "2";
	else return "0";
}

function ZMIENHASLO($username,$password)
{
	$conn=new PDO("sqlite:res/baza.db");
	$sql="UPDATE USER SET password=:password WHERE username=:username";
	$st=$conn->prepare($sql);
	$st->bindValue(':username', $username, PDO::PARAM_STR);
	$st->bindValue(':password', $password, PDO::PARAM_STR);
	$st->execute();
}

function KONWERSJA($kod) {
	switch($kod) {
		case 0:
		return "NIE";
		case 1:
		return "TAK";
		default:
		return "BŁĘDNE DANE!";
	}
}

function TYPYURZADZEN($kod) {
	$ilosctypow=8;
	switch($kod) {
		case 0:
		return $ilosctypow;
		case 1:
		return "Zabezpieczenie odległościowe";
		case 2:
		return "Zabezpieczenie różnicowe";
		case 3:
		return "Zabezpieczenie ziemnozwarciowe";
		case 4:
		return "Zabezpieczenie nadprądowe";
		case 5:
		return "Zabezpieczenie nadnapięciowe";
		case 6:
		return "Zabezpieczenie podnapięciowe";
		case 7:
		return "Urządzenie do SPZ";
		case 8:
		return "Urządzenie do SCO";
		default:
		return "BŁĄD!";
	}
}

function TYPYPOL($kod) {
	$ilosctypow=5;
	switch($kod) {
		case 0:
		return $ilosctypow;
		case 1:
		return "Liniowe";
		case 2:
		return "Transformatorowe";
		case 3:
		return "Rezerwowe";
		case 4:
		return "Lacznika szyn";
		case 5:
		return "Pomiarowe";
		default:
		return "BŁĄD!";
	}
}

function OZNACZENIAURZADZEN($kod) {
	switch($kod) {
		case 1:
		return "Z<";
		case 2:
		return "dI";
		case 3:
		return "I0>";
		case 4:
		return "I>";
		case 5:
		return "U>";
		case 6:
		return "U<";
		case 7:
		return "SPZ";
		case 8:
		return "SCO";
		default:
		return "ERR";
	}
}

function CZYAKTYWNE($kod) {
	switch($kod) {
		case 0:
		return 0;
		case 1:
		return 255;
	}
}

?>
