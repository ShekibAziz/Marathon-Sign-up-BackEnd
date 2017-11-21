<?php
//Aziz, Shekib
//      jadrn004
//      Project #3
//      Fall 2017

include 'functions.php';

$email = $_GET["email"];
$areaPhone = $_GET["areaPhone"];
$prefixPhone = $_GET["prefixPhone"];
$phone = $_GET["phone"];

$db = get_db_handle();

$dupDbLookUp = "select * from runners where email='$email' OR areaphone='$areaPhone' AND prefixPhone='$prefixPhone' AND phone='$phone' ;";

$query_lookUp = mysqli_query($db,$dupDbLookUp);
$numDbChanges = mysqli_affected_rows($db);
if($numDbChanges > 0)
	echo "DUP"; 
elseif($numDbChanges == 0)
    echo "OK";
else
	echo "Error, failure".$numDbChanges;
?>