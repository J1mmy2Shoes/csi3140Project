<!--HTML and PHP for the quiz user interface
Yi Bo, James, Kowan, Howard
2/20/2020
Title: index.php -->

<!DOCTYPE html>
<html>
	<head>
		<title>The Quiz</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Metrophobic" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				//used to name the select boxes
				for(i=9;i<13;i++){
					createSelectQuestion(i);
				}
				function createSelectQuestion(x){
					//for some reason, the quotes don't close unless they are all on the same line, hence this large block of text
					//all this does is create select boxes
					$("#selQuestionTd").append('<td><select class="selQuestion9" name="q'+x+'"><option></option><option>Shounen</option><option>Seinen</option><option>Sci-Fi</option><option>Fantasy</option></select></td>')
				}
			});
		</script>
	</head>
	<body>
		<?php
			error_reporting(0);
			session_start();
			//data saved as follows:
			//Username FirstName LastName Password highscore

			//function to clear current user info
			function clearUser(){
				$_SESSION['currentUser']="";
				$_SESSION['passwordAccepted']="";
			}

			$_SESSION['userName']=$_POST['txtLogUsername'];
			$_SESSION['password']=$_POST['txtLogPassword'];

			//check to see if users are aready logged in
			if($_SESSION['currentUser']!=""){
				$_SESSION['userName']=$_SESSION['currentUser'];
			}

			if($_SESSION['passwordAccepted']!=""){
				$_SESSION['password']=$_SESSION['passwordAccepted'];
			}
		
			//user stats
			$_SESSION['highscore']=0;
			$currentProgress;
			//switch to decide if user valid
			$exists=false;
			//get array of possible users
			$possibleUsers=file_get_contents("../userReg.txt");
			$possibleUsers=explode("\r\n",$possibleUsers);

			for ($i=0; $i < count($possibleUsers)-1; $i++) {
				$logAttempt=explode(" ", $possibleUsers[$i]);

				if(strcasecmp($_SESSION['userName'], $logAttempt[0])==0) {	
					$exists=true;		

					if($_SESSION['password']==$logAttempt[3]){
						$_SESSION['userName']=$logAttempt[0];
						$_SESSION['highscore']=$logAttempt[4];
					}	

					else{
						header("Location: ../indexCheat.html");
					}	
				}

				$newPossibleUsers=array();
				array_push($newPossibleUsers, $possibleUsers[$i]."\r\n");
			}

			if(!$exists){
				header("Location: ../indexCheat.html");
			}
		?>
		<div class="divProfileBar">
			<table class="tableProfileBar">
				<tr>
					<th>
						Logged In As:
						<br>
						<?php echo $_SESSION['userName']?>
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
			<div class="navOption"><a onlcick=""<?php clearUser();?> href="../index.html" class="pageLink">Home</a></div>
			<div class="navOption currentPage">Current Page: The Quiz</div>
			<div class="navOption"><a href="../help.html" class="pageLink">Help</a></div>
		</div>
		<!--end of headbar-->
		<form method="POST" action="process.php" id="questions">
			<!--table to make styles easy-->
			<!-- Question 1 -->
			<div class="quizQuestion">
				<table>
					<h1 class="question">Question 1: How important is friendship to Gon and Killua on a scale of 1-10?</h1>
					<img src="../images/question1.jpg" width="500">
					<br>
					<tr>
						<select name="q1" id="selQuestion1">
							<option></option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
						</select>
					</tr>
				</table>
			</div>
			<!-- Question 2 -->
			<!-- ******* picture question ******* -->
			<div class="quizQuestion" style="height: 550px;">
				<table>
					<h1 class="question">Question 2: Who is this character?</h1>
					<img src="../images/question2.jpg" height="325">
					<tr>
						<td>
							<input type="radio" name="q2" value="Izaya Orihara">
							<label class="lblQuestion2">Izaya Orihara</label>
						</td>
						<td>
							<input type="radio" name="q2" value="Hiroshi Kamiya">
							<lable class="lblQuestion2">Hiroshi Kamiya</label>
							
						</td>
						<td>
							<input type="radio" name="q2" value="Koyomi Araragi">
							<lable class="lblQuestion2">Koyomi Araragi</label>
						</td>
						<td>
							<input type="radio" name="q2" value="Kazuto Kirigaya">
							<lable class="lblQuestion2">Kazuto Kirigaya</label>
						</td>
					</tr>
				</table>
			</div>
			<!-- Question 3 -->
			<!-- ******* true or false question ******* -->
			<div class="quizQuestion">
				<table>
					<h1 class="question">Question 3: All anime comes from China.</h1>
					<img src="../images/question3.jpg" width="400">
					<tr>
						<td>
							<input type="radio" name="q3" value="true">
							<label class="lblQuestion3" style="color: green;"><b>True</b></label>
						</td>
						<td>
							<input type="radio" name="q3" value="false">
							<label class="lblQuestion3" style="color: red;"><b>False</b></label>
						</td>
					</tr>
				</table>
			</div>
			<!-- Question 4 -->
			<!-- ******* one word answer question ******* -->
			<div class="quizQuestion">
				<table>
					<h1 class="question">Question 4: A person who is radically obsessed with Japanese culture is called...</h1>
					<img src="../images/question4.jpg" width="400">
					<tr>
						<td>
							<input type="text" name="q4" id="txtQuestion4">
						</td>
					</tr>
				</table>
			</div>
			<!-- Question 5 -->
			<div class="quizQuestion" style="height: 550px">
				<table>
					<h1 class="question">Question 5: Which anime has more episodes?</h1>
					<tr>
						<td>
							<h3><u>Bleach</u></h3>
							<img src="../images/question5_1.jpg" height="325">
							<br>
							<input type="radio" name="q5" value="Bleach">
						</td>
						<td>
							<h3><u>Gintama</u></h3>
							<img src="../images/question5_2.jpg" height="325">
							<br>
							<input type="radio" name="q5" value="Gintama">
						</td>
					</tr>
				</table>
			</div>
			<!-- Question 6 -->
			<!-- ******* fill in the blank question ******* -->
			<div class="quizQuestion">
				<table>
					<h1 class="question">Question 6: Fill in the Blank:</h1>
					<tr>
						<td>
							<img src="../images/question6.jpg" width="290">
						</td>
					</tr>
					<tr>
						<td>
							<h2>Kono <input type="text" name="q6" id="txtQuestion6"> da!</h2>
						</td>
					</tr>
				</table>
			</div>
			<!-- Question 7 -->
			<div class="quizQuestion">
				<table>
					<h1 class="question">Question 7: What anime is this opening from?</h1>
					<tr>
						<td>
							<audio controls>
								<source src="../audio/opening.mp3" type="audio/mpeg" id="audQuestion7">
							</audio>
						</td>
					</tr>
					<tr>
						<td>
							<img src="../images/question7.gif" height="200">
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="q7" id="txtQuestion7">
						</td>
					</tr>
					
				</table>
			</div>
			<!-- Question 8 -->
			<!-- ******* multiple choice question ******* -->
			<div class="quizQuestion">
				<table>
					<h1 class="question">Question 8: How many episodes are in Naruto Shippuden?</h1>
					<img src="../images/question8.jpg" width="200">
					<tr>
						<td>
							<input type="radio" name="q8" value="12">
							<label class="lblQuestion8">12</label>
						</td>
						<td>
							<input type="radio" name="q8" value="24">
							<label class="lblQuestion8">24</label>
						</td>
						<td>
							<input type="radio" name="q8" value="367">
							<label class="lblQuestion8">367</label>
						</td>
						<td>
							<input type="radio" name="q8" value="500">
							<label class="lblQuestion8" value="3">500</label>
						</td>
					</tr>
				</table>
			</div>
			<!-- Question 9 -->
			<div class="quizQuestion" style="height: 650px;">
				<table>
					<h1 class="question">Question 9: Match the anime with the genre</h1>
					<tr>
						<td>
							<h3><u>A) Tokyo Ghoul</u></h3>
							<img src="../images/question9_1.jpg" height="325">
						</td>
						<td>
							<h3><u>B) Steins Gate</u></h3>
							<img src="../images/question9_2.jpg" height="325">
						</td>
						<td>
							<h3><u>C) Re Zero</u></h3>
							<img src="../images/question9_3.jpg" height="325">
						</td>
						<td>
							<h3><u>D) My Hero Academia</u></h3>
							<img src="../images/question9_4.jpg" height="325">
						</td>
					</tr>
					<tr id="selQuestionTd">
						<!--This area is filled using a function-->
					</tr>
				</table>
			</div>
			<!-- Question 10 -->
     		<div class="quizQuestion" style="height: 600px;">
				<table>
					<h1 class="question">Question 10: Match the characters with their names</h1>
					<tr>
						<td>
							<h3>A)</h3>
							<img src="../images/question10_1.jpg" height="325">
						</td>
						<td>
							<h3>B)</h3>
							<img src="../images/question10_2.jpg" height="325">
						</td>
						<td>
							<h3>C)</h3>
							<img src="../images/question10_3.jpg" height="325">
						</td>
						<td>
							<h3>D)</h3>
							<img src="../images/question10_4.jpg" height="325">
						</td>
					</tr>
					<tr>
						<td>							
							<select name="q13" class="selQuestion5">
								<option></option>
								<option>Rin Okumura</option>
								<option>Mugen</option>
								<option>Natsu Dragneel</option>
								<option>Kamina</option>
							</select>
						</td>
						<td>
							<select name="q14" class="selQuestion5">
								<option></option>
								<option>Rin Okumura</option>
								<option>Mugen</option>
								<option>Natsu Dragneel</option>
								<option>Kamina</option>
							</select>
						</td>
						<td>
							<select name="q15" class="selQuestion5">
								<option></option>
								<option>Rin Okumura</option>
								<option>Mugen</option>
								<option>Natsu Dragneel</option>
								<option>Kamina</option>
							</select>
						</td>
						<td>
							<select name="q16" class="selQuestion5">
								<option></option>
								<option>Rin Okumura</option>
								<option>Mugen</option>
								<option>Natsu Dragneel</option>
								<option>Kamina</option>
							</select>
						</td>
					</tr>
				</table>
			</div>
			<input type="submit" name="submit" id="btnSubmit">
		</form>	
	</body>
</html>