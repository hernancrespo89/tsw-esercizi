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

	$username = @$_POST['nome'];
	$password = @$_POST['pass'];

	$rows = array();
	
	if ($username ===  && @$_POST['pass'] === $password){
		
		row('Nome', 'nome', $rows);
		row('Pass', 'pass', $rows);
		row('image', 'image', $rows);
		row('Info', 'info', $rows);
		row('link', 'link', $rows);
		row('obj', 'obj', $rows);
		row('xhtml', 'xhtml', $rows);
	}
	
	if (count($rows) >0)
		echo makeTable("<td colspan='2'>INFO</td>", $rows, null);


	function row($label, $name, &$rows) {
		if(@$_POST[$name]) {			
			array_push($rows, makeRow($label, $_POST[$name]));			
		}
	}
?>