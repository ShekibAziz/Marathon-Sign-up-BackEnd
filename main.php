<?php
	$db = mysqli_connect('localhost','root','','SDSU');
		
		// returns the error code from the last connection error, if any.
	if(mysqli_connect_errno()){
		echo "Data base connecction failed with following errors: ".mysqli_connect_error();
		die();
	}
	$firstName = $_GET["firstName"];
	$lastName = $_GET["lastName"];
	$middleName = $_GET["middleName"];
	$address = $_GET["address"];
	$city = $_GET["city"];
	$state = $_GET["state"];
	$zipcode = $_GET["zipcode"];
	$areaPhone = $_GET["areaPhone"];
	$prefixPhone = $_GET["prefixPhone"];
	$phone = $_GET["phone"];
	$email = $_GET["email"];
	$gender = $_GET["gender"];
	$DOB = $_GET["DOB"];
	$medicalCondition = $_GET["medicalCondition"];
	$experianceLevel = $_GET["experianceLevel"];
	$ageGroup = $_GET["ageGroup"];
//	$userPic = $_GET["userPic"];

	$dupDbLookUp = "select * from runners where email='$email' OR areaphone='$areaPhone' AND prefixPhone='$prefixPhone' AND phone='$phone' ;";
	$query_lookUp = mysqli_query($db,$dupDbLookUp);
	$numDbChanges = mysqli_affected_rows($db);
	if($numDbChanges > 0)
		echo "dup";
	else if($numDbChanges === 0){
		echo "ok";
		$query = "INSERT INTO runners(firstName,lastName,middleName,address,city,state,zipcode,areaPhone,prefixPhone,phone,email,gender,DOB,medicalCondition,experianceLevel,ageGroup) VALUES(
		'$firstName',
		'$lastName',
		'$middleName',
		'$address',
		'$city',
		'$state',
		'$zipcode',
		'$areaPhone',
		'$prefixPhone',
		'$phone',
		'$email',
		'$gender', 
		'$DOB',
		'$medicalCondition',
		'$experianceLevel',
		'$ageGroup')";
		
		//insertion
//		, userPic
		
		//values
//		,
//		'$userPic'
		
		
 // running the query and putting it in the database
			$query_Run = mysqli_query($db, $query);
		}
	else
		echo "Error, failure".$numDbChanges;
	
?>
