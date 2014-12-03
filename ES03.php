<?php
	@computeFac($_POST['fac']);	
	@computeTab($_POST['tab']);
	@computePri($_POST['pri']);

	function checkNum($num) {
		return $num !== null && is_numeric($num);
	}

	function computeFac($num) {				
		if (!checkNum($num)) return;

		if ($num < 0 || $num > 15){
			echo "AVVISO IL NUMERO DEVE ESSERE MAGGIORE DI 0 E MINORE DI 15";
			return;
		}		
		
		$val = fact($num);
		echo "<h1>Fact $num= $val</h1>";		
	}

	function fact($num) {
		return ($num <=1 ? 1 : $num * fact($num-1));
	}	

	function computeTab($num) {
		if (!checkNum($num)) return;

		foreach (range(1,10) as $index) {
			$rows[$index] = makeRow($index, $num*$index);
		}

		echo makeTable(makeRow("X", $num), $rows, null);
		echo "<br/>";
	}

	function computePri($num) {
		if (!checkNum($num)) return;

		if ($num < 2) echo "Inserire un numero >= 2";
		
		$rows = array();
		while ($num >= 2) {
			if (isPrime($num)) array_push($rows, @makeRow($num));
			$num--;
		}					

		echo makeTable("<td>PRIMI</td>", $rows, null);
		echo "<br/>";
	}

	function isPrime($num) {		
		
		if ($num == 2) return true;
		//IF 2 DIVIDES N, N IS NOT PRIME
		if ($num%2 == 0) return false;

		//FOR EACH VALUE BETWEEN 3 AND HALF N PICK EVERY ODD NUMBER AND TEST 
		for($index = 3; $index < $num/2; $index+=2)
			if ($num % $index == 0) return false;

		return true;
	}















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

<form action="" method="POST">
	<?php

	echo makeTable(null, array(
					makeRow("Fattoriale", "<input type='number' name='fac'/> <br/>"),
					makeRow("Primi", "<input type='number' name='pri'/> <br/>"),
					makeRow("Tabellina", "<input type='number' name='tab'/> <br/>")
					), null)
   ?>

	<button type="submit">INVIA</button>
</form>