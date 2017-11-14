<!--
$_FILES['file']['name'] //name of the upload file
$_FILES['file']['type']	//the type of the uploaded file
$_FILES['file']['size'] //the size in bytes of the upload file
$_FILES['file']['tmp_name'] // the name of the temporary copy of the file stored on the server
$_FIlES['file']['error'] //the errror code resulting from the file upload

UPLOAD_ERR_OK         Value: 0; There is no error, the file uploaded with success.
UPLOAD_ERR_INI_SIZE   Value: 1; The uploaded file exceeds the upload_max_filesize directive in php.ini.
										This value is set on jadran to 2MB.
UPLOAD_ERR_FORM_SIZE  Value: 2; The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.
UPLOAD_ERR_PARTIAL    Value: 3; The uploaded file was only partially uploaded.
UPLOAD_ERR_NO_FILE    Value: 4; No file was uploaded.
UPLOAD_ERR_NO_TMP_DIR Value: 6; Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.
UPLOAD_ERR_CANT_WRITE Value: 7; Failed to write file to disk. Introduced in PHP 5.1.0.
UPLOAD_ERR_EXTENSION  Value: 8; File upload stopped by extension. Introduced in PHP 5.2.0.

exif_imagetype constants: IMAGETYPE_JPEG, IMAGETYPE_GIF, IMAGETYPE_PNG, IMAGETYPE_BMP 
-->
 
<?php
	$UPLOAD_DIR = '../runnersPics/';
	$COMPUTER_DIR = '/home/jadarn004/public_html/proj3/runnersPics/';
	$fileName = $_FILES['userPic']['name'];
	$err =      $_FILES['userPic']['error'];
   $tmp_name = $_FILES['userPic']['tmp_name'];

	print "FileName: $fileName <br>";
	print "tmp_name: $tmp_name <br>";
	

	if(file_exists("$UPLOAD_DIR".$fileName)){
		echo "<b>Error, the file name $fileName already exists on the server<b><br>\n";
	}
	elseif($err > 0){
		echo "Error Code: $err ";
		if($err === 1)
			echo "The file was too big to upload, the limir is 2mb <br>";
	}
	//add all types of iamges ex. JPEG, PNG ...
	elseif(  exif_imagetype($tmp_name) != IMAGETYPE_JPEG 
			&& exif_imagetype($tmp_name) != IMAGETYPE_GIF
			&& exif_imagetype($tmp_name) != IMAGETYPE_JPG
			&& exif_imagetype($tmp_name) != IMAGETYPE_PNG
			&& exif_imagetype($tmp_name) != IMAGETYPE_BMP) {
		echo "<b>Error, not a jpg or gif or png file</b><br>";
	}
	else{
	   if (move_uploaded_file($tmp_name, "$UPLOAD_DIR".$fileName)){
	   echo "Success!</br >\n";
	   echo "The filename is: ".$fileName."<br />";
	   echo "The type is: ".$_FILES['userPic']['type']."<br />";
	   echo "The size is: ".$_FILES['userPic']['size']."<br />";
	   echo "The tmp filename is: ".$_FILES['userPic']['tmp_name']."<br />";  
	   echo "The basename is: ".basename($fileName)."<br />"; 
		}
	}

	foreach($_POST as $key => $val){
		echo "Parameter: <b>$key</b> and value: <b>$val</b><br>\n";
	}	 
?>
