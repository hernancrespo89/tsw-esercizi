
<style>
	thead { background-color: yellow; text-align: center;}	
	tbody > tr > td { text-align: right; }
	tbody > tr > td:first-child { text-align: center; }

	.green { background-color: green;}
	.pink { background-color: pink;}
	.red { background-color: red;}
</style>


<table border="1">
<thead><td>Numero</td><td>Riga</td></thead>
<tbody>
<?php 
	

for ($i = 0; $i < 12; $i++) {		

	if ($i % 3 === 1)      $curClass = ' class="green"';
	else if ($i % 3 === 2) $curClass = ' class="red"';
	else if ($i % 3 === 0) $curClass = ' class="pink"';
	

	echo "<tr $curClass><td>$i</td><td>riga $i</td></tr>";
}

?>
</tbody>
</table>