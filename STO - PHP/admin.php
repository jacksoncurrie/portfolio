<?php
include('session.php');
/*
 * Admins username that allows for only them to access this page
 * or else they will be sent to the login page.
 */
if( $_SESSION['id'] != 'jc13342' ) {
    header( 'location:form-logon.php' );
}
include 'connect.php';
// Query grabs just ID and name of all users
$query = 'SELECT username, firstname, surname
          FROM tutors
          ORDER BY firstname ASC';
include('common-top.php');
?>
</head>
<!--
admin.php

Lists all the tutors with option to remove their profile, for only the admin user.
-->
<body>
    <?php include 'header.php' ?>
    <!-- Links to remove session at top -->
    <a class="logout" href="do-logout.php">Logout</a>
    <!-- Links to go back to the previous page (form-tutor-details.php) at top -->
    <a class="admin-back back" href="form-tutor-details.php">Back</a>
    <main>
        <h1 class="page-heading">Admin Control</h1>
        <?php
        // Outputting all the tutor profiles
        $result = mysqli_query($link,$query);
        while($record = mysqli_fetch_array($result))
        {
            echo(
                // Adds tutors name, and link to remove them from the database
                '<div class="subject">
                    <h2 class="subheading tutor-name">'.$record['firstname'].' '.$record['surname'].'</h2>
                    <a class="remove" href="do-remove-tutor.php?code='.$record['username'].'">Remove</a>
                </div>'
            );
        }
        mysqli_close($link);
        ?>
    </main>
</body>
</html>