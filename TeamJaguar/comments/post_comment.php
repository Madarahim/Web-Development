<?php
require('Persistence.php');

$db = new Persistence();
if( $db->add_comment($_POST) ) {
  header( 'Location: bbqExample.php' );
}
else {
  header( 'Location: bbqexample.php?error=Your comment was not posted due to errors in your form submission' );
}
?>