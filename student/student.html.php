<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/helpers.inc.php'; ?>
<!doctype html>
<html lang="en">

<head>

    <!-- CSS AND META CONTENT -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/css.inc.php'; ?>

</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="orange" data-image="../assets/img/sidebar-1.jpg">
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
                    <li class="active">
                        <a href="./user.html">
                            <i class="material-icons">person</i>
                            <p>Student Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="?addstudent">
                            <i class="material-icons">person_add</i>
                            <p>Add Student</p>
                        </a>
                    </li>
                    <li>
                        <a href="?editstudent">
                            <i class="material-icons">mode_edit</i>
                            <p>Edit Student</p>
                        </a>
                    </li>
                    <li>
                        <a href="?deletestudent">
                            <i class="material-icons">delete_sweep</i>
                            <p>Delete Student</p>
                        </a>
                    </li>
                    <li>
                        <a href="../dashboard/">
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
                                <div class="card-header" data-background-color="orange">

                                    <h4 class="title">Student List</h4>
                                    <p class="category">Complete list of Students</p>
                                </div>
                                <div class="card-content">
                                    <table class="table" id="student_table">
                                        <thead>
                                            <tr>
                                                <th>
                                                Student Number
                                                </th>
                                                <th>
                                                Image
                                                </th>
                                                <th>
                                                First Name
                                                </th>
                                                <th>
                                                Middle Name
                                                </th>
                                                <th>
                                                Lastname
                                                </th>
                                                <th>
                                                Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($student_details)): ?>
                                        <?php foreach($student_details as $student_detail): ?>
                                            <tr>
                                                <td>
                                                <?php htmlout($student_detail['student_number']); ?>
                                                </td>
                                                <td>
                                                <img src="student_images/<?php htmlout($student_detail['student_image']); ?>" style="width:65px; height:65px" class="img-rounded img-responsive">
                                                </td>
                                                <td>
                                                <?php htmlout($student_detail['student_firstname']); ?>
                                                </td>
                                                <td>
                                                <?php htmlout($student_detail['student_middlename']); ?>
                                                </td>
                                                <td>
                                                <?php htmlout($student_detail['student_lastname']); ?>
                                                </td>
                                                <td style="width: 60px;">
                                                    <form action="" method="post">
                                                        <input type="hidden" name="viewid" value="<?php htmlout($student_detail['id']); ?>">
                                                        <input type="submit" name="viewaction" class="btn btn-primary" value="View">
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
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
        $('#student_table').DataTable();
    } );
</script>
</html>