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
                        <a href="../accounts/">
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

                                    <h4 class="title">User Teacher Account List</h4>
                                    <p class="category">Complete list of Teacher Accounts</p>
                                </div>
                                <div class="card-content">
                                    <table class="table" id="teacherSectionTable">
                                        <thead>
                                            <tr>
                                                <th>
                                                ID
                                                </th>
                                                <th>
                                                Teacher Number
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
                                                Password
                                                </th>
                                                <th>
                                                Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($userTeachers)): ?>
                                        <?php foreach($userTeachers as $userTeacher): ?>
                                            <tr>
                                                <td>
                                                <?php htmlout($userTeacher['id']); ?>
                                                </td>
                                                <td>
                                                <?php htmlout($userTeacher['teacher_number']); ?>
                                                </td>
                                                <td>
                                                <?php htmlout($userTeacher['teacher_firstname']); ?>
                                                </td>
                                                <td>
                                                <?php htmlout($userTeacher['teacher_middlename']); ?>
                                                </td>
                                                <td>
                                                <?php htmlout($userTeacher['teacher_lastname']); ?>
                                                </td>
                                                <td>
                                                <strong><?php htmlout($userTeacher['actualPassword']); ?></strong>
                                                </td>
                                                <td>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="userid" value="<?php htmlout($userTeacher['id']); ?>">
                                                        <input type="submit" name="changePassword" class="btn btn-success" value="Change Password">
                                                        <?php if($userTeacher['user_status'] == 'Activated'):?>
                                                        <input type="submit" name="Deactivated" class="btn btn-danger" value="Deactivate">
                                                        <?php endif; ?>
                                                        <?php if($userTeacher['user_status'] == 'Deactivated'):?>
                                                        <input type="submit" name="Activated" class="btn btn-primary" value="Activate">
                                                        <?php endif; ?>
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