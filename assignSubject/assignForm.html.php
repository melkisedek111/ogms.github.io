<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/helpers.inc.php'; ?>
<!doctype html>
<html lang="en">

<head>

    <!-- CSS AND META CONTENT -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/css.inc.php'; ?>

</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="red" data-image="../assets/img/sidebar-1.jpg">
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
                        <a href="../assignSubject/">
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
                                    <h4 class="title"><?php htmlout($title); ?> <strong><?php htmlout($teacher_firstname . ' ' . $teacher_middlename . ' ' . $teacher_lastname); ?></strong> for School Year <strong><?php htmlout($schoolyear); ?></strong></h4>
                                    <p class="category">Complete list of Subjects   </p>
                                </div>
                                <div class="card-content">
                                    <table class="table" id="subject_table">
                                        <thead class="text-success">
                                            <tr>
                                                <th>
                                                Subject Code
                                                </th>
                                                <th>
                                                Subject Title
                                                </th>
                                                <th>
                                                Subject Description
                                                </th>
                                                <th>
                                                Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($subject_details)): ?>
                                            <?php foreach($subject_details as $subject_detail): ?>
                                                <tr>
                                                    <td>
                                                    <?php htmlout($subject_detail['subject_code']); ?>
                                                    </td>
                                                    <td>
                                                    <?php htmlout($subject_detail['subject_title']); ?>
                                                    </td>
                                                    <td style="width: 700px">
                                                    <?php htmlout($subject_detail['subject_description']); ?>
                                                    </td>
                                                    <td>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="subjectid" value="<?php htmlout($subject_detail['id']); ?>">
                                                        <input type="hidden" name="teacherid" value="<?php htmlout($teacher_id); ?>">
                                                        <input type="hidden" name="schoolyear" value="<?php htmlout($schoolyear); ?>">
                                                        <input type="submit" name="<?php htmlout($actionName); ?>" class="btn btn-<?php htmlout($buttonColor); ?>" value="<?php htmlout($actionValue); ?>" onclick="<?php htmlout($alert); ?>">
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
        $('#subject_table').DataTable();
    } );
</script>
</html>