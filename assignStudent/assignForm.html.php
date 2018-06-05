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
                    <li>
                        <a href="../assignStudent/">
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
                        <form action="" method="post">
                            <div class="card">
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="title"><?php htmlout($title); ?> <strong><?php htmlout($sectionYear . ' - ' . $sectionName); ?></strong></h4>
                                    <p class="category">Complete list of Students</p>
                                </div>
                                <div class="card-content">
                                    <table class="table" id="subject_table">
                                        <thead class="text-success">
                                            <tr>
                                                <th>
                                                Student Number
                                                </th>
                                                <th>
                                                First Name
                                                </th>
                                                <th>
                                                Middle Name
                                                </th>
                                                <th>
                                                Last Name
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
                                                    <?php htmlout($student_detail['student_firstname']); ?>
                                                    </td>
                                                    <td>
                                                    <?php htmlout($student_detail['student_middlename']); ?>
                                                    </td>
                                                    <td>
                                                    <?php htmlout($student_detail['student_lastname']); ?>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label" for="students<?php htmlout($student_detail['id']); ?>">
                                                            <input
                                                            class="form-check-input"
                                                            type="checkbox"
                                                            name="students[]"
                                                            id="students<?php htmlout($student_detail['id']); ?>"
                                                            value="<?php htmlout($student_detail['id']); ?>"
                                                            >
                                                            <?php
                                                                if ($student_detail['selected'])
                                                                {
                                                                    echo ' checked';
                                                                }
                                                            ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer text-right">
                                    <input type="text" name="sectionid" value="<?php htmlout($sectionid); ?>">
                                    <input type="text" name="schoolyear" value="<?php htmlout($schoolyear); ?>" required>
                                    <input type="submit" name="<?php htmlout($actionName); ?>" class="btn btn-<?php htmlout($buttonColor); ?>" value="<?php htmlout($actionValue); ?>" onclick="<?php htmlout($alert); ?>">                                 
                                </div>
                            </div>
                        </form>                                                
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
</html>