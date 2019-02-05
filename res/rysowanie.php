<?php

require_once("res/funkcje.php");

$pola=CZYTAJ("*","BAY","number");
$urzadzenia=CZYTAJ("*","DEVICE","id");

// OBLICZANIE WYSOKOSCI OBRAZKA
$w=array();
for ($i=0; $i<count($pola); $i++) {
	$h=0;
	for ($j=0; $j<count($urzadzenia); $j++) {
		if ($urzadzenia[$j]['bay_id']==$i+1) $h++;
	}
	$w[$i]=$h;
}
$WYSOKOSC=max($w);


$img = imagecreatetruecolor(count($pola)*160+10, $WYSOKOSC*60+190);
$tlo = imagecolorallocate($img, 0, 0, 0);
$tekst = imagecolorallocate($img, 255, 255, 255);
$ramki = imagecolorallocate($img, 0, 150, 0);

imagefill($img, 0, 0, $tlo);

for ($i=0; $i<count($pola); $i++) {
	imagerectangle($img, ($i*160)+10, 10, ($i*160)+160, $WYSOKOSC*60+180, $ramki);
	imagestring($img, 4, ($i*160)+15, 15, 'ID: '.$pola[$i]['id'], $tekst);
	imagefilledellipse($img, ($i*160)+85, 60, 50, 50, imagecolorallocate($img, CZYAKTYWNE(!$pola[$i]['is_active']), CZYAKTYWNE($pola[$i]['is_active']), 0));
	imagestring($img, 5, ($i*160)+45, 100, 'POLE NR '.$pola[$i]['number'], $tekst);
	imagestring($img, 4, ($i*160)+25, 130, strtoupper(TYPYPOL($pola[$i]['name'])), $tekst);

	$h=0;
	for ($j=0; $j<count($urzadzenia); $j++) {
		if ($urzadzenia[$j]['bay_id']==$pola[$i]['id']) {
			imagerectangle($img, ($i*160)+20, ($h*60)+180, ($i*160)+150, ($h*60)+230, $ramki);
			imagestring($img, 3, ($i*160)+25, ($h*60)+185, 'ID: '.$urzadzenia[$j]['id'], $tekst);
			imagerectangle($img, ($i*160)+115, ($h*60)+185, ($i*160)+145, ($h*60)+205, $ramki);
			imagestring($img, 3, ($i*160)+119, ($h*60)+189, OZNACZENIAURZADZEN($urzadzenia[$j]['type']), $tekst);
			imagestring($img, 1, ($i*160)+25, ($h*60)+215, $urzadzenia[$j]['name'], $tekst);
			$h++;
		}
	}
}

imagepng($img,'rozdzielnia.png');
imagedestroy($img);
unset($pola);
unset($urzadzenia);

?>
