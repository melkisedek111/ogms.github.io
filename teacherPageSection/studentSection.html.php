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
                        <a href="../teacherPageSection/">
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
                                            <div>
                                                <h4 class="title">List of Student of Section <?php htmlout($sectionyear); ?>-<?php htmlout($sectionname); ?></h4>
                                                <p class="category">Complete list of Sections</p>
                                            </div>  
                                    </div>
                                    <div class="card-content">
                                        <table class="table section_table" id="">
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
                                            <?php if(!empty($studentDetails)): ?>
                                                <?php foreach($studentDetails as $studentDetail): ?>
                                                <tr>
                                                    <td>    
                                                    <?php htmlout($studentDetail['student_number']); ?>
                                                    </td>
                                                    <td>
                                                    <?php htmlout($studentDetail['student_firstname']); ?>
                                                    </td>
                                                    <td>
                                                    <?php htmlout($studentDetail['student_middlename']); ?>
                                                    </td>
                                                    <td>
                                                    <?php htmlout($studentDetail['student_lastname']); ?>
                                                    </td>
                                                    <td style="width:250px;">
                                                        <form action="" method="post">
                                                            <input type="submit" class="btn btn-success" name="viewStudent" value="View">
                                                            <input type="hidden" name="studentid" value="<?php htmlout($studentDetail['idStudent']); ?>">
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php endforeach;  ?>
                                                <?php endif; ?> 
                                            </tbody>
                                        </table>
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
        $('.section_table').DataTable();
    } );
</script>
</html>