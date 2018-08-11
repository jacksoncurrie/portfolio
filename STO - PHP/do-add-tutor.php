<?php
// Link database
require_once('connect.php');
// Get all values from inputs
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$surname = $_POST['surname'];
$age = $_POST['age'];
$desc = $_POST['description'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$image = $_POST['image'];

// Stip any html tags on  text input
$firstname = strip_tags($firstname);
$surname = strip_tags($surname);
$desc = strip_tags($desc);

// Generate random salt for more secure passwords
$salt = md5( microtime(true)*100000 );

// Calculate the password hash
$hash = hash( 'sha256', $password.$salt );

// Check username in database for duplicates
$check = mysqli_prepare($link, 'SELECT username
                                FROM tutors
                                WHERE username = ?');

/*
 * If there are duplicates go back to home page.
 * If there isn't duplicates then begin to add user
 */
if($check) {
    mysqli_stmt_bind_param( $check, 's', $username );
    mysqli_stmt_execute( $check );
    mysqli_stmt_bind_result( $check, $user );
    
    // The username already exists
    if( mysqli_stmt_fetch( $check ) ) {
        header('refresh:0;url=index.php');
        mysqli_stmt_close($check);
    // The username does not exist already
    } else {
        mysqli_stmt_close($check);
        // Add user to tutors table query
        $statement = mysqli_prepare($link, 'INSERT INTO tutors
                                            (username, hash, salt, firstname, surname, age, description, image, email)
                                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
        
        // If query works, then add user, with values gathered at the top
        if($statement) {
            mysqli_stmt_bind_param($statement, "sssssssss", $username,
                                                            $hash,
                                                            $salt,
                                                            $firstname, 
                                                            $surname, 
                                                            $age, 
                                                            $desc,
                                                            $image,
                                                            $email);
            // If faliure propt user
            mysqli_stmt_execute($statement)or die("Oh no!!!!");
            mysqli_stmt_close($statement);
        }
        
        // Loops for the number of subjects selected
        for($value = 0; $value < count($subject); $value++) {
            
            // Query for adding subjects
            $statement2 = mysqli_prepare($link, "INSERT INTO teaches
                                                 (username, subject_code, max_level) 
                                                 VALUES (?, ?, ?)");
            
            // If query works, add subject for each loop
            if($statement2) {
                mysqli_stmt_bind_param($statement2, "sss", $username,
                                                           $subject[$value],
                                                           $_POST[$subject[$value]]);
                
                mysqli_stmt_execute($statement2);
                mysqli_stmt_close($statement2);
            }
                
        }
    }
}
mysqli_close($link);
// Once completed, link back to home page
header('refresh:0;url=index.php');
?>