<?php
include('common-top.php');
// Get tutor and subbject that has been specified
$tutor = $_GET['tutor'];
$subject = $_GET['subject'];
//Connect to database
include 'connect.php';
// Query to get tutors details displayed to the user
$query = 'SELECT username, firstname, surname, age, description, image, email
          FROM tutors
          WHERE username = ?';
?>
</head>
<body>
    <?php
    include('header.php');
    // Link back with the subject last specified
    echo('<a class="back" href="list-tutors.php?subject='.$subject.'">Back</a>');
    $statement = mysqli_prepare($link, $query);
    if($statement) 
    {
        // Get query result from database
        mysqli_stmt_bind_param($statement, "s", $tutor);
        mysqli_stmt_execute($statement);
        mysqli_stmt_bind_result($statement, $username, $firstname, $surname, $age, $desc, $image, $email);
        mysqli_stmt_fetch($statement);
        // Output all tutors information on the page
        echo(
            '<main>
                <h1 class="page-heading">'.$firstname.' '.$surname.', '.$age.'.</h1>
                <img alt="profile" class="image" src="'.$image.'">
                <p class="desc">'.$desc.'</p>
                <p class="contact">'.$email.'</p>
            </main>'
        );
    }
    mysqli_close($link);
    ?>
</body>
</html>