<?php

include 'functions.php';
include 'display.php';

function recLeft($a, $b, $n, $func) {
	$sum = 0;
	$h = (($b - $a) / $n);
	for ($i = 0; $i < $n; $i++)
		$sum += ($h * $func(xi($a, $h, $i)));
	return ($sum);
}

function recRight($a, $b, $n, $func) {
	$sum = 0;
	$h = (($b - $a) / $n);
	for ($i = 1; $i <= $n; $i++)
		$sum += ($h * $func(xi($a, $h, $i)));
	return ($sum);
}

function recMiddle($a, $b, $n, $func) {
	$sum = 0;
	$h = (($b - $a) / $n);
	for ($i = 0; $i < $n; $i++)
		$sum += ($h * $func((xi($a, $h, $i) + ($h / 2))));
	return ($sum);
}

function xi($a, $h, $i) {
	return ($a + ($i * $h));
}

function getData($a, $b, $n) {
	$data = [];
	$functions = ['f1', 'f2', 'f3', 'f4'];
	if (isset($a) && isset($b) && isset($n)) {
		$data['f1']['primitive'] = 2.33333;
		$data['f2']['primitive'] = 0.40546;
		$data['f3']['primitive'] = 4.67077;
		$data['f4']['primitive'] = 0.95644;
		foreach ($functions as $func) {
			$data[$func]['rectangle gauche'] = format(recLeft($a, $b, $n, $func));
			$data[$func]['rectangle droite'] = format(recRight($a, $b, $n, $func));
			$data[$func]['rectangle milieu'] = format(recMiddle($a, $b, $n, $func));
		}
		return $data;
	} else {
		return 'error';
	}
}

displayTable(getData(1, 2, 20));

?>