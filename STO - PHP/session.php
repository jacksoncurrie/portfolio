<?php
// Creating session in database
session_name( 'tutor' );
session_start();
if( isset( $_SESSION['id'] ) ) {
    // Setting an id and a name
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    // Allowing system to know a user is logged in
    $logged_in = true;
}
else {
    $logged_in = false;
}
?>