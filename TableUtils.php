<?php function makeRow($td1, $td2) {
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
}	?>