<?php

define('MARGE', 2);

function displayTable($data) {
	printTable($data, getTableLength($data));
}

function getTableLength($data) {
	$nbRow = $rowLength = 0;
	$nbCol = (count($data) + 1);
	$colLength = [];
	foreach ($data as $cKey => $cValue) {
		$nbRow = ($nbRow < (count($cValue) + 1) ? (count($cValue) + 1) : $nbRow);
		$colLength[0] = 0;
		$colLength[$cKey] = strlen($cKey) + MARGE;
		foreach ($cValue as $rKey => $rValue) {
			$colLength[0] = ($colLength[0] < (strlen($rKey) + MARGE) ? (strlen($rKey) + MARGE) : $colLength[0]);
			$colLength[$cKey] = ($colLength[$cKey] < (strlen($rValue) + MARGE) ? (strlen($rValue) + MARGE) : $colLength[$cKey]);
		}
	}
	foreach ($colLength as $key => $value)
		$rowLength += $value;
	return [
		'nbCol' => $nbCol,
		'nbRow' => $nbRow,
		'colLength' => $colLength,
		'rowLength' => ($rowLength + $nbCol + 1)
	];
}

function printTable($data, $tableLength) {
	printHeader($data, $tableLength);
	foreach ($data as $cKey => $cValue) {
		foreach ($cValue as $rKey => $rValue)
			printRow($data, $tableLength, $rKey);
		break;
	}
}

function printHeader($data, $tableLength) {
	echo str_pad('', $tableLength['rowLength'], '-', STR_PAD_BOTH) . PHP_EOL;
	echo '|' . str_pad('f(x)', $tableLength['colLength'][0], ' ', STR_PAD_BOTH) . '|';
	foreach ($data as $cKey => $cValue)
		echo str_pad($cKey, $tableLength['colLength'][$cKey], ' ', STR_PAD_BOTH) . '|';
	echo PHP_EOL . str_pad('', $tableLength['rowLength'], '-', STR_PAD_BOTH) . PHP_EOL;
}

function printRow($data, $tableLength, $key) {
	$firstColSet = false;
	foreach ($data as $cKey => $cValue) {
		foreach ($cValue as $rKey => $rValue) {
			if ($rKey == $key) {
				if (!$firstColSet) {
					echo '|' . str_pad($rKey, $tableLength['colLength'][0], ' ', STR_PAD_BOTH) . '|';
					$firstColSet = true;
				}
				echo str_pad($rValue, $tableLength['colLength'][$cKey], ' ', STR_PAD_BOTH) . '|';
			}
		}
	}
	echo PHP_EOL . str_pad('', $tableLength['rowLength'], '-', STR_PAD_BOTH) . PHP_EOL;
}

?>