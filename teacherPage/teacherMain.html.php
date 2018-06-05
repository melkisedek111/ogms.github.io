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
                        <a href="../teacherPageSection/">
                            <i class="material-icons">domain</i>
                            <p>Section</p>
                        </a>
                    </li>
                    <li>
                        <a href="../teacherGrading/">
                            <i class="material-icons">vertical_split</i>
                            <p>Set Items</p>
                        </a>
                    </li>
                    <li>
                        <a href="../setGrades/">
                            <i class="material-icons text-gray">subtitles</i>
                            <p>Set Grades</p>
                        </a>
                    </li>
                    <li>
                        <a href="../teacherPost">
                            <i class="material-icons text-gray">view_headline</i>
                            <p>Posts</p>
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
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">group</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Students</p>
                                    <h3 class="title">
                                    <?php 
                                    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
                                    $count = current($pdo->query('SELECT COUNT(*) FROM table_teacher_section
                                    INNER JOIN table_student_section ON table_teacher_section.sectionid = table_student_section.sectionid
                                    INNER JOIN table_student ON table_student.id = table_student_section.studentid
                                    WHERE teacherid = '.$_SESSION['teacherid'].' AND table_teacher_section.schoolyear = '.$_SESSION['schoolyear'].' AND table_student_section.schoolyear = '.$_SESSION['schoolyear'].' AND student_status = "Active"')->fetch()); 
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
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">home</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Sections</p>
                                    <h3 class="title">
                                    <?php 
                                    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
                                    $count = current($pdo->query('SELECT COUNT(*) FROM table_teacher_section
                                    INNER JOIN table_section ON table_section.id = table_teacher_section.sectionid
                                    WHERE teacherid = '.$_SESSION['teacherid'].' AND section_status = "Active"')->fetch()); 
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
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="red">
                                    <i class="material-icons">view_headline</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Posts</p>
                                    <h3 class="title">
                                    <?php 
                                    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
                                    $count = current($pdo->query('SELECT COUNT(*) FROM table_teacher_post
                                    INNER JOIN table_teacher_section ON table_teacher_section.sectionid = table_teacher_post.sectionid AND table_teacher_section.teacherid = table_teacher_post.teacherid
                                    WHERE table_teacher_post.teacherid = '.$_SESSION['teacherid'].' AND table_teacher_section.schoolyear = '.$_SESSION['schoolyear'].' AND table_teacher_post.schoolyear = '.$_SESSION['schoolyear'].'')->fetch()); 
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
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="title">Post List</h4>
                                    <p class="category">Post Details</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover" id="posttable">
                                        <thead class="text-warning">
                                            <th>ID</th>
                                            <th>Section</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Date Created</th>
                                            <th>Action</th>                                            
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($posts)): ?>
                                        <?php foreach($posts as $post): ?>
                                            <tr>
                                                <td><?php htmlout($post['postid']); ?></td>
                                                <td><?php htmlout($post['section_year'].'-'.$post['section_name']); ?></td>
                                                <td><strong><?php htmlout($post['post_title']); ?></strong></td>
                                                <td><?php htmlout($post['post_category']); ?></td>
                                                <td><?php htmlout($post['datecreated']); ?></td>
                                                <td>
                                                <form action="" method="post">
                                                <input type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php htmlout($post['postid']); ?>" value="View Post">                                                
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
                    <div class="row">
                        <div class="col-lg-3 col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title">First Quarter</h4>
                                    <p class="category">First Quarter Final Grades</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover" id="firstquarter">
                                        <thead class="text-warning">
                                            <th>
                                            Student Name
                                            </th>
                                            <th>
                                            Grade
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($firstquarters)): ?>
                                            <?php foreach($firstquarters as $firstquarter): ?>
                                                <tr>
                                                    <td>
                                                    <?php htmlout($firstquarter['student_firstname'] .' '. substr($firstquarter['student_middlename'],0,1).'. '. $firstquarter['student_lastname']); ?>
                                                    </td>
                                                    <td>
                                                    <?php htmlout($firstquarter['finalgrade']); ?>
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
                        <div class="col-lg-3 col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Second Quarter</h4>
                                    <p class="category">Second Quarter Final Grades</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover" id="secondquarter">
                                        <thead class="text-warning">
                                        <th>
                                            Student Name
                                            </th>
                                            <th>
                                            Grade
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($secondquarters)): ?>
                                            <?php foreach($secondquarters as $secondquarter): ?>
                                                <tr>
                                                    <td>
                                                    <?php htmlout($secondquarter['student_firstname'] .' '. substr($secondquarter['student_middlename'],0,1).'. '. $secondquarter['student_lastname']); ?>
                                                    </td>
                                                    <td>
                                                    <?php htmlout($secondquarter['finalgrade']); ?>
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
                        <div class="col-lg-3 col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Third Quarter</h4>
                                    <p class="category">Third Quarter Final Grades</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover" id="thirdquarter">
                                        <thead class="text-warning">
                                            <th>
                                            Student Name
                                            </th>
                                            <th>
                                            Grade
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($thirdquarters)): ?>
                                            <?php foreach($thirdquarters as $thirdquarter): ?>
                                                <tr>
                                                    <td>
                                                    <?php htmlout($thirdquarter['student_firstname'] .' '. substr($thirdquarter['student_middlename'],0,1).'. '. $thirdquarter['student_lastname']); ?>
                                                    </td>
                                                    <td>
                                                    <?php htmlout($thirdquarter['finalgrade']); ?>
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
                        <div class="col-lg-3 col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="title">Fourth Quarter</h4>
                                    <p class="category">Fourth Quarter Final Grades</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover" id="fourthquarter">
                                        <thead class="text-warning">
                                        <th>
                                            Student Name
                                            </th>
                                            <th>
                                            Grade
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($fourthquarters)): ?>
                                            <?php foreach($fourthquarters as $fourthquarter): ?>
                                                <tr>
                                                    <td>
                                                    <?php htmlout($fourthquarter['student_firstname'] .' '. substr($fourthquarter['student_middlename'],0,1).'. '. $fourthquarter['student_lastname']); ?>
                                                    </td>
                                                    <td>
                                                    <?php htmlout($fourthquarter['finalgrade']); ?>
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

            <!-- MODAL -->
            <?php if(!empty($posts)): ?>
            <?php foreach($posts as $post): ?>
            <div class="modal fade" id="<?php htmlout($post['postid']); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                            </button>
                            <h4 class="modal-title"><strong><?php htmlout($post['post_title']); ?></strong></h4>
                            <small>Category: <?php htmlout($post['post_category']); ?></small>
                            </br>
                            <small>Date Created: <?php htmlout($post['datecreated']); ?></small>
                        </div>
                        <div class="modal-body">
                            <?php echo($post['post_message']); ?>
                        </div>
                        <div class="modal-footer">
                        
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <?php endif; ?>

            
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
        $('#firstquarter').DataTable({
            "paging": false,
            "scrollY": 350,
            "order": [[1, "desc"]]
        });
    } );
</script>
<script>
    $(document).ready( function () {
        $('#secondquarter').DataTable({
            "paging": false,
            "scrollY": 350,
            "order": [[1, "desc"]]
        });
    } );
</script>
<script>
    $(document).ready( function () {
        $('#thirdquarter').DataTable({
            "paging": false,
            "scrollY": 350,
            "order": [[1, "desc"]]
        });
    } );
</script>
<script>
    $(document).ready( function () {
        $('#fourthquarter').DataTable({
            "paging": false,
            "scrollY": 350,
            "order": [[1, "desc"]]
        });
    } );
</script>
<script>
    $(document).ready( function () {
        $('#posttable').DataTable({
            "order": [[ 0, "desc" ]],
            "lengthMenu": [5]
        });
    } );
</script>
<script>
    $(".nano").nanoScroller();
</script>
</html>