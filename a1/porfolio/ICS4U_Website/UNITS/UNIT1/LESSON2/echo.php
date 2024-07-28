<html>
	<head>
		<title>test PHP Script and Form</title>
	</head>
	<body>
		<h1>ICS4U User Registration Echo Script</h1>
		<hr>
			<?php
				$firstName=$_POST["firstName"];
				$lastName=$_POST["lastName"];
				$age=$_POST["age"];
				$gender=$_POST["gender"];
				$school=$_POST["school"];
				$aboutMe=$_POST["aboutMe"];
				echo "<em>First Name:</em>".$firstName."<br>";
				echo "<em>Last Name:</em>".$lastName."<br>";
				echo "<em>Age:</em>".$age."<br>";
				echo "<em>Gender:</em>".$gender."<br>";
				echo "<em>School:</em>".$school."<br>";
				echo "<em>About Me:</em>".$aboutMe."<br>";
			?>
	</body>
</html>