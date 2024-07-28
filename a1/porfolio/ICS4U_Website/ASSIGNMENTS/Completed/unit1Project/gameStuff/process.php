<!--HTML and PHP for the results page
Yi Bo, James, Kowan, Howard
2/25/2020
Title: process.php -->
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link href="https://fonts.googleapis.com/css?family=Metrophobic" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<title>
			Results
		</title>
	</head>
	<body>
		<div class="divProfileBar">
			<table class="tableProfileBar">
				<tr>
					<th>
						Logged In As:
						<br>
						<?php 
						session_start();
						echo $_SESSION['userName']?>
					</th>
					<th>
						Highest Score:
						<br>
						<?php echo $_SESSION['highscore']?>/10
					</th>
					<th>
						<a href="../index.html">Logout</a>
					</th>
				</tr>
			</table>
		</div>
		<!-- start of headbar-->
		<div class="cntHeadbar">
			<div class="navOption"><a onclick="<?php clearUser();?>" href="../index.html" class="pageLink">Home</a></div>
			<div class="navOption currentPage">Current Page: Results</div>
			<div class="navOption"><a href="../help.html" class="pageLink">Help</a></div>
		</div>
		<!--end of headbar-->
		<!-- php -->
		<?php
			//turns off error reporting so when user doesn't enter a value, it shows what i want to say instead of error message
			error_reporting(0);
			//$_answer is an array that countains all answers of the questions
			//If you want to add more questions and answers, just add more variables to the array
			$_answers=[/*Q1*/"10",/*Q2*/"koyomi araragi",/*Q3*/"false",/*Q4*/"weeb",/*Q5*/"gintama",/*Q6*/"dio",/*Q7*/"bleach",/*Q8*/"500",/*Q9*/"seinen",/*Q10*/"sci-fi",/*Q11*/"fantasy",/*Q12*/"shounen",/*Q13*/"natsu dragneel",/*Q14*/"kamina",/*Q15*/"rin okumura",/*Q16*/"mugen"];
			//counter is used increase what question to check. Transitions checking question 1 to question 2
			$_counter="1";
			$_correct=0;
			$_wrong=0;
			$_matchingCorrect=0;
			$_matchingCorrect2=0;
			//When you do the question wrong, it won't say you did questiion 13 wrong, as in the third option of the matching question. It will just say the matching question number
			$_matchingCounter=0;
			$_empty=[];
			//In the for loop, I change "q1" to "q2"
			$question="q1";
			$playerValue=$_POST[$question];
			$allPlayerValue=[];
			//used for checking which matching question it is
			$_matchingLetter=["a","b","c","d"];
			/********************************
			*Checking how many questions I did correctly*
			********************************/
			//For loop checks if question equals the answer
			for ($i=0; $i < sizeof($_answers); $i++) { 
				if ($playerValue==null) {
					//this array gets filled up with the questions that player doesnt do
					array_push($_empty, $_counter);
				}
				//converts to lowercase incase player enters uppercase
				/****************************
				*use of string function*
				*****************************/
				$playerValue=strtolower("$playerValue");
				//Used for the matching question
				if ($question=="q9" || $question=="q10" || $question=="q11" || $question=="q12") {
					if ($_answers[$i]==$playerValue) {
						$_matchingCorrect++;
					}
					if ($_matchingCorrect==4) {
						$_correct++;
					}
				}
				//2nd matching question
				else if ($question=="q13" || $question=="q14" || $question=="q15" || $question=="q16") {
					if ($_answers[$i]==$playerValue) {
						$_matchingCorrect2++;
					}
					if ($_matchingCorrect2==4) {
						$_correct++;
					}
				}
				else if ($_answers[$i]==$playerValue) {
					$_correct++;
				}
				$_counter++;
				//this makes question into the next question, then 2 lines down the player value gets updated with the new question
				$question="q".$_counter;
				//saving all player values for when I check answers
				array_push($allPlayerValue, $playerValue);
				$playerValue=$_POST[$question];
			}
			//subtract 6 because matching questions need 3 more array values each
			$_wrong=sizeof($_answers)- 6 - $_correct;
			echo "<h1 style='color: white;'><u>You got $_correct correct and $_wrong wrong</u><br><br></h1>";
			//since the matching question is 4 questions, I have to make part b,c,d all the same question e.g question 9b would be called q10 but i still have to display 9
			for ($i=0; $i < sizeof($_answers); $i++) { 
				if ($_answers[$i]!=$allPlayerValue[$i]) {
					$_questionWrong=$i+1;
					if ($_questionWrong>8 && $_questionWrong<13) {
						$_questionWrong="9".$_matchingLetter[$_questionWrong-9];
					}
					else if ($_questionWrong>12) {
						$_questionWrong="10".$_matchingLetter[$_questionWrong-13];
					}
					echo "<span style='color: white; font-size: 100%;'>For question $_questionWrong, you entered \"$allPlayerValue[$i]\", but the answer was \"$_answers[$i]\" <br><br></span>";
				}
			}			
			/********************************
			*Checking how many questions I did not do*
			********************************/
			if (sizeof($_empty)!=0) {
				echo "<span style='color: white; font-size: 200%;'>You did not answer question </span>";
			}
			for ($i=0; $i < sizeof($_empty); $i++) { 
				if ($_empty[$i]>=9 && $_empty[$i]<=12) {
					if ($i==0) {
						echo "<span style='color: white; font-size: 200%;'> 9</span>";
					}
					else if ($_empty[sizeof($_empty)-1]<13) {
						echo "<span style='color: white; font-size: 200%;'>, and 9</span>";
					}
					else{
						echo "<span style='color: white; font-size: 200%;'>, 9</span>";	
					}
				}
				if ($_empty[$i]>=9) {
					break;
				}
				if ($i==0) {
					echo "<span style='color: white; font-size: 200%;'>$_empty[$i]</span>";
				}
				else if ($i!=sizeof($_empty)-1) {
					echo "<span style='color: white; font-size: 200%;'>, $_empty[$i]</span>";
				}
				else{
					echo "<span style='color: white; font-size: 200%;'>, and $_empty[$i]</span>";
				}
				/*}*/
				//if the last value of $_empty is greater than 9, that means player didn't fill in question 10 fully
				//Checking if the last value of the array is question 10, since q13-16 or something is question ten
				//This is needed because its a matching question
			}
			if ($_empty[sizeof($_empty)-1]>12 && sizeof($_empty)!=1) {
				echo "<span style='color: white; font-size: 200%;'>, and 10</span>";	
			}

			//this is where high scores are updated
			$possibleUsers=explode("\r\n",file_get_contents('../userReg.txt'));
			//since every player is now stored, wipe the file containing everyone
			file_put_contents("../userReg.txt", "");
			$newInfo=array();

			/********************************
			*USE OF SELECTION AND REPITITION*
			********************************/
			for($i=0;$i<sizeof($possibleUsers)-1; $i++){
				$lineInfo=explode(" ", $possibleUsers[$i]);

				if($lineInfo[0]==$_SESSION['userName'] && $lineInfo[4]<$_correct){
					$lineInfo[4]=$_correct;
					$lineInfo=implode(" ", $lineInfo)."\r\n";
					$newInfo=array_push($newInfo, $lineInfo);
					file_put_contents("../userReg.txt", $lineInfo, FILE_APPEND);
				}

				else{
					$insertPlayer=$possibleUsers[$i]."\r\n";
					file_put_contents("../userReg.txt", $insertPlayer, FILE_APPEND);
				}
			}

			//this makes index.php not send to signin page and is invoked whenever home is clicked
			/******************use of custom function**********************/
			function clearUser(){
				$_SESSION['currentUser']="";
				$_SESSION['passwordAccepted']="";
			}
		?>
		<br>
		<br>
		<a href="index.php" style="padding: 10px 15px 10px 15px; border-style: solid; color: white;">Play Again!</a>
	</body>
</html>