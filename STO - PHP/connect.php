<?php
    // Define the server and database details
    $host = "localhost";
    $user = "jc13342_db";
    $password = "c*N";
    $dbname = "jc13342_tutoring";

    // Attempt to connect
    $link = mysqli_connect($host,$user,$password,$dbname)
        // If cannot connect, promt user
        or die("Couldn't connect to server.");
?>