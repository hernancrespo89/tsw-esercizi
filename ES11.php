
<form action="" method="GET">
    Seleziona dal menu gli animali che preferisci<br>
    <select name="animali[]" size="3" multiple="true">
        <option  value="cane"> Cane</option>
        <option  value="gatto" selected="true"> Gatto</option>
    	<option  value="giraffa"> Giraffa</option>
    	<option  value="elefante"> Elefante</option>		
		<option  value="leone"> Leone</option>
	</select>
	<input type="submit" value="Invia i dati">
	<input type="reset" value="Cancella tutto!">
</form>
<?php
include 'TableUtils.php';

$rows = array();

//PER OGNI ELEMENTO DELL'ARRAY FILTRATO CREA UNA RIGA
foreach(array_filter($_GET['animali']) as $v) 
	array_push($rows, makeRow($v));

echo makeTable(
	"<td>ANIMALI PREFERITI</td>",
	$rows,
	null);
?>