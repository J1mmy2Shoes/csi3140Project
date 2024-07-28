<!DOCTYPE html>
<html>
	<head>
		<title>Past Info</title>
	</head>
	<body>
		<h1>Past Registrations</h1>
		<?php
			$fileInfo=file_get_contents("data.txt");
			echo "Past info includes: <br>";
			echo $fileInfo;

		?>
	</body>
</html>