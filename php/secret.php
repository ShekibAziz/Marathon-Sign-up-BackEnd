<html>
	<head>
		<link rel="stylesheet" href="../main.css">
	</head>
<!--
Aziz, Shekib
      jadrn004
      Project #3
      Fall 2017
-->
	<body>

		<?php 
		$pass = $_POST['password'];
		$valid = false;

		$raw = file_get_contents('../login/hashedPasswords.txt');
		$data = explode('HAHAHA', $raw);


		foreach ($data as $item) {
			if (crypt($pass, $item) === $item)
				$valid = true;
		}

		if ($valid){
			echo "<a id='logout' href='../report.php'><button>LOGOUT</button></a>";
			echo "<title>Runner's Report</title>";


			$db = mysqli_connect('opatija.sdsu.edu:3306','jadrn004','tomato','jadrn004');
			//	$db = mysqli_connect('localhost','root','','SDSU');
			// returns the error code from the last connection error, if any.
			if (mysqli_connect_errno()){
				echo "Data base connecction failed with following errors: ".mysqli_connect_error();
				die();
			}
			// path to the folder with user's pictures.
			$dirPath = "../runnersPics/";

			//ROSTER FOR TEENs
			$dbLookForTeen = "select firstName, lastName, userPic, DOB, experianceLevel from runners where ageGroup='teen' ORDER BY lastName;";
			$teenQuery = mysqli_query($db,$dbLookForTeen);
			echo	"<h1 class='secreth1'>Teen Roster</h1>";
			echo "<table class='secretTable'>";
			echo "<tr>  <th>First Name</th> <th>Last Name</th> <th>Image</th> <th>Age</th> <th>Experiance Level</th></tr>"; //    
			while($row = mysqli_fetch_array($teenQuery,MYSQLI_ASSOC)){
				echo "<tr><td>";
				echo $row['firstName'];
				echo "</td><td>";
				echo $row['lastName'];
				echo "</td><td>";	
				echo "<img class='imgSize' src='";
				$picPath = $dirPath.$row['userPic'];
				echo $picPath;
				echo "' >";
				echo "</td><td>";
				$DOB = $row['DOB'];
				echo date_diff(date_create($DOB), date_create('today'))->y, "\n";
				echo "</td><td>";
				echo $row['experianceLevel'];
				echo "</td></tr>";


			}
			echo "</table>";

			//ROSTER FOR ADULTs
			$dbLookForTeen = "select firstName, lastName, userPic, DOB, experianceLevel from runners where ageGroup='adult' ORDER BY lastName;";
			$teenQuery = mysqli_query($db,$dbLookForTeen);
			echo	"<h1 class='secreth1'>Adult Roster</h1>";
			echo "<table class='secretTable'>";
			echo "<tr>  <th>First Name</th> <th>Last Name</th> <th>Image</th> <th>Age</th> <th>Experiance Level</th></tr>"; //    
			while($row = mysqli_fetch_array($teenQuery,MYSQLI_ASSOC)){
				echo "<tr><td>";
				echo $row['firstName'];
				echo "</td><td>";
				echo $row['lastName'];
				echo "</td><td>";	
				echo "<img class='imgSize' src='";
				$picPath = $dirPath.$row['userPic'];
				echo $picPath;
				echo "' >";
				echo "</td><td>";
				$DOB = $row['DOB'];
				echo date_diff(date_create($DOB), date_create('today'))->y, "\n";
				echo "</td><td>";
				echo $row['experianceLevel'];
				echo "</td></tr>";


			}
			echo "</table>";

			//ROSTER FOR SENIORs

			$dbLookForTeen = "select firstName, lastName, userPic, DOB, experianceLevel from runners where ageGroup='senior' ORDER BY lastName;";
			$teenQuery = mysqli_query($db,$dbLookForTeen);
			echo	"<h1 class='secreth1'>Senior Roster</h1>";
			echo "<table class='secretTable'>";
			echo "<tr>  <th>First Name</th> <th>Last Name</th> <th>Image</th> <th>Age</th> <th>Experiance Level</th></tr>"; //    
			while($row = mysqli_fetch_array($teenQuery,MYSQLI_ASSOC)){
				echo "<tr><td>";
				echo $row['firstName'];
				echo "</td><td>";
				echo $row['lastName'];
				echo "</td><td>";	
				echo "<img class='imgSize' src='";
				$picPath = $dirPath.$row['userPic'];
				echo $picPath;
				echo "' >";
				echo "</td><td>";
				$DOB = $row['DOB'];
				echo date_diff(date_create($DOB), date_create('today'))->y, "\n";
				echo "</td><td>";
				echo $row['experianceLevel'];
				echo "</td></tr>";


			}
			echo "</table>";

			exit();
		}
		else{
			header("Location: http://jadran.sdsu.edu/~jadrn004/proj3/php/error.php");			
			exit();
			
		} 

		?>
	</body>
</html>