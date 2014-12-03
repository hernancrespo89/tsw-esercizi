<?php 

	include './TableUtils.php';
	$name = $_POST['nome'];
	$mail = $_POST['email'];
	$pass = $_POST['pass'];
	$pass_c = $_POST['pass_c'];

	if ($pass !== $pass_c) {
		echo "<h1>Le password non coincidono</h1>";
		return;		
	}

	else echo makeTable("<td colspan='2'> INFO </td>", array(
			makeRow("Nome", $name),
			makeRow("Mail", $mail),
			makeRow("Pass", $pass)
		), null);
?>