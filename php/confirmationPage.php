<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;
   charset=UTF-8" />
   <link rel="stylesheet" href="main.css">
	<title>Confirmation Page</title>
<!--	Bellow this point clean up code-->

<style>
h1 { text-align: center; color:goldenrod;}
table { border: solid 2px black; padding: 10px; margin-left: auto; margin-right: auto; }
td { border: solid 1px black; padding: 5px; background-color: white; }
th { background-color: #CCCCCC; padding: 10px; border: solid 2px black; }
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
</style>

</head>

<body>
    <h1>You have registered successfully with the following record</h1>
    <table>
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