<?php
include('session.php');
/*
 * Admins username that allows for only them to access this page
 * or else they will be sent to the login page.
 */
if( $_SESSION['id'] != 'jc13342' ) {
    header( 'location:form-logon.php' );
}
/*
 * do-remove-tutor.php
 *
 * From admin page, used to remove the tutor.
 */
// Connect to database
require_once('connect.php');
// Get the users code
$code = $_GET['code'];

// Query that removes specific tutor
$query = "DELETE FROM tutors
          WHERE username='".$code."'"; 

// Run query
$result = mysqli_query( $link, $query ) or die( mysqli_error($link) );

// Query that removes subjects they teach
$query = "DELETE FROM teaches
          WHERE username='".$code."'";

// Run query
$result = mysqli_query( $link, $query ) or die( mysqli_error($link) ); 

mysqli_close( $link );

// Go back to admin page
header('location:admin.php');
?>