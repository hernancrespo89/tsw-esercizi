<form action="" method="POST">
<fieldset>
	<legend align="CENTER">Informazioni Personali</legend>
	<table>	
	    <tr><td> Cognome:</td> <td><input name="cognome" type="text"></td></tr>
	    <tr> <td>  Nome:   </td><td> <input name="nome" type="text"></td></tr>
	    <tr> <td>  Data di nascita </td><td> <input name="dataN" type="text"></td></tr>
	    <tr> <td>  Luogo di nascita </td><td> <input name="luogoN" type="text"></td></tr>
	    <tr> <td>  Sesso </td><td> <input name="sesso" type="radio" value="M">Maschio<input name="sesso" type="radio" value="F"> Femmina</td></tr>
    </table>
</fieldset>

<fieldset>
    <legend align="CENTER">Indirizzo</legend>
    <table>
        <tbody><tr> <td>  Via: </td><td> <input name="via" type="text">
        </td></tr><tr> <td>  Numero: </td><td> <input name="num" type="text">
        </td></tr><tr> <td>  C.A.P.: </td><td> <input name="cap" type="text">
        </td></tr><tr> <td>  Città: </td><td> <input name="citta" type="text">
        </td></tr><tr> <td>  Provincia: </td><td> <input name="prov" type="text">
    </td></tr></tbody></table>
</fieldset>
<input type="submit"><input type="reset">
</form>

<?php
include	'TableUtils.php';
const DEBUG_ON = true;

	$username = @$_POST['nome'];
	$password = @$_POST['pass'];

	
	//CONNESSIONE
	$conn = mysql_connect('localhost', 'tsw-esercizi', 'esercizi') or die("Connection failed");
	debug("C1 OK");
	
	//DATABASE
	$db = mysql_select_db("tsw-esercizi", $conn) or die("Cannot connect db");		
	debug("C2 OK");
	
	$vals = array(
		'cognome' => @$_POST['cognome'],
		'nome' => @$_POST['nome'],
		'dataN' => @$_POST['dataN'],
		'luogoN' => @$_POST['luogoN'],
		'sesso' => @$_POST['sesso'],
		'via' => @$_POST['via'],
		'numero' => @$_POST['num'],
		'cap' => @$_POST['cap'],
		'citta' => @$_POST['citta'],
		'provincia' => @$_POST['prov']
	);

	$rows = array();
	$sql = "INSERT INTO `tb_ES10` ";

	$labels = "(";
	$values = "VALUES (";

	//INSERISCI L'ETICHETTA ED IL VALORE NELLA QUERY SOLO SE SETTATTI
	foreach ($vals as $label => $value){
		if ($value !== null && $value != "") {
			$labels .= $label. ",";
			$values .= "'$value'". ",";
			array_push($rows, makeRow($label, $value));
			debug("LABELS $labels<br>$values");
		} else array_push($rows, makeRow($label, "unset"));
		//MOSTRA "UNSET" ALTRIMENTI
	}

	$labels = rtrim($labels, ","). ") ";
	$values = rtrim($values, ","). ")";

	$sql .= $labels .= $values;
	debug("<b>SQL:</b> $sql");

	$res = mysql_query($sql) or die("IMPOSSIBILLE REGISTRARE I DATI"."<br>". mysql_error());
	echo "DATI REGISTRATI CORRETTAMENTE!";

echo makeTable("<td colspan='2'> DATI PERSONALI </td>", $rows, null);

function debug($msg) {
	if (DEBUG_ON) echo "<p>". $msg. "</p>";
}
?>
