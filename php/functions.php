
<?php
//Aziz, Shekib
//      jadrn004
//      Project #3
//      Fall 2017


// Checks if data was submited through form
function check_get_only()
{
    if (!$_GET) {
        write_error_page("This scripts can only be called from a form.");
        exit;
    }
}

// Warns user if any errors accured 
function write_error_page($msg)
{
    write_header();
    echo "<h2>Sorry, an error occurred<br />", $msg,"</h2>";
    write_footer();
}

// Prints the header of the page
function write_header()
{
    print <<<ENDBLOCK
<!DOCTYPE html>
<html id="html" lang="en">

<head>
   <title> Marathon Man vs Mind </title>
   <meta charset="utf-8">
  	<link rel="stylesheet" href="../main.css">
  	<script src="../js/jquery-3.2.1.min.js"></script>
  	<script src="../main.js"></script>
  	<sc></sc>
</head>
<!--
  		Aziz, Shekib
      jadrn004
      Project #2
      Fall 2017
-->
    
<body>  
ENDBLOCK;
}

// Prints footer 
function write_footer()
{
    echo "</body></html>";
}

// Connect to the DB
function get_db_handle()
{
    $server = 'opatija.sdsu.edu:3306';
    $user = 'jadrn004';
    $password = 'tomato';
    $database = 'jadrn004';
        
    if (!($db = mysqli_connect($server, $user, $password, $database))) {
        write_error_page('SQL ERROR: Connection failed: '.mysqli_error($db));
    }
    return $db;
}

// Close DB connection
function close_connector($db)
{
    mysqli_close($db);
}

function validDOB ($date){
    list($mm,$dd,$yyyy) = explode('/',$date);
    if (!((checkdate($mm,$dd,$yyyy)) && (strlen($yyyy) == 4)))
        return false;
    else
        return true;
}


function isValidState($state){
    
      $stateList = array("AK","AL","AR","AZ","CA","CO","CT","DC",
	  "DE","FL","GA","GU","HI","IA","ID","IL","IN","KS","KY","LA","MA",
	  "MD","ME","MH","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ",
	  "NM","NV","NY","OH","OK","OR","PA","PR","RI","SC","SD","TN","TX",
	  "UT","VA","VT","WA","WI","WV","WY");
	  //for(var $i=0; $i < sizeof($stateList); $i++)
      foreach($stateList as $item){
     	if($item == strtoupper(trim($state)))
            return true;
      }
      return false;
	  } 


function checkExperiance($params){
	return (($params == "expert") || ($params == "experienced") || ($params == "novice" ));
 }


function checkAgeGroup($params){
	return (($params == "senior") || ($params == "adult") || ($params == "teen" ));
}

 
function checkGender($params){
	 return (($params  == "male") ||  ($params  == "female"));
 }

// Validating the Data that is passed to PHP from the Form 
function dataCheck($params){
    $msg = "";
    if(strlen($params[0]) == 0)
        $msg .= "Please enter first name<br />";
    if(strlen($params[1]) == 0)
        $msg .= "Please enter last name<br />";
    if(strlen($params[3]) == 0)
        $msg .= "Please enter the address<br />";
    if(strlen($params[4]) == 0)
        $msg .= "Please enter city<br />";
    if(strlen($params[5]) == 0)
        $msg .= "Please enter state<br />";
    elseif(!(isValidState($params[5])))
        $msg .= "The state appears to be invalid,<br>".
        "please use the two letter state abbreviation<br />";
    if(strlen($params[6]) == 0)
        $msg .= "Please enter zipcode<br />";
    elseif(!(is_numeric($params[6])))
        $msg .= "Only numbers are allowed for zipcode<br/ >";
    if(strlen($params[7]) == 0 && strlen($params[8]) == 0 && strlen($params[9]) == 0)
        $msg .= "Please enter your phone number<br/ >";
    elseif(!(is_numeric($params[7]) && is_numeric($params[8]) && is_numeric($params[9])))
        $msg .= "Only numbers are allowed for phone number<br/ >";
    if(strlen($params[10]) == 0)
        $msg .= "Please enter email<br />";
    elseif(!filter_var($params[10], FILTER_VALIDATE_EMAIL))
        $msg .= "Please enter a valid email<br>".$params[11];
    if(!checkGender($params[11])){
         $msg .= "Please select a gender <br>";
    }
    if(strlen($params[12]) == 0)
        $msg .= "Please enter date of birth<br />";
    elseif(!validDOB($params[12])){
        $msg .= "Please type correct date of birth<br>";
    }
    if(!checkExperiance($params[14])){
         $msg .= "Please select experiance level <br>";
    }
    if(!checkAgeGroup($params[15])){
         $msg .= "Please select age group <br>";
    }
    if ($msg){
        write_form_error_page($msg);
        exit;
    }
}

// W rite The entire form the whole website HTML 
function write_form()
{
    print <<<ENDBLOCK
		 <div class="signUp">
		 	<h3 id="signUp">Sign Up</h3>
	 
		 </div>
		 	<fieldset>
		 		<legend>Registration Form</legend>
						<form name="customer" enctype="multipart/form-data" method="GET" action="process_request.php" id="form">
						
						<label for="firstName">First Name:* </label>
						<input type="text" name="firstName" value="$_GET[firstName]" size=30 id="firstName" >
					
						<label for="lastName">Last Name:*</label>
						<input type="text" name="lastName" value="$_GET[lastName]" size=30 id=lastName><br>
						
						<label for="middleName">Middle Name:</label>
						<input type="text" name="middleName" value="$_GET[middleName]" size=30 id=middleName><br>
						
						<label for="address">Address:*</label>
						<input type="text" name="address" value="$_GET[address]" size=80 id=address><br>
						
						<label for="city">City:*</label>
						<input type="text" name="city" value="$_GET[city]" size=30 id=city>
						
						<label for="state">State:*</label> 
						<input type="text" name="state" value="$_GET[state]" size=7 id=state>
						
						<label for="zipcode">Zipcode:*</label>
						<input type="text" name="zipcode" value="$_GET[zipcode]" size=10 id=zipcode maxlength="5"><br>
						
						<label for="primaryPhone">Primary Phone*:</label>
						(<input type="text" name="areaPhone" value="$_GET[areaPhone]" size="5" maxlength="3" id="areaPhone" />)  
                        <input type="text" name="prefixPhone" value="$_GET[prefixPhone]" size="5" maxlength="3" id="prefixPhone" />
                        <input type="text" name="phone" value="$_GET[phone]" size="8" maxlength="4" id="phone"/><br>
						
						<label for="email">Email:*</label>
						<input type="text" name="email" value="$_GET[email]" size=25 id="email"><br>
						
						<label for="gender">Gender:*</label>
						<input type="radio" name="gender" value="male" size=5 id="male">
						<label for="male">Male</label>
						<input type="radio" name="gender" value="female" size=5 id="female">
						<label for="female">Female</label><br>
					
						<label for="DOB">Date of Birth:*</label>
						<input type="text" name="DOB" value="$_GET[DOB]" size=15 placeholder="mm/dd/yyyy" maxlength="10"><br> 
						
						<label for="medicalCondition">Medical Condition:</label>
						<textarea name="medicalCondition" value="$_GET[medicalCondition]" id="medicalCondition" cols="50" rows="5"></textarea><br>
						
						<label for="experianceLevel">Experiance Level:*</label>
						<input type="radio" name="experianceLevel" value="expert" id=expert> 
						<label for="expert">Expert</label>
						<input type="radio" name="experianceLevel" value="experienced" value=experienced id=experienced>
						<label for="experienced">Experienced</label>
						<input type="radio" name="experianceLevel" value="novice" id=novice>
						<label for="novice">Novice</label><br>
						
						<label for="ageGroup">Age Group:*</label>
						<input type="radio" name="ageGroup" value=senior id=senior>
						<label for="senior">Senior</label>
						<input type="radio" name="ageGroup" value=adult id=adult>
						<label for="adult">Adult</label>
						<input type="radio" name="ageGroup" value=teen id=teen>
						<label for="teen">Teen</label><br>
						
						<label for="userPic">Add a picture</label>
						<input type="file" name="userPic" value="$_GET[userPic]" accept="image/*" id="userPic">

						<hr>
						 <div class=buttons>
							<input id=reset type="reset">
							<input type="submit" value=submit id=submitButton> 
ENDBLOCK;
}   

function write_form2()
{
    print <<<ENDBLOCK
                            </div>
                        </form>

                </fieldset>
                <footer>Copyright</footer>
ENDBLOCK;
}

//
function write_form_error_page($msg)
{
    write_header();
    write_form();
    echo "<div id='message_line'>", $msg,"</div>";
    write_form2();
    write_footer();  
    }

// Remove harmfull characters from the useres input in the form 
function process_parameters($params)
{
	$bad_chars = array('$','%','?','<','>','php');

	$params = array();
	
	$params[] = trim(str_replace($bad_chars, "",$_GET['firstName']));     //0
	$params[] = trim(str_replace($bad_chars, "",$_GET['lastName']));      //1
	$params[] = trim(str_replace($bad_chars, "",$_GET['middleName']));    //2
	$params[] = trim(str_replace($bad_chars, "",$_GET['address']));       //3
	$params[] = trim(str_replace($bad_chars, "",$_GET['city']));          //4
	$params[] = trim(str_replace($bad_chars, "",$_GET['state']));         //5
	$params[] = trim(str_replace($bad_chars, "",$_GET['zipcode']));       //6
	$params[] = trim(str_replace($bad_chars, "",$_GET['areaPhone']));     //7
	$params[] = trim(str_replace($bad_chars, "",$_GET['prefixPhone']));   //8
	$params[] = trim(str_replace($bad_chars, "",$_GET['phone']));         //9
	$params[] = trim(str_replace($bad_chars, "",$_GET['email']));         //10
	$params[] = trim(str_replace($bad_chars, "",$_GET['gender']));        //11
	$params[] = trim(str_replace($bad_chars, "",$_GET['DOB']));           //12
	$params[] = trim(str_replace($bad_chars, "",$_GET['medicalCondition'])); //13
	$params[] = trim(str_replace($bad_chars, "",$_GET['experianceLevel']));  //14
	$params[] = trim(str_replace($bad_chars, "",$_GET['ageGroup']));         //15
	$params[] = trim(str_replace($bad_chars, "",$_GET['userPic']));          //16
	return $params;
	}

//
function store_data_in_db($params)
{
    # get a database connection
    $db = get_db_handle();  
   
    $sql = "select * from runners where email='$params[10]' OR areaphone='$params[7]' AND prefixPhone='$params[8]' AND phone='$params[9]';";
##echo "The SQL statement is ",$sql;    
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0) {
        write_form_error_page('This record appears to be a duplicate');
        exit;
        }
##OK, duplicate check passed, now insert
    $sql = "INSERT INTO runners(firstName,lastName,middleName,address,city,state,zipcode,areaPhone,prefixPhone,phone,email,gender,DOB,medicalCondition,experianceLevel,ageGroup,userPic) ".
    "VALUES(
		 '$params[0]',
		 '$params[1]',
		 '$params[2]',
		 '$params[3]',
		 '$params[4]',
		 '$params[5]',
		 '$params[6]',
		 '$params[7]',
		 '$params[8]',
		 '$params[9]',
		 '$params[10]',
		 '$params[11]',
		 '$params[12]',
		 '$params[13]',
		 '$params[14]',
		 '$params[15]',
		 '$params[16]');";
##echo "The SQL statement is ",$sql;    
    mysqli_query($db,$sql);
    close_connector($db);
    }
        
?>




