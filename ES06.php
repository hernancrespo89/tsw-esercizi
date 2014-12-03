<form action="ES6-calcola.php" method="POST">
	<?php include "TableUtils.php";

	echo makeTable(makeRow("Pietanza", "Prezzo in Euro", "V"), array(
		makeRow("Riso Cantonese", "<input type='number'  readonly name='prezzo_rc' value='3.5'/>", "<input type='checkbox' name='riso' />"),
		makeRow("Pizza Margherita", "<input type='number' readonly name='prezzo_pi' value='3.0'/>", "<input type='checkbox' name='pizza' />"),
		makeRow("Maccheroni al sugo", "<input type='number' readonly name='prezzo_ma' value='4.0'/>", "<input type='checkbox' name='macc' />"),
		makeRow("Patatine", "<input type='number' readonly name='prezzo_pa' value='2.5'/>", "<input type='checkbox' name='pata' />"),
		makeRow("<button type='submit'>calcola</button>")
		), null);
	?>
	
</form>