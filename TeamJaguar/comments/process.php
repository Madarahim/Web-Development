<?php
include 'config.php';
/* set a query for inserting records */
$sqlQuery = "INSERT INTO `tblcomment` (`PERSON`, `COMMENT`, `DATEPOSTED`) 
VALUES ('".$_POST['NAME']."','".$_POST['COMMENT']."',Now())";
/* execute the query */
$result = mysql_query($sqlQuery) or die(mysql_error());
/* checking if the query has successfully executed. */
if ($result==1) {
 /* set a query for retrieving the data .*/ 
 $sqlQuery = "SELECT * FROM `tblcomment` order by ID desc"; 
 /* execute the query */
 $result = mysql_query($sqlQuery) or die(mysql_error());
 /* loop the executed query */
 while ($row = mysql_fetch_array($result)) {

 echo '<div class="panel panel-primary">'; 
 echo '<div class="panel-heading"><span class="glyphicon glyphicon-user"> </span> Posted by : ' . $row['PERSON'].'</div>';
 echo '<div class="panel-body">';
 echo $row['COMMENT'];
 echo '</div>';
 echo '<div class="panel-footer">';
 echo 'Date Posted:' . $row['DATEPOSTED'];
 echo '</div>';
 echo '</div>'; 
 } 
}
?>