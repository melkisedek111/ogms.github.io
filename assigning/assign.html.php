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
                <a href="#" class="simple-text">
                Admin Panel
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                        <a href="../assigning/">
                            <i class="material-icons">content_paste</i>
                            <p>Assigning Details</p>
                            
                        </a>
                    </li>
                    <li>
                        <a href="../assignSubject/">
                            <i class="material-icons">library_books</i>
                            <p>Subject Assigning</p>
                            
                        </a>
                    </li>
                    <li>
                        <a href="../assignTeacher">
                            <i class="material-icons">account_box</i>
                            <p>Teacher Assigning</p>
                        </a>
                    </li>
                    <li>
                        <a href="../assignStudent/">
                            <i class="material-icons">group</i>
                            <p>Student Assigning</p>
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
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Assigned Subject Teacher List</h4>
                                    <p class="category">Complete list of Assigned Subjects</p>
                                </div>
                                <div class="card-content">
                                    <table class="table" id="subject_table">
                                        <thead class="text-danger">
                                            <tr>
                                                <th>
                                                Subject Code
                                                </th>
                                                <th>
                                                Subject Title
                                                </th>
                                                <th>
                                                Teacher Name
                                                </th>
                                                <th>
                                                School Year
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($assignSubjects)): ?>
                                        <?php foreach($assignSubjects as $assignSubject): ?>
                                            <tr>
                                                <td>
                                                <?php htmlout($assignSubject['subject_code']); ?>
                                                </td>
                                                <td>
                                                <?php htmlout($assignSubject['subject_title']); ?>
                                                </td>
                                                <td>
                                                <strong><?php htmlout($assignSubject['teacher_firstname'] . ' ' . substr($assignSubject['teacher_middlename'],0,1) . '. ' . $assignSubject['teacher_lastname']); ?></strong>
                                                </td>
                                                <td>
                                                    <?php htmlout($assignSubject['schoolyear']); ?>
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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">

                                    <h4 class="title">Assigned Teacher Section List</h4>
                                    <p class="category">Complete list of Assigned Teacher</p>
                                </div>
                                <div class="card-content">
                                    <table class="table" id="teacherSectionTable">
                                        <thead class="text-info">
                                            <tr>
                                                <th>
                                                Section Year / Grade
                                                </th>
                                                <th>
                                                Section Name
                                                </th>
                                                <th>
                                                Assigned Teacher
                                                </th>
                                                <th>
                                                School Year
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($assignTeachers)): ?>
                                        <?php foreach($assignTeachers as $assignTeacher): ?>
                                            <tr>
                                                <td>
                                                <?php htmlout($assignTeacher['section_year']); ?>
                                                </td>
                                                <td>
                                                <?php htmlout($assignTeacher['section_name']); ?>
                                                </td>
                                                <td>
                                                <strong><?php htmlout($assignTeacher['teacher_firstname'] . ' ' . substr($assignTeacher['teacher_middlename'],0,1) . '. ' . $assignTeacher['teacher_lastname']); ?></strong>
                                                </td>
                                                <td>
                                                <?php htmlout($assignTeacher['schoolyear']); ?>
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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="orange">

                                    <h4 class="title">Assigned Section Student List</h4>
                                    <p class="category">Complete list of Students</p>
                                </div>
                                <div class="card-content">
                                    <table class="table" id="teacher_table">
                                    <thead class="text-warning">
                                            <tr>
                                                <th>
                                                Section Year / Grade
                                                </th>
                                                <th>
                                                Section Name
                                                </th>
                                                <th>
                                                Assigned Teacher
                                                </th>
                                                <th>
                                                School Year
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($assignStudents)): ?>
                                        <?php foreach($assignStudents as $assignStudent): ?>
                                            <tr>
                                                <td>
                                                <?php htmlout($assignStudent['section_year']); ?>
                                                </td>
                                                <td>
                                                <?php htmlout($assignStudent['section_name']); ?>
                                                </td>
                                                <td>
                                                <strong><?php htmlout($assignStudent['student_firstname'] . ' ' . substr($assignStudent['student_middlename'],0,1) . '. ' . $assignStudent['student_lastname']); ?></strong>
                                                </td>
                                                <td>
                                                <?php htmlout($assignStudent['schoolyear']); ?>
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
        $('#subject_table').DataTable();
    } );
</script>
<script>
    $(document).ready( function () {
        $('#teacher_table').DataTable();
    } );
</script>
<script>
    $(document).ready( function () {
        $('#teacherSectionTable').DataTable();
    } );
</script>
</html>