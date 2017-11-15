
<html>  
<head>
	<title>Runner's Report</title>
	 <link rel="stylesheet" href="main.css">
	 
	 <style>
		h1 { text-align: center; color:goldenrod;}
		table { border: solid 2px black; padding: 10px; margin-left: auto; margin-right: auto; }
		td { border: solid 1px black; padding: 5px; color: black; background-color: white; }
		th { background-color: #CCCCCC; padding: 10px; color:black; border: solid 2px black; }
		html{
		  background: #293f50;
		  background: radial-gradient(#648880, #293f50); 
		  background-color: #b2b2b2;
		  background-color: rgba(0, 0, 0, .3);
		/*  background color*/
		  width: 80%;
		  color: black;
		  margin: 0 auto;
		  min-width: 840px;
		/*  background color*/
		} 
	   img{
			width: 50px;
			height: auto;
		}
	</style>
</head>

<body>
<?php

//_ 6.Report_Page that gives the roster of the runners gouped by(teen, adult, senior) and  alphabetixe by last name
//				Runner's last name, firstname
//				The runner's image
//				Runner's age at the time the report is generated
//				runner's experience level
//	_ 7.eport must be accessible only after a login
//		MUST BE PASSWORD PROTECTED (3 passwords (cs545, and two of my choice)) 
//			Passwords must be encrypted on the server.
//			
	
	$db = mysqli_connect('opatija.sdsu.edu:3306','jadrn004','tomato','jadrn004');
	//	$db = mysqli_connect('localhost','root','','SDSU');
			// returns the error code from the last connection error, if any.
	if(mysqli_connect_errno()){
		echo "Data base connecction failed with following errors: ".mysqli_connect_error();
		die();
	}
	// path to the folder with user's pictures.
	$dirPath = "runnersPics/";
	
//ROSTER FOR TEENs
	$dbLookForTeen = "select firstName, lastName, userPic, DOB, experianceLevel from runners where ageGroup='teen' ORDER BY lastName;";
	$teenQuery = mysqli_query($db,$dbLookForTeen);
	echo	"<h1>Teen Roster</h1>";
	echo "<table>";
	echo "<tr>  <th>First Name</th> <th>Last Name</th> <th>Image</th> <th>Age</th> <th>Experiance Level</th></tr>"; //    
	while($row = mysqli_fetch_array($teenQuery,MYSQLI_ASSOC)){
		echo "<tr><td>";
		echo $row['firstName'];
		echo "</td><td>";
		echo $row['lastName'];
		echo "</td><td>";	
		echo "<img src='";
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
	echo	"<h1>Adult Roster</h1>";
	echo "<table>";
	echo "<tr>  <th>First Name</th> <th>Last Name</th> <th>Image</th> <th>Age</th> <th>Experiance Level</th></tr>"; //    
	while($row = mysqli_fetch_array($teenQuery,MYSQLI_ASSOC)){
		echo "<tr><td>";
		echo $row['firstName'];
		echo "</td><td>";
		echo $row['lastName'];
		echo "</td><td>";	
		echo "<img src='";
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
	echo	"<h1>Senior Roster</h1>";
	echo "<table>";
	echo "<tr>  <th>First Name</th> <th>Last Name</th> <th>Image</th> <th>Age</th> <th>Experiance Level</th></tr>"; //    
	while($row = mysqli_fetch_array($teenQuery,MYSQLI_ASSOC)){
		echo "<tr><td>";
		echo $row['firstName'];
		echo "</td><td>";
		echo $row['lastName'];
		echo "</td><td>";	
		echo "<img src='";
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
	
?>
			
</body>
</html>