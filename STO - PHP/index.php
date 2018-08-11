<?php
include('session.php');
include('common-top.php');
?>
</head>
<!--
index.php

Home screen and starting point of the website. Used to branch off
tutors from students. 
-->
<body>
    <?php include('header.php') ?>
    <main>
        <!-- Basic structure of navigation under easy to understand heading -->
        <h1 class="page-heading">I'm a...</h1>
        <a class="nav links" id="students" href="list-subjects.php">Student</a>
        <?php
        // Checking login from session.php, which will change the page they link to.
        if(!$logged_in)
        {
            // Link to login page.
            echo('<a class="nav links" id="tutors" href="form-logon.php">Tutor</a>');
        } else {
            // Link to their details page
            echo('<a class="nav links" id="tutors" href="form-tutor-details.php">Tutor</a>');
        }
        ?>
        <!-- About the website content -->
        <p id="study">
            <img alt="study" src="images/study.jpg" id="study-img">
            Student Tutoring Organisation (STO) is all about connecting the best student tutors with other students looking to be tutored. We have a range of subjects, and many tutors in each subject for students to find the tutor that best fits their needs.
        </p>
    </main>
</body>
</html>