<?php
include('common-top.php');
// Connect to database
include('connect.php');
include('session.php');
// Get logged in details
$id = $_SESSION['id'];
$name = $_SESSION['name'];
// Query to gater all tutors data
$query = 'SELECT teaches.username,
                 teaches.subject_code,
                 teaches.max_level,
                 tutors.username,
                 tutors.firstname,
                 tutors.surname,
                 tutors.age,
                 tutors.description,
                 tutors.image,
                 tutors.email
          FROM teaches
          
          INNER JOIN tutors
          ON teaches.username = tutors.username
          
          WHERE teaches.username = ?';

// Checks for subjects they have previously selected
$dte = false;
$dte_level = "";
$sci = false;
$sci_level = "";
$eng = false;
$eng_level = "";
$mat = false;
$mat_level = "";
$his = false;
$his_level = "";
$phe = false;
$phe_level = "";

$statement = mysqli_prepare($link, $query);
if($statement) 
{
    // Run query to database
    mysqli_stmt_bind_param($statement, "s", $id);
    mysqli_stmt_execute($statement);
    // Get results in variables
    mysqli_stmt_bind_result($statement, $username, $subject, $max_level, $user_code, $firstname, $surname, $age, $desc, $image, $email);
    
    // Loops around for all subject, to check whether they have specified to teach
    while(mysqli_stmt_fetch($statement)) 
    {
        // If they have taught, set it to true, and get their maximum level details
        if($subject == "dte")
        {
            $dte = true;
            $dte_level = $max_level;
        } elseif($subject == "mat")
        {
            $mat = true;
            $mat_level = $max_level;
        } elseif($subject == "eng")
        {
            $eng = true;
            $eng_level = $max_level;
        } elseif($subject == "his")
        {
            $his = true;
            $his_level = $max_level;
        } elseif($subject == "phe")
        {
            $phe = true;
            $phe_level = $max_level;
        } elseif($subject == "sci")
        {
            $sci = true;
            $sci_level = $max_level;
        }
    }
}
mysqli_close($link);
?>
    <!-- Validation scripts (js) -->
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/parsley.min.js"></script>
</head>
<body>
    <?php include('header.php') ?>
    <a class="logout" href="do-logout.php">Logout</a>
    <!-- Allow admin button if admin user is logged in -->
    <?php print $id == 'jc13342' ? '<a class="admin" href="admin.php">Admin</a>' : "" ?>
    <main>
        <?php
        echo('<h1 class="page-heading">'.$name.'\'s details are...</h1>');
        ?>
        
        <!-- Populating form with data gathered from query above -->
        <form method="post" action="do-update-tutor.php?id=<?php echo($username) ?>" data-parsley-validate>
            <!-- Population field -->
            <input name="firstname"
                   type="text"
                   placeholder="First Name"
                   value="<?php echo($firstname) ?>"
                   class="personal-info text-field"
                   data-parsley-minlength="2"
                   data-parsley-maxlength="20"
                   data-parsley-required><br>
            
            <input name="surname"
                   type="text"
                   placeholder="Surname"
                   value="<?php echo($surname) ?>"
                   class="personal-info text-field"
                   data-parsley-minlength="2"
                   data-parsley-maxlength="20"
                   data-parsley-required><br>
            
            <input name="age"
                   type="number"
                   placeholder="Age"
                   value="<?php echo($age) ?>"
                   class="personal-info text-field"
                   data-parsley-required
                   data-parsley-maxlength="3"><br>
            
            <textarea name="description"
                      placeholder="Description"
                      class="personal-info text-field"
                      data-parsley-minlength="2"
                      data-parsley-maxlength="500"
                      data-parsley-required><?php echo($desc) ?></textarea><br>
                      
            <textarea name="image"
                      placeholder="Image Link"
                      class="personal-info text-field"
                      data-parsley-minlength="2"
                      data-parsley-maxlength="300"
                      data-parsley-required><?php echo($image) ?></textarea><br>
            
            <input name="email"
                   type="email"
                   placeholder="Email"
                   value="<?php echo($email) ?>"
                   class="personal-info text-field"
                   data-parsley-required>
            
            <div id="checkboxes">
                <?php
                echo('<h2 class="subheading">'.$name.' can teach...</h2>');
                ?>
                <!-- If value was checked true from above, check the checbox -->
                <input type="checkbox"
                       id="mat"
                       class="check"
                       name="subject[]"
                       value="mat"
                       <?php print $mat ? "checked" : "" ?>
                       data-parsley-required
                       data-parsley-required-message="Must select at least one subject."><br>
                <label for="mat"
                       class="checkbox">Maths</label><br>
                <!-- Populate maximum level field -->
                <input type="text"
                       name="mat"
                       class="subject-level text-field"
                       placeholder="How high can you teach this?"
                       value="<?php echo($mat_level) ?>" 
                       data-parsley-minlength="2"
                       data-parsley-maxlength="20"><br>
                
                <input type="checkbox"
                       id="eng"
                       class="check"
                       name="subject[]"
                       value="eng"
                       <?php print $eng ? "checked" : "" ?>><br>
                <label for="eng" class="checkbox">English</label><br>
                <input type="text"
                       name="eng"
                       class="subject-level text-field"
                       placeholder="How high can you teach this?"
                       value="<?php echo($eng_level) ?>"
                       data-parsley-minlength="2"
                       data-parsley-maxlength="20"><br>
                
                <input type="checkbox"
                       id="dte"
                       class="check"
                       name="subject[]"
                       value="dte"
                       <?php print $dte ? "checked" : "" ?>><br>
                <label for="dte" class="checkbox">Digital Technologies</label><br>
                <input type="text"
                       name="dte"
                       class="subject-level text-field"
                       placeholder="How high can you teach this?"
                       value="<?php echo($dte_level) ?>"
                       data-parsley-minlength="2"
                       data-parsley-maxlength="20"><br>
                
                <input type="checkbox"
                       id="sci"
                       class="check"
                       name="subject[]"
                       value="sci"
                       <?php print $sci ? "checked" : "" ?>><br>
                <label for="sci" class="checkbox">Science</label><br>
                <input type="text"
                       name="sci"
                       class="subject-level text-field"
                       placeholder="How high can you teach this?"
                       value="<?php echo($sci_level) ?>"
                       data-parsley-minlength="2"
                       data-parsley-maxlength="20"><br>
                
                <input type="checkbox"
                       id="phe"
                       class="check"
                       name="subject[]"
                       value="phe"
                       <?php print $phe ? "checked" : "" ?>><br>
                <label for="phe" class="checkbox">Physical Education</label><br>
                <input type="text"
                       name="phe"
                       class="subject-level text-field"
                       placeholder="How high can you teach this?"
                       value="<?php echo($phe_level) ?>"
                       data-parsley-minlength="2"
                       data-parsley-maxlength="20"><br>
                
                <input type="checkbox"
                       id="his"
                       class="check"
                       name="subject[]"
                       value="his"
                       <?php print $his ? "checked" : "" ?>><br>
                <label for="his" class="checkbox">History</label><br>
                <input type="text"
                       name="his"
                       class="subject-level text-field"
                       placeholder="How high can you teach this?"
                       value="<?php echo($his_level) ?>"
                       data-parsley-minlength="2"
                       data-parsley-maxlength="20"><br>
            </div>
            
            <input type="submit"
                   class="button"
                   value="Register Details">
        </form>
    </main>
</body>
</html>