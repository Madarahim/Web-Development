<?php
include 'config.php';
/* set a query for inserting records */
$sqlQuery = "Delete from tblcomment where DATEPOSTED ='".$_POST['DATEPOSTED']."'";
/* execute the query */
$result = mysql_query($sqlQuery) or die(mysql_error());
/* checking if the query has successfully executed. */
if ($result==1) {
 /* set a query for retrieving the data .*/ 
 $sqlQuery = "SELECT * FROM `tblcomment` order by ID asc"; 
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
 echo '<div>';
 echo '<button class="btn btn-primary btn-sm" id="delete" name="'.$row['DATEPOSTED'].'" type="submit">Delete Comment</button>';
 echo '</div>';
 echo '</div>'; 
 } 
}

?>