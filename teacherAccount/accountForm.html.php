<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/helpers.inc.php'; ?>
<!doctype html>
<html lang="en">

<head>

    <!-- CSS AND META CONTENT -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/css.inc.php'; ?>

</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="../assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="#" class="simple-text">
                Admin Panel
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="../teacherAccount/">
                            <i class="material-icons">arrow_back</i>
                            <p>Back</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="main-panel">

        <!-- NAVIGATION -->
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/main_panel.inc.php'; ?>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">Change Password for <strong><?php htmlout($teacherFirstname); ?> <?php htmlout(substr($teacherMiddlename,0,1)); ?>. <?php htmlout($teacherLastname); ?> (<?php htmlout(strtoupper($teacherType)); ?>)</strong></h4>
                                    <p class="category">Change Password for Teacher Account</p>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                    <form action="" method="post">
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">User Password</label>
                                                <input 
                                                        type="password" 
                                                        name="userPassword" 
                                                        id="userPassword"
                                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  
                                                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                                        class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Confirm Password</label>
                                                <input 
                                                        type="password" 
                                                        name="confirmUserPassword"
                                                        id="confirmUserPassword"
                                                        class="form-control" 
                                                        oninvalid="validatePassword(this)"
                                                        required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="hidden" name="userid" value="<?php htmlout($userid); ?>">
                                            <input type="submit" name="passwordChange" class="btn btn-primary" value="Change">
                                        </div>
                                    </form>
                                    <div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Teacher
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Subject
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Student
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Section
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="#">Simple Project Team</a>, made with Perseverance and Hardship for a better web
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>

<!-- JS CONTENT -->
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/js.inc.php'; ?>

<!-- VALIDATION FOR CONFIRM PASSOWRD -->
<script>
    var userPassword = document.getElementById("userPassword")
    , confirmUserPassword = document.getElementById("confirmUserPassword");

    function validatePassword(){
    if(userPassword.value != confirmUserPassword.value) {
        confirmUserPassword.setCustomValidity("Password Don't Match");
    } else {
        confirmUserPassword.setCustomValidity('');
    }
    }

    userPassword.onchange = validatePassword;
    confirmUserPassword.onkeyup = validatePassword;
</script>

</html>