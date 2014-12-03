<style type="text/css">
	td { text-align: center; }

</style>

<?php 
$text = "Una bellissima stringa 123";

//Counters
$vow = 0;
$con = 0;
$num = 0;

//Loop through characters
for ($i = 0; $i < strlen($text); $i++) {
	//Get current char, if whitespace skip iteration
	if (($char = $text[$i]) === ' ') continue;

	//If already has a match increment its value
	if (isset($repeated[$char])) $repeated[$char]++;
	//Else init	
	else $repeated[$char] = 1;

	//Numeric
	if (is_numeric($char)) $num++;
	else switch ($char) {
		//Vowel
	 	case 'a':
	 	case 'e':
	 	case 'i':
	 	case 'o':
	 	case 'u':
	 		$vow++;
	 		break;	 	
	 	//Consonant
	 	default:
	 		$con++;
	 }
}

	echo makeTable(null, array(
				makeRow("Vocali", $vow),
				makeRow("Consonanti", $con),
			 	makeRow("Numerici", $num)), 
			  null);

	echo "<br/>";

	foreach ($repeated as $char=>$times) {	
		$rows[$char] = makeRow($char, $times);
	}
	
	echo makeTable(makeRow("Lettera", "Ripetizioni"), $rows, null);

function makeRow($td1, $td2) {
	//Create Row
	$ret = "<tr>";

	//Loop trough functrion arguments
	$index = 0;
	//Stop when get_arg() evaluates to false
	while (@$r = func_get_arg($index++)) {		
		//Add each argument as td
		$ret = $ret."<td>$r</td>";
	} 

	//Return closed row
	return $ret."</tr>";
}

function makeTable($head, $rows, $foot) {
	$table = "<table border='1'>";

	if ($head !== null)
		$table .= "<thead>". $head. "</thead>";

	if (!is_array($rows)){
		$table .= $rows;
	} else foreach ($rows as $row) {
		$table .= $row;
	}
	
	if ($foot !== null)
		$table .= "<tfoot>". $foot. "</tfoot>";

	return $table. "</table>";
}

?>