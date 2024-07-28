<!DOCTYPE html>
<html>
<head>
	<title>Cost Results</title>
</head>
<body>
	<h1>Final Cost Analysis</h1>

	<?php
		$cost1=$_POST['txtItem1'];
		$cost2=$_POST['txtItem2'];
		$subtotal=$cost1+$cost2;

		echo "<h3>Subtotal: $ $subtotal </h3>";

		$taxes=$subtotal*0.13;
		echo "<h3> Taxes: $ $taxes </h3>";

		$finalTotal=$subtotal+$taxes;
		echo "Your final cost is $ $finalTotal";

	?>
</body>
</html>