<?php
    include('common-top.php');
    // Get subject last specified
    $subject = $_GET['subject'];
    // Connect to database
    include 'connect.php';
    // Query to get all tutors information, with the subjects that they teach
    $query = 'SELECT tutors.username,
                     tutors.firstname,
                     tutors.surname,
                     tutors.age,
                     teaches.subject_code,
                     teaches.max_level,
                     subjects.code,
                     subjects.name
             FROM tutors
 
             INNER JOIN teaches
             ON tutors.username = teaches.username
             
             INNER JOIN subjects
             ON teaches.subject_code = subjects.code
 
             WHERE teaches.subject_code = ?
 
             ORDER BY tutors.firstname ASC';
    
?>
</head>
<body>
    <?php include 'header.php' ?>
    <!-- Link back to subjects page -->
    <a class="back" href="list-subjects.php">Back</a>
    <main>
        <?php
        $statement = mysqli_prepare($link, $query);
        if($statement) 
        {
            // Run query, and bind result to the variables
            mysqli_stmt_bind_param($statement, "s", $subject);
            mysqli_stmt_execute($statement);
            mysqli_stmt_bind_result($statement, $username, $firstname, $surname, $age, $subject_code, $max_level, $subject_code, $subject_name);
            
            $first_run = true;
            
            // Loop the query untill all tutors are displayed
            while(mysqli_stmt_fetch($statement)) 
            {
                // Run for the first query, just to get subject to only output once at the top
                if($first_run){
                    echo('<h1 class="page-heading subject-heading">I want '.$subject_name.' tutoring by...</h1>');
                    $first_run = false;
                }
                // For all of the results output the tutors to the screen
                echo(
                    '<a class="nav list" href="tutor.php?tutor='.$username.'&subject='.$subject.'">
                        <p>'.$firstname.' '.$surname.', '.$age.'.</p>');
                if($max_level != "")
                {
                    echo('<p>Can teach up to '.$max_level.'.</p>');
                }
                echo('</a>');
            }
        }
        mysqli_close($link);
        ?>
    </main>
</body>
</html>