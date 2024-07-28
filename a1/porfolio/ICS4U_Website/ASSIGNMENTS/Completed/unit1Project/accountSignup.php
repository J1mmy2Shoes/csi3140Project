<!--PHP for the login page
Yi Bo, James, Kowan, Howard
2/25/2020
Title: accountSignup.php -->
<!DOCTYPE html>
<html>
	<head>
		<title>
			Signup
		</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Metrophobic" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	</head>
	<body>
		<div style="background-color: black;">
			<h1 style="font-size: 300%; color: white; margin: 0; font-family: 'Metrophobic', sans-serif; padding: 1%;">Sign Up</h1>
		</div>
		<!-- php -->
		<?php
			$userName=$_POST['txtUserName'];
			$loginPassword=$_POST['txtLoginPassword'];
			$firstName=$_POST['txtFirstName'];
			$lastName=$_POST['txtLastName'];
			//full line of user info
			$partyUser=$userName." ".$firstName." ".$lastName." ".$loginPassword." 0"."\r\n";
			//the switchs to add to registered list or not
			$triggerUserName=false;
			$triggerFullName=false;

			$fileInfo=file_get_contents("userReg.txt");

			$fileInfo=explode("\r\n", "$fileInfo");

			//the setup of each profile is:
			//Username FirstName LastName Password highscore
			for ($i=0; $i < sizeof($fileInfo)-1; $i++) { 
				//line for checking for duplicates
				$lineInfo=explode(" ", $fileInfo[$i]);

				if(strcasecmp($userName,$lineInfo[0])==0){
					$triggerUserName=true;
				}

				if(strcasecmp($firstName,$lineInfo[1])==0 && strcasecmp($lastName,$lineInfo[2])==0){
					$triggerFullName=true;
				}
			}
			//if the username is not already registered
			if(!$triggerUserName && !$triggerFullName){
				file_put_contents("userReg.txt", $partyUser, FILE_APPEND);
				echo "<div style='background-color: white; padding-bottom: 3%;'><span style='color: black; font-size: 200%;'><br><br>Thank you for registering $firstName. You can now login to play!</span></div>";
			}

			else if($triggerUserName){
				echo "<div style='background-color: white; padding-bottom: 3%;'><span style='color: black; font-size: 200%;'><br><br>Sorry the username: $userName, has already been taken. Please try a different name.</span></div>";
			}

			else{
				echo "<div style='background-color: white; padding-bottom: 3%;'><span style='color: white; font-size: 200%;'><br><br>Sorry $firstName $lastName, you have already registered. Please try a different name.</span></div>";
			}
		?>
		<br>
		<br>
		<a style="color:black; border-style: solid; padding: 5px 15px 5px 15px; background-color: white;" href="index.html">Back To Homepage</a>
	</body>
</html>