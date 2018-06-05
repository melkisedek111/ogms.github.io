<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/helpers.inc.php'; ?>
<!doctype html>
<html lang="en">

<head>

    <!-- CSS AND META CONTENT -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/css.inc.php'; ?>
    


</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Creative Tim
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href=".">
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
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-header" data-background-color="<?php htmlout($sidebardcolor); ?>">

                                    <h4 class="title">Student Profile</h4>
                                    <p class="category">Complete Details of Student</p>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-profile">
                                                <div class="">
                                                    <a href="#pablo">
                                                        <img class="img img-circle" style="width:250px;height: 250px;" src="../student/student_images/<?php htmlout($studentImage); ?>" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h6 class="category text-gray">User / Admin</h6>
                                                    <h3 class="card-title"><strong><?php htmlout($studentFirstName); ?> <?php htmlout(substr($studentMiddleName,0,1)); ?>. <?php htmlout($studentLastName); ?></strong></h3>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <p class="text-right">Full Name:</p>
                                                            <p class="text-right">Student Number:</p>
                                                            <p class="text-right">Birth Date:</p>
                                                            <p class="text-right">Address:</p>
                                                            <p class="text-right">Contact No.:</p>
                                                            <p class="text-right">Sex:</p>
                                                            <p class="text-right">Guardian Name:</p>
                                                            <p class="text-right">Guardian Address:</p>
                                                            <p class="text-right">Guardian Contact No.:</p>
                                                            <p class="text-right">Social Media:</p>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <p class="text-left"><strong><?php htmlout($studentFirstName); ?> <?php htmlout(substr($studentMiddleName,0,1)); ?>. <?php htmlout($studentLastName); ?></strong></p>
                                                            <p class="text-left"><strong><?php htmlout($studentNumber); ?></strong></p>
                                                            <p class="text-left"><strong><?php htmlout($studentBirthdate); ?></strong></p>
                                                            <p class="text-left"><strong><?php htmlout($studentAddress); ?></strong></p>
                                                            <p class="text-left"><strong><?php htmlout($studentContact); ?></strong></p>
                                                            <p class="text-left"><strong><?php htmlout($studentSex); ?></strong></p>
                                                            <p class="text-left"><strong><?php htmlout($studentGuardianName); ?></strong></p>
                                                            <p class="text-left"><strong><?php htmlout($studentGuardianAddress); ?></strong></p>
                                                            <p class="text-left"><strong><?php htmlout($studentGuardianContact); ?></strong></p>
                                                        <div class="text-left">
                                                
                                                            <span>
                                                                <a href="#" ><i class="fab fa-facebook fa-2x" aria-hidden></i> </a>
                                                            </span>
                                                            <span>
                                                                <a href="#" ><i class="fab fa-twitter fa-2x" aria-hidden></i> </a>
                                                            </span>
                                                            <span>
                                                                <a href="#" ><i class="fab fa-instagram fa-2x" aria-hidden></i> </a>
                                                            </span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

<script>
    $(document).ready( function () {
        $('#admin_table').DataTable();
    } );
</script>

<script>
function goBack() {
    window.history.back();
}
</script>
</html>