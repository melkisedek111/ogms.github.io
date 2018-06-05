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
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/name.php'; ?>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                        <a href="dashboard.html">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="../user/">
                            <i class="material-icons">person</i>
                            <p>User List</p>
                        </a>
                    </li>
                    <li>
                        <a href="../student/">
                            <i class="material-icons">group</i>
                            <p>Student List</p>
                        </a>
                    </li>
                    <li>
                        <a href="../teacher/">
                            <i class="material-icons">account_box</i>
                            <p>Teacher List</p>
                        </a>
                    </li>
                    <li>
                        <a href="../subject/">
                            <i class="material-icons">library_books</i>
                            <p>Subject List</p>
                        </a>
                    </li>
                    <li>
                        <a href="../section/">
                            <i class="material-icons">domain</i>
                            <p>Section List</p>
                        </a>
                    </li>
                    <li>
                        <a href="../assigning">
                            <i class="material-icons text-gray">content_paste</i>
                            <p>Assigning</p>
                        </a>
                    </li>
                    <li>
                        <a href="../accounts">
                            <i class="material-icons text-gray">contacts</i>
                            <p>Accounts</p>
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
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">group</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Students</p>
                                    <h3 class="title">
                                    <?php 
                                    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
                                    $count = current($pdo->query('SELECT COUNT(*) FROM table_student WHERE student_status = "ACTIVE"')->fetch()); 
                                    if($count > 0) 
                                    {
                                        echo $count;
                                    }
                                    else
                                    {
                                        echo '0';
                                    }
                                    ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">group</i>
                                        List of Students
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">account_box</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Teachers</p>
                                    <h3 class="title">
                                    <?php 
                                    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
                                    $count = current($pdo->query('SELECT COUNT(*) FROM table_teacher WHERE teacher_status = "Active"')->fetch()); 
                                    if($count > 0) 
                                    {
                                        echo $count;
                                    }
                                    else
                                    {
                                        echo '0';
                                    }
                                    ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">account_box</i> List of Teachers
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="red">
                                    <i class="material-icons">library_books</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Subjects</p>
                                    <h3 class="title">
                                    <?php 
                                    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
                                    $count = current($pdo->query('SELECT COUNT(*) FROM table_subject WHERE subject_status = "Active"')->fetch()); 
                                    if($count > 0) 
                                    {
                                        echo $count;
                                    }
                                    else
                                    {
                                        echo '0';
                                    }
                                    ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">local_library</i> List of Subjects
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">home</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Sections</p>
                                    <h3 class="title">
                                    <?php 
                                    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
                                    $count = current($pdo->query('SELECT COUNT(*) FROM table_section WHERE section_status = "Active"')->fetch()); 
                                    if($count > 0) 
                                    {
                                        echo $count;
                                    }
                                    else
                                    {
                                        echo '0';
                                    }
                                    ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">home</i> List of Sections
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="title">Student List</h4>
                                    <p class="category">Basic Information for Student</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover" id="student_table">
                                        <thead class="text-warning">
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Student Number</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>                                            
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($student_details)): ?>
                                        <?php foreach($student_details as $student_detail): ?>
                                            <tr>
                                                <td><?php htmlout($student_detail['id']); ?></td>
                                                <td>
                                                <img src="../student/student_images/<?php htmlout($student_detail['student_image']); ?>" style="width:65px; height:65px" class="img-rounded img-responsive">
                                                </td>
                                                <td><?php htmlout($student_detail['student_number']); ?></td>
                                                <td><?php htmlout($student_detail['student_firstname']); ?></td>
                                                <td><?php htmlout($student_detail['student_lastname']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">Teacher List</h4>
                                    <p class="category">Basic Information for Teacher</p>
                                </div>
                                <div class="card-content table-responsive">
                                <table class="table table-hover" id="teacher_table">
                                        <thead class="text-warning">
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Teacher Number</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>                                            
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($teacher_details)): ?>
                                        <?php foreach($teacher_details as $teacher_detail): ?>
                                            <tr>
                                                <td><?php htmlout($teacher_detail['id']); ?></td>
                                                <td>
                                                <img src="../teacher/teacher_images/<?php htmlout($teacher_detail['teacher_image']); ?>" style="width:65px; height:65px" class="img-rounded img-responsive">
                                                </td>
                                                <td><?php htmlout($teacher_detail['teacher_number']); ?></td>
                                                <td><?php htmlout($teacher_detail['teacher_firstname']); ?></td>
                                                <td><?php htmlout($teacher_detail['teacher_lastname']); ?></td>
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
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Subject List</h4>
                                    <p class="category">Complete list of Subjects</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover" id="subject_table">
                                        <thead class="text-warning">
                                            <th>
                                            ID
                                            </th>
                                            <th>
                                            Subject Code
                                            </th>
                                            <th>
                                            Subject Title
                                            </th>
                                            <th>
                                            Subject Description
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($subject_details)): ?>
                                            <?php foreach($subject_details as $subject_detail): ?>
                                                <tr>
                                                    <td>
                                                    <?php htmlout($subject_detail['id']); ?>
                                                    </td>
                                                    <td>
                                                    <?php htmlout($subject_detail['subject_code']); ?>
                                                    </td>
                                                    <td>
                                                    <?php htmlout($subject_detail['subject_title']); ?>
                                                    </td>
                                                    <td style="width: 600px;">
                                                    <?php htmlout($subject_detail['subject_description']); ?>
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
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title">Employees Stats</h4>
                                    <p class="category">New employees on 15th September, 2016</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover" id="section_table">
                                        <thead class="text-warning">
                                            <th>ID</th>
                                            <th>Section Year</th>
                                            <th>Section Name</th>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($section_details)): ?>
                                        <?php foreach($section_details as $section_detail): ?>
                                            <tr>
                                                <td>
                                                <?php htmlout($section_detail['id']); ?>
                                                </td>
                                                <td>
                                                <?php htmlout($section_detail['section_year']); ?>
                                                </td>
                                                <td>
                                                <?php htmlout($section_detail['section_name']); ?>
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
<script>
    $(document).ready( function () {
        $('#teacher_table').DataTable();
    } );
</script>
<script>
    $(document).ready( function () {
        $('#subject_table').DataTable();
    } );
</script>
<script>
    $(document).ready( function () {
        $('#section_table').DataTable();
    } );
</script>
</html>