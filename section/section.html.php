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
                    <li class="active">
                        <a href="../section/">
                            <i class="material-icons">library_books</i>
                            <p>Section Details</p>
                        </a>
                    </li>
                    <li>
                        <a href="?addsection">
                            <i class="material-icons">playlist_add</i>
                            <p>Add Section</p>
                        </a>
                    </li>
                    <li>
                        <a href="?editsection">
                            <i class="material-icons">mode_edit</i>
                            <p>Edit Section</p>
                        </a>
                    </li>
                    <li>
                        <a href="?deletesection">
                            <i class="material-icons">delete_sweep</i>
                            <p>Delete Section</p>
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
                                <div class="card-header" data-background-color="blue">

                                    <h4 class="title">Section List</h4>
                                    <p class="category">Complete list of Subjects   </p>
                                </div>
                                <div class="card-content">
                                    <table class="table" id="section_table">
                                        <thead>
                                            <tr>
                                                <th>
                                                ID
                                                </th>
                                                <th>
                                                Section Year / Grade
                                                </th>
                                                <th>
                                                Section Name
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($section_details)): ?>
                                        <?php foreach($section_details as $section_detail): ?>
                                            <tr>
                                                <td>
                                                <?php htmlout($section_detail['id']); ?>
                                                </td>
                                                <td>
                                                <strong><?php htmlout($section_detail['section_year']); ?></strong>
                                                </td>
                                                <td>
                                                <strong><?php htmlout($section_detail['section_name']); ?></strong>
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
        $('#section_table').DataTable();
    } );
</script>
</html>