<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
</head>
<body>
<br />
<form action="<?php print(_APP_URL);?>/app/calc_kred.php" method="get">
	<label for="id_kwota">Kwota kredytu: </label>
	<input id="id_kwota" type="number" name="kwota" value="<?php if (isset($kwota)) print($kwota);?>" />
	zł
	<p />
	<label for="id_lat">Kredyt na </label>
	<input id="id_lat" type="number" name="lat" value="<?php if (isset($lat)) print($lat);?>" />
	lat
	<p />
	<label for="id_op">Oprocentowanie: </label>
	<input id="id_op" type="number" name="op" value="<?php if (isset($oprocentowanie)) print($oprocentowanie);?>" />
	%
	<p />
	<input type="submit" value="Wylicz" />
</form>

<?php
	//wyświetlanie listy błędów, jeśli istnieją:
if (isset($messages)) {
	echo '<ol style="margin: 40px; border-radius: 15px; padding: 20 px; background-color: #F00; color: white; width: 400px;">';
	foreach ($messages as $msg) {
		echo '<li>'.$msg.'</li>';
	}
	echo '</ol>';
}
?>

<br />
<?php if (isset($result) && empty($messages)) { ?>
<div style="margine: 80px; border-radius: 15px; padding: 10px; background-color: #FF6; width: 400px;">
<?php echo 'Miesięczna rata kredytu wynosi: '.$result.' zł.'; ?>
</div>
<?php } ?>

</body>
</html>