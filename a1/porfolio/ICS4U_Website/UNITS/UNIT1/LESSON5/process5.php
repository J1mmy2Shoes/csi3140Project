<!DOCTYPE html>
<html>
	<head>
		<title>Results Page</title>
	</head>
	<body>
		<h1>PHP File WRITE READ RESULTS</h1>
		<?php
			//Get data from form
			$firstName=$_POST['txtFirstname'];
			$lastName=$_POST['txtLastname'];
			$school=$_POST['txtSchool'];
			$age=$_POST['selAge'];
			$gender=$_POST['gender'];

			//process data
			//echo $name;
			//echo $age;
			//$contents=$name.",".$age."\r\n";
			//$contents="$name,$age\r\n";
			//file_put_contents("data.txt",$contents,FILE_APPEND);
			echo "First Name:" .$firstName."<br>";
			echo "Last Name:" .$lastName."<br>";
			echo "School:" .$school."<br>";
			echo "Age:" .$age."<br>";
			echo "Gender:" .$gender."<br>";
			echo "Your information has been successfully registered. Thanks for visiting my site";

			file_put_contents("userReg.txt",$firstName, FILE_APPEND);
			file_put_contents("userReg.txt",$lastName, FILE_APPEND);
			file_put_contents("userReg.txt",$school, FILE_APPEND);
			file_put_contents("userReg.txt",$age, FILE_APPEND);
			file_put_contents("userReg.txt",$gender, FILE_APPEND);
		?>
		<br><br>
		<a href="../../../index.html">Back To Home</a>
	</body>
</html>