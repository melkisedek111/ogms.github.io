<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/helpers.inc.php'; ?>
<!doctype html>
<html lang="en">

<head>

    <!-- CSS AND META CONTENT -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/css.inc.php'; ?>

</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="green" data-image="../assets/img/sidebar-1.jpg">
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
                        <a href="../teacher/">
                            <i class="material-icons">person</i>
                            <p>Teacher Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="?addteacher">
                            <i class="material-icons">person_add</i>
                            <p>Add Teacher</p>
                        </a>
                    </li>
                    <li>
                        <a href="?editteacher">
                            <i class="material-icons">mode_edit</i>
                            <p>Edit Teacher</p>
                        </a>
                    </li>
                    <li>
                        <a href="?deleteteacher">
                            <i class="material-icons">delete_sweep</i>
                            <p>Delete Teacher</p>
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
                            <?php 
                                if(isset($_GET['status']) == 'Success')
                                {
                                    echo '<div class="alet alert-success">Submit Success</div>';
                                }
                            ?>
                            <div class="card">
                                <div class="card-header" data-background-color="green">

                                    <h4 class="title">Teacher List</h4>
                                    <p class="category">Complete list of Teachers</p>
                                </div>
                                <div class="card-content">
                                    <table class="table" id="student_table">
                                        <thead>
                                            <tr>
                                                <th>
                                                Teacher Number
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($teacher_details)): ?>
                                        <?php foreach($teacher_details as $teacher_detail): ?>
                                            <tr>
                                                <td>
                                                <?php htmlout($teacher_detail['teacher_number']); ?>
                                                </td>
                                                <td>
                                                <img src="teacher_images/<?php htmlout($teacher_detail['teacher_image']); ?>" style="width:65px; height:65px" class="img-rounded img-responsive">
                                                </td>
                                                <td>
                                                <?php htmlout($teacher_detail['teacher_firstname']); ?>
                                                </td>
                                                <td>
                                                <?php htmlout($teacher_detail['teacher_middlename']); ?>
                                                </td>
                                                <td>
                                                <?php htmlout($teacher_detail['teacher_lastname']); ?>
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