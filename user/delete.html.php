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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="<?php htmlout($sidebardcolor); ?>">

                                    <h4 class="title">Users List</h4>
                                    <p class="category">Complete list of users</p>
                                </div>
                                <div class="card-content">
                                
                                    <table class="table" id="admin_table">
                                        <thead>
                                            <tr>
                                                <th>
                                                ID
                                                </th>
                                                <th>
                                                Image
                                                </th>
                                                <th>
                                                Name
                                                </th>
                                                <th>
                                                Userlevel
                                                </th>
                                                <th>
                                                Username
                                                </th>
                                                <th>
                                                Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($admin_details)): ?>
                                        <?php foreach($admin_details as $admin_detail): ?>
                                            <tr>
                                                <td>
                                                <?php htmlout($admin_detail['id']); ?>
                                                </td>
                                                <td>
                                                <img src="images/<?php htmlout($admin_detail['admin_image']); ?>" style="width:65px; height:65px" class="img-rounded img-responsive">
                                                </td>
                                                <td>
                                                <?php htmlout($admin_detail['admin_firstname'] . ' ' . $admin_detail['admin_lastname']); ?>
                                                </td>
                                                <td>
                                                <?php htmlout($admin_detail['admin_userlevel']); ?>
                                                </td>
                                                <td>
                                                <?php htmlout($admin_detail['admin_username']); ?>
                                                </td>
                                                <td style="width: 60px;">
                                                <form action="?deleteuserdetails" method="post">
                                                    <input type="hidden" name="deleteid" value="<?php echo $admin_detail['id']; ?>">
                                                    <input type="submit" name="action" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure to delete this record!');">
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
        $('#admin_table').DataTable();
    } );
</script>
</html>