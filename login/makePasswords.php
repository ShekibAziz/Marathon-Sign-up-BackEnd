<?php

if($_GET) exit;
if($_POST) exit;

$pass = array('cs545','hi','nopassword');

#### Using [CRYPT_MD5] ######

$salt = '$1$3MDN3DKAM38A@';

for($i=0; $i<count($pass); $i++)
	echo crypt($pass[$i],$salt)."HAHAHA";
?>
