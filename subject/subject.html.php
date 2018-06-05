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
                    <li class="active">
                        <a href="../subject">
                            <i class="material-icons">library_books</i>
                            <p>Subject Details</p>
                        </a>
                    </li>
                    <li>
                        <a href="?addsubject">
                            <i class="material-icons">playlist_add</i>
                            <p>Add Subject</p>
                        </a>
                    </li>
                    <li>
                        <a href="?editsubject">
                            <i class="material-icons">mode_edit</i>
                            <p>Edit Subject</p>
                        </a>
                    </li>
                    <li>
                        <a href="?deletesubject">
                            <i class="material-icons">delete_sweep</i>
                            <p>Delete Subject</p>
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

                                    <h4 class="title">Subject List</h4>
                                    <p class="category">Complete list of Subjects   </p>
                                </div>
                                <div class="card-content">
                                    <table class="table" id="subject_table">
                                        <thead>
                                            <tr>
                                                <th>
                                                ID
                                                </th>
                                                <th>
                                                Subject Code
                                                </th>
                                                <th>
                                                Subject Title
                                                </th>
                                                <th style="width: 600px;">
                                                Subject Description
                                                </th>
                                            </tr>
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
                                                <td>
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