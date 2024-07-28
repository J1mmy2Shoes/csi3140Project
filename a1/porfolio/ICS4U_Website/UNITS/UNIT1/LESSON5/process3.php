<!DOCTYPE html>
<html>
	<head>
		<title>Login Results </title>
	</head>
	<body>
		<h1>Login Results Page</h1>
		<?php
			$fileData=file_get_contents("data.txt");
			echo $fileData;

			$lineInfo=explode("\r\n", $fileData);


			//echo "Length of array:" .count($lineInfo);
			echo "<BR>";
			$dataLine;//array for each line
			$found=false;
			for($i=0;$i<count($lineInfo);$i++) 
			{ 
				//echo $i." -->  ".$lineInfo[$i]."<br>";
				$dataLine=explode(",", $lineInfo[$i]);
				//echo $dataLine[0]."   ".$dataLine[1]."<BR>"

				if ($dataLine[0]==$_POST['txtName'] && $dataLine[1]==$_POST['txtAge'])

				{
					echo "You are registered. Thank you.";
					$found=true;


				}
			}

		?>

	</body>
</html>