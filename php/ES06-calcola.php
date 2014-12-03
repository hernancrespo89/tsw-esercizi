<?php 

	include 'TableUtils.php';

	$result = 0;
	$service = 2.5;

	$piet = array();

	if(isset($_POST['riso']) && $_POST['riso']) {
		$result += $_POST['prezzo_rc'];
		array_push($piet, makeRow("Riso Cantonese", $_POST['prezzo_rc']));
	}

	if(isset($_POST['pizza']) && $_POST['pizza']) {
		$result += $_POST['prezzo_pi'];
		array_push($piet, makeRow("Pizza Margherita", $_POST['prezzo_pi']));
	}

	if(isset($_POST['macc']) && $_POST['macc']) {
		$result += $_POST['prezzo_ma'];
		array_push($piet, makeRow("Maccheroni al sugo", $_POST['prezzo_ma']));
	}
	if(isset($_POST['pata']) && $_POST['pata']) {
		$result += $_POST['prezzo_pa'];
		array_push($piet, makeRow("Patatine", $_POST['prezzo_pa']));
	}

	if ($result != 0) {
		$result += $service;
		array_push($piet, makeRow("Servizio", $service));	
	}

	echo makeTable(makeRow("Pietanza", "Prezzo"), $piet, makeRow("<b>Totale </b>", $result));



?>