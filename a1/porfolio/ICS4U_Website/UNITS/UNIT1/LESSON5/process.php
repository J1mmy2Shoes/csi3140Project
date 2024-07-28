<!DOCTYPE html>
<html>
	<head>
		<title>Results Page</title>
	</head>
	<body>
		<h1>PHP File WRITE READ RESULTS</h1>
		<?php
			//Get data from form
			$name=$_POST['txtName'];
			$age=$_POST['selAge'];
			//process data
			//echo $name;
			//echo $age;
			$contents=$name.",".$age."\r\n";
			//$contents="$name,$age\r\n";
			file_put_contents("data.txt",$contents,FILE_APPEND);

			echo "Your information has been successfully registered. Thanks for visiting my site";

		?>

	</body>
</html>