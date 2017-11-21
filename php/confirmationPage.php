
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;
   charset=UTF-8" />
   <link rel="stylesheet" href="../main.css">
	<title>Confirmation Page</title>
</head>
<!--
  		Aziz, Shekib
      jadrn004
      Project #3
      Fall 2017
-->
<body>
    <h1 class='confirmationh1'>You have registered successfully with the following record</h1>
    <table class='confirmationTable'>
        <tr>
            <th>Field Name</th>
            <th>Value(s)</th>
        </tr>

<?php
if (!empty($_POST)) {
	foreach ($_POST as $key => $value) {
		if (get_magic_quotes_gpc()) 
			$value=stripslashes($value);
		if (is_array($value)) {       		
				print "<tr><td><code>$key</code></td><td>";
				//foreach ($entry as $value) {
                for($i=0; $i < count($value); $i++) {
				print "<i>$value[$i]</i><br />";
				}
				print "</td></tr>";
				} 
		else {
				print "<tr><td><code>$key</code></td><td><i>$value</i></td></tr>\n";
			} 
	} // end foreach
} // end else
else if(!empty($_GET)) {
	foreach ($_GET as $key => $value) {
		if (get_magic_quotes_gpc()) 
			$value=stripslashes($value);
		if (is_array($value)) {       		
				print "<tr><td><code>$key</code></td><td>";
				//foreach ($entry as $value) {
                for($i=0; $i < count($value); $i++) {
				print "<i>$value[$i]</i><br />";
				}
				print "</td></tr>";
				} 
		else {
				print "<tr><td><code>$key</code></td><td><i>$value</i></td></tr>\n";
			} 
	} // end foreach
} // end else
else {
	print "No data was submitted.";
	} 

?>
</table>
<?php
print '<p />';
//print "The information on this request is: <br />";
//foreach($_SERVER as $key => $value) {
//	print "$key  &nbsp;&nbsp; $value";
//	print "<br />\n"; 
//	}
?>
</body>
</html>