<?php
include 'common-top.php';
include 'connect.php';
// Lists subjects query
$query = 'SELECT code, name
          FROM subjects
          ORDER BY name ASC';
?>
</head>
<body>
    <?php include 'header.php' ?>
    <main>
        <h1 class="page-heading">I want tutoring in...</h1>
        <?php
            // Output all results for the subjects in subject table, with links to their tutors
            $result = mysqli_query($link,$query);
            while($record = mysqli_fetch_array($result))
            {
                echo(
                    '<a class="nav list" href="list-tutors.php?subject='.$record['code'].'">'.$record['name'].'</a>'
                );
            }
            mysqli_close($link);
        ?>
    </main>
</body>
</html>