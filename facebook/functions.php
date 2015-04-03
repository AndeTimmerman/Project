<?php
require 'dbconfig.php';
function checkuser($fuid,$ffname,$femail){
    $check = mysql_query("SELECT * FROM bezoeker WHERE bezoeker_facebookid='$fuid'");
	$check = mysql_num_rows($check);
	if (empty($check)){ // if new user . Insert a new record		
        $query = "INSERT INTO bezoeker (bezoeker_facebookid,bezoeker_naam,bezoeker_email) VALUES ('$fuid', '$ffname', '$femail')";
        mysql_query($query);	
	} else{   // If Returned user . update the user record		
        $query = "UPDATE bezoeker SET bezoeker_naam='$ffname', bezoeker_email='$femail' WHERE bezoeker_facebookid='$fuid'";
        mysql_query($query);
	}
}?>
