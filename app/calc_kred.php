<?php

require_once dirname(__FILE__).'/../config.php';

// 1. pobranie parametrów

$kwota = $_REQUEST ['kwota'];
$lat = $_REQUEST ['lat'];
$oprocentowanie = $_REQUEST ['op'];

// 2. walidacja = sprawdzenie parametrów

	// czy parametry zostały przekazane - sytuacja, gdy kontroler zostanie wywołany bezpośrednio, nie z folrmularza
	
if ( ! (isset($kwota) && isset($lat) && isset($oprocentowanie))) {
	$messages [] = 'Błąd wywołania aplikacji. Brak jednego z parametrów.';
}
		
	// sprawdzenie czy poszczególne parametry zostały przekazane
	
if ($kwota == "") {
	$messages [] = 'Nie podano kwoty kredytu.';
}
if ($lat == "") {
	$messages [] = 'Nie podano na ile lat pobiera się kredyt.';
}
if ($oprocentowanie == "") {
	$messages [] = 'Nie podano oprocentowania.';
}

	
	// gdy nie ma parametrów to nie ma sensu sprawdzać dalej
if (empty($messages)) {
	// sprawdzenie, czy wszystkie podane dane są liczbami:
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


// 3. Wykonanie działania

if (empty($messages)) {
	$kwota = intval($kwota);
	$lat = intval($lat);
	$oprocentowanie = intval($oprocentowanie);

$result = ($kwota/($lat*12)) + (($kwota/($lat*12))*($oprocentowanie/100));
$result = intval($result);

}

//if (isset($lat) && isset($oprocentowanie)) {

//}

include 'calc_kred_view.php';
	
	