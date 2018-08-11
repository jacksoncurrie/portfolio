<?php include 'common-top.php' ?>
    <!-- Validation scripts (js) -->
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/parsley.min.js"></script>
</head>
<body>
    <?php include 'header.php' ?>
    <main>
        <h1 class="page-heading">My login details are...</h1>
        <!-- Login Form -->
        <form method="post" action="do-login.php" data-parsley-validate>
            <input name="username"
                   class="text-field login"
                   type="text"
                   placeholder="Username"
                   data-parsley-required><br>
            
            <input name="password"
                   class="text-field login"
                   type="password"
                   placeholder="Password"
                   data-parsley-required><br>
            
            <input type="submit"
                   class="button"
                   value="Login">
        </form>
        <!-- Link to register -->
        <a class="register" href="form-new-tutor.php">I don't have an account.</a>
    </main>
</body>
</html>