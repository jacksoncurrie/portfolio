<?php
// Get the user currently logged in
include('session.php');
 
// Remove the saved login details from the session
unset( $_SESSION["name"] );
unset( $_SESSION['id']);

// Head back to login page
header( 'refresh:0;url=form-logon.php' );
?>