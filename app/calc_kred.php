<?php

require_once dirname(__FILE__).'/../config.php';


$kwota = $_REQUEST ['kwota'];
$lat = $_REQUEST ['lat'];
$oprocentowanie = $_REQUEST ['op'];
	
if ( ! (isset($kwota) && isset($lat) && isset($oprocentowanie))) {
	$messages [] = 'Błąd wywołania aplikacji. Brak jednego z parametrów.';
}
		
	
if ($kwota == "") {
	$messages [] = 'Nie podano kwoty kredytu.';
}
if ($lat == "") {
	$messages [] = 'Nie podano na ile lat pobiera się kredyt.';
}
if ($oprocentowanie == "") {
	$messages [] = 'Nie podano oprocentowania.';
}

	
if (empty($messages)) {
	
	if (! is_numeric($kwota)) {
		$messages [] = 'Podana kwota nie jest liczbą całkowitą.';
	}
	if (! is_numeric($lat)) {
		$messages [] = 'Podany okres, na jaki pobiera się kredyt nie jest liczbą całkowitą.';
	}
	if (! is_numeric($oprocentowanie)) {
		$messages [] = 'Podane oprocentowanie jest nieprawidłowe.';
	}
}



if (empty($messages)) {
	$kwota = intval($kwota);
	$lat = intval($lat);
	$oprocentowanie = intval($oprocentowanie);

$result = ($kwota/($lat*12)) + (($kwota/($lat*12))*($oprocentowanie/100));
$result = intval($result);

}


include 'calc_kred_view.php';
	
	
