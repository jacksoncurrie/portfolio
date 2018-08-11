<?php
// Connect to database
require_once('connect.php');
// Get all the data from the update page
$username = $_GET['id'];
$firstname = $_POST['firstname'];
$surname = $_POST['surname'];
$age = $_POST['age'];
$desc = $_POST['description'];
$email = $_POST['email'];
$image = $_POST['image'];
$subject = $_POST['subject'];
// Strip html tags
$firstname = strip_tags($firstname);
$surname = strip_tags($surname);
$desc = strip_tags($desc);

// Update tutors details query
$statement = mysqli_prepare($link, "UPDATE tutors
                                    SET firstname=?, surname=?, age=?, description=?, image=?, email=?
                                    WHERE username=?");

if($statement) {
    // Bind values to query
    mysqli_stmt_bind_param($statement, "sssssss", $firstname, 
                                                  $surname, 
                                                  $age, 
                                                  $desc,
                                                  $image,
                                                  $email,
                                                  $username);
    // run query
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
}
// Create new query, to remove all subjects the tutor teaches
$query = "DELETE FROM teaches
              WHERE username='".$username."'";
    
$result = mysqli_query( $link, $query ) or die( mysqli_error($link) );

// Looping around to re-add all subjects they have selected
for($value = 0; $value < count($subject); $value++) {
    
    // Adding subject query
    $statement2 = mysqli_prepare($link, "INSERT INTO teaches
                                         (username, subject_code, max_level) 
                                         VALUES (?, ?, ?)");
    
    if($statement2) {
            
        mysqli_stmt_bind_param($statement2, "sss", $username,
                                                   $subject[$value],
                                                   $_POST[$subject[$value]]);
        
        mysqli_stmt_execute($statement2);
        mysqli_stmt_close($statement2);
    }
}
// When complete, link back to home page
header('refresh:0;url=index.php');

mysqli_close($link);
?>