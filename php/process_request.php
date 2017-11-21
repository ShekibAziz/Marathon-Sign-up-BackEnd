

<?php
//Aziz, Shekib
//      jadrn004
//      Project #3
//      Fall 2017

include 'functions.php';
// only data is via form is accetable
check_get_only();

// Declaring params (form fields)
$params = process_parameters();

// validating the $params.
dataCheck($params);
 
// stores everything in db
store_data_in_db($params);

include 'confirmationPage.php';
?>