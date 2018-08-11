<?php
// Connect to the database
include('session.php');
require_once( 'connect.php' );


// Get the form data
$username = $_POST['username'];
$password = $_POST['password'];
 
// Selecting the tutors username, salt and hashed password details
$statement = mysqli_prepare( $link, "SELECT username, hash, salt, firstname 
                                     FROM tutors 
                                     WHERE username=?" );
if( $statement ) {
    
    // Bind in the supplied username and run the statement 
    mysqli_stmt_bind_param( $statement, 's', $username );
    mysqli_stmt_execute( $statement );
    mysqli_stmt_bind_result( $statement, $user, $hash, $salt, $firstname );
    
    // Get the matching record (if any)
    if( mysqli_stmt_fetch( $statement ) ) {
    
        // User account exists, so check password hash matches...
        if( hash( 'sha256', $password.$salt ) == $hash ) {
            
            // Password hashes match. Store the session information
            $_SESSION['id'] = $user;
            $_SESSION['name'] = $firstname;
            
            // Link to the tutors details page
            header( 'refresh:0;url=form-tutor-details.php' );
        }
        else {
            // Incorrect password... try again
            header( 'refresh:0;url=form-logon.php' );
        }
    }
    else {
        // No user account exists. Invalid login... try again
        header( 'refresh:0;url=form-logon.php' );
    }

    // Close the prepared statement.
    mysqli_stmt_close( $statement );
}

// Close the database connection
mysqli_close( $link );
?>