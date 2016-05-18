<?php

function f1($result) {
	return pow($result, 2);
}

function f2($result) {
	return (1 / (1 + $result));
}

function f3($result) {
	return exp($result);
}

function f4($result) {
	return sin($result);
}

function format($result) {
	return (float) number_format($result, 5);
}

?>