<?php
$server = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'eventshare';
$con = mysql_connect($server, $dbuser, $dbpass);
if (isset($con)) {
 # code...
 $dbSelect = mysql_select_db($dbname);
 if (!$dbSelect) {
 echo "Problem in selecting database! Please contact administraator";
 die(mysql_error());
 }
} else {
 echo "Problem in database connection! Please contact administraator";
 die(mysql_error());
}
?>