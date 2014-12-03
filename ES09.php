<h1>Scelta Utente</h1>
<hr/>
<form action="" method="POST">
	Nome: <input type="text" name="nome" /><br/>
	Pass: <input type="password" name="pass" /><br/>

	Quali argomenti vorresti approfondire?<hr/>
	<input type="checkbox" name="info"/> INFO <br/>
	<input type="checkbox" name="image"/> IMMAGINI <br/>
	<input type="checkbox" name="link"/> COLLEGAMENTI <br/>
	<input type="checkbox" name="obj"/> OGGETTI <br/>
	<input type="checkbox" name="xhtml"/> XHTML <br/>
	<hr/>
	<button type="submit">INVIA</button><button tupe="reset">RESET</button>
</form>


<?php 
	include 'TableUtils.php';
	const DEBUG_ON = false;

	$username = @$_POST['nome'];
	$password = @$_POST['pass'];

	
	//CONNESSIONE
	$conn = mysql_connect('localhost', 'tsw-esercizi', 'esercizi') or die("Connection failed");
	debug("C1");
	
	//DATABASE
	$db = mysql_select_db("tsw-esercizi", $conn) or die("Cannot connect db");		
	debug("C2");
	
	//QUERY PER CARICARE TUTTE LE RIGHE DELLA TABELLA
	$sql = "SELECT * FROM `tb_ES9`";
	debug("<br/>". $sql. "<br/>");
	//INVO 
	$res = mysql_query($sql) or die ("Invalid Query". mysql_error());
	debug("C3");
	
	//PRENDI IL PRIMO RISULTATO
	$res = mysql_fetch_row($res);

	$rows = array();
	
	//PRENDI NOME E PASSWORD DALLA QUERY
	//AGGIORNA LE OPZIONI CON I VALORI DEL FORM
	$user = array(
			'nome' => $res[0],
			'pass' => $res[1],
			'image' => @$_POST['image'],
			'info' => @$_POST['info'],
			'link' => @$_POST['link'],
			'obj' => @$_POST['obj'],
			'xhtml' => @$_POST['xhtml']
		);

	
	//SE NOME E PASSWORD COINCIDONO CON QUELLE NEL DB
	if ($user['nome'] == $username && $user['pass'] === $password){
		
		//PER OGNI OPZIONE
		foreach ($user as $label => $value) {	
			//COMPONI RIGA TABELLA (se value è null viene impostato 'off')
			array_push($rows, makeRow($label, $value ? $value : 'off'));

			//SALTA NOME E PASS
			if ($label == 'nome' || $label == 'pass') continue;
			
			//SETTA VAL SU 1 o 0
			$value = ($value == 'on' ? 1 : 0);

			//COMPONI QUERY PAER AGGIORNARE I VALORI
			$sql = "UPDATE `tb_ES9` SET `$label`=$value WHERE `nome`='$username'";
			debug("<br/>".$sql."<br/>");

			//INVIA QUERY
			mysql_query($sql) or die ("<p>Invalid Query". mysql_error(). "</p>");
			debug("<p>C $label, $value OK</p>");
		}
		
		//COMPONI E MOSTRA TABELLA
		echo makeTable("<td colspan='2'>INFO</td>", $rows, null);			
	}

	function debug($msg) {
		if (DEBUG_ON) echo $msg;
	}
?>