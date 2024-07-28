<!DOCTYPE html>
<html>
	<head>
		<title>
			Registered Users
		</title>
	</head>
	<body>
		<h1>Registered Users</h1>
		<?php
			$homepage=file_get_contents('userReg.txt');

			echo nl2br("$homepage");
		?>
		<a href="../../../index.html">Back To Home</a>
	</body>
</html>