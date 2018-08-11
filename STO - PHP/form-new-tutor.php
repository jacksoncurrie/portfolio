<?php include('common-top.php') ?>
    <!-- Validation scripts (js) -->
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/parsley.min.js"></script>
</head>
<body>
    <?php include 'header.php' ?>
    <!-- link back to login -->
    <a class="back" href="form-logon.php" >Back</a>
    <main>
        <h1 class="page-heading">My details are...</h1>
        
        <!-- Register form -->
        <form method="post" action="do-add-tutor.php" data-parsley-validate>
            <!-- User credential details -->
            <input name="username"
                   type="text"
                   placeholder="Username"
                   class="personal-info text-field"
                   data-parsley-minlength="2"
                   data-parsley-maxlength="20"
                   data-parsley-required><br>

            <input name="password"
                   type="password"
                   placeholder="Password"
                   class="personal-info text-field"
                   data-parsley-minlength="8"
                   data-parsley-maxlength="30"
                   data-parsley-required><br>

            <input name="firstname"
                   type="text"
                   placeholder="First Name"
                   class="personal-info text-field"
                   data-parsley-minlength="2"
                   data-parsley-maxlength="20"
                   data-parsley-required><br>
            
            <input name="surname"
                   type="text"
                   placeholder="Surname"
                   class="personal-info text-field"
                   data-parsley-minlength="2"
                   data-parsley-maxlength="20"
                   data-parsley-required><br>
            
            <input name="age"
                   type="number"
                   placeholder=" Age"
                   class="personal-info text-field"
                   data-parsley-required
                   data-parsley-maxlength="3"><br>
            
            <textarea name="description"
                      placeholder="Description"
                      class="personal-info text-field"
                      data-parsley-minlength="2"
                      data-parsley-maxlength="500"
                      data-parsley-required></textarea><br>
                      
            <textarea name="image"
                      placeholder="Image Link"
                      class="personal-info text-field"
                      data-parsley-minlength="2"
                      data-parsley-maxlength="300"
                      data-parsley-required></textarea><br>
            
            <input name="email"
                   type="email"
                   placeholder="Email"
                   class="personal-info text-field"
                   data-parsley-required>
            
            <!-- Subjects the user teaches with descriptions about how high they can teach it -->
            <div id="checkboxes">
                <h2 class="subheading" >I can teach...</h2>
                
                <input type="checkbox"
                       id="mat"
                       class="check"
                       name="subject[]"
                       value="mat"
                       data-parsley-required
                       data-parsley-required-message="Must select at least one subject."><br>
                <label for="mat" class="checkbox">Maths</label><br>
                <input type="text"
                       name="mat"
                       class="subject-level text-field"
                       placeholder="How high can you teach this?"
                       data-parsley-minlength="2"
                       data-parsley-maxlength="20"><br>
                
                <input type="checkbox"
                       id="eng"
                       class="check"
                       name="subject[]"
                       value="eng"><br>
                <label for="eng" class="checkbox">English</label><br>
                <input type="text"
                       name="eng"
                       class="subject-level text-field"
                       placeholder="How high can you teach this?"
                       data-parsley-minlength="2"
                       data-parsley-maxlength="20"><br>
                
                <input type="checkbox"
                       id="dte"
                       class="check"
                       name="subject[]"
                       value="dte"><br>
                <label for="dte" class="checkbox">Digital Technologies</label><br>
                <input type="text"
                       name="dte"
                       class="subject-level text-field"
                       placeholder="How high can you teach this?"
                       data-parsley-minlength="2"
                       data-parsley-maxlength="20"><br>
                
                <input type="checkbox"
                       id="sci"
                       class="check"
                       name="subject[]"
                       value="sci"><br>
                <label for="sci" class="checkbox">Science</label><br>
                <input type="text"
                       name="sci"
                       class="subject-level text-field"
                       placeholder="How high can you teach this?"
                       data-parsley-minlength="2"
                       data-parsley-maxlength="20"><br>
                
                <input type="checkbox"
                       id="phe"
                       class="check"
                       name="subject[]"
                       value="phe"><br>
                <label for="phe" class="checkbox">Physical Education</label><br>
                <input type="text"
                       name="phe"
                       class="subject-level text-field"
                       placeholder="How high can you teach this?"
                       data-parsley-minlength="2"
                       data-parsley-maxlength="20"><br>
                
                <input type="checkbox"
                       id="his"
                       class="check"
                       name="subject[]"
                       value="his"><br>
                <label for="his" class="checkbox">History</label><br>
                <input type="text"
                       name="his"
                       class="subject-level text-field"
                       placeholder="How high can you teach this?"
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