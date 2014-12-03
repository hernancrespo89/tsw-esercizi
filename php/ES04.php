<?php 

$numbers = array();

foreach (range(1,50) as $index) {
	array_push($numbers, rand(1, 200));
}

$min = $numbers[0];
$max = $numbers[0];
$sum = 0;

foreach ($numbers as $num) {
	echo "<span> $num </span>";
	$sum += $num;

	if ($num < $min) $min = $num;
	if ($num > $max) $max = $num;
}

echo "<p>Somma: $sum</p>";
echo "<p>Media:". ($sum/count($numbers)). "</p>";

echo "<p> Reverse";
$numbers = array_reverse($numbers);
foreach ($numbers as $num) {	
	echo "<span> $num </span>";
}
echo "</p>";

echo "<p>";
$numbers = array_reverse($numbers);
foreach ($numbers as $num) {	
	echo "<span> $num </span>";

	if ($num >= 100) echo "<b> G </b>";
	else echo "<b> P </b>";

	echo "<span> | </span>";
}
echo "</p>";
?>