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
                        <a href="../studentPage/">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <?php if(!empty($subjectgrades)): ?>
                    <?php foreach($subjectgrades as $subjectgrade): ?>
                    <li>
                        <a href="#">
                            <i class="material-icons">domain</i>
                            <p><?php htmlout($subjectgrade['subject_code']); ?> - <strong><?php htmlout($subjectgrade['subjectgrade']); ?></strong></p>  
                        </a>
                    </li>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <?php endif; ?>
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
                                    <p class="category">Subjects</p>
                                    <h3 class="title">
                                    <?php 
                                    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
                                    $count = current($pdo->query('SELECT COUNT(id) FROM table_subject
                                    INNER JOIN table_teacher_subject ON table_teacher_subject.subjectid = table_subject.id
                                    INNER JOIN table_teacher_section ON table_teacher_section.teacherid = table_teacher_subject.teacherid
                                    INNER JOIN table_student_section on table_student_section.sectionid = table_teacher_section.sectionid
                                    WHERE table_student_section.studentid = '. $_SESSION['studentid'] .' AND table_student_section.schoolyear = '. $_SESSION['schoolyear'] .' AND table_teacher_subject.schoolyear = '. $_SESSION['schoolyear'] .' AND table_teacher_section.schoolyear = '. $_SESSION['schoolyear'] .' AND subject_status = "Active"')->fetch()); 
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
                                <div class="card-header" data-background-color="red">
                                    <i class="material-icons">view_headline</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Posts</p>
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
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="title">Teacher Post</h4>
                                    <p class="category">Teacher's Notice, Announcement, Assignments and Others.</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover" id="post_table">
                                        <thead class="text-warning">
                                            <th>Teacher Name</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Date Created</th>
                                            <th>Action</th>                                            
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($posts)): ?>
                                        <?php foreach($posts as $post): ?>
                                            <tr>
                                                <td><?php htmlout($post['teacher_firstname'].' '.substr($post['teacher_middlename'],0,1) .'. '.$post['teacher_lastname']); ?></td>
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
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <div>
                                        <h4 class="title">First Quarter</strong>    </h4>
                                        <p class="category">Student Grades</p>
                                    </div>  
                                </div>
                                <div class="card-content">
                                    <table class="table section_table" id="firstQuarter">
                                        <thead class="text-success">
                                            <tr>
                                                <th>
                                                Student Name
                                                </th>
                                                <th>
                                                Subject
                                                </th>
                                                <th>
                                                Initial Grade
                                                </th>
                                                <th>
                                                Quarterly Grade
                                                </th>
                                                <th>
                                                View Details
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($firstQuarters)): ?>
                                        <?php foreach($firstQuarters as $firstQuarter): ?>
                                            <tr>
                                                <td style="width:200px">    
                                                <?php htmlout($firstQuarter['teacher_firstname'] . ' '. substr($firstQuarter['teacher_middlename'],0,1) . '. ' . $firstQuarter['teacher_lastname']); ?>
                                                </td>
                                                <td>    
                                                <?php htmlout($firstQuarter['subject_code']); ?>
                                                </td>
                                                <td class="text-center" data-toggle="tooltip" data-placement="top" title="Initial Grade">    
                                                <strong><?php htmlout($firstQuarter['initialgrade']); ?></strong>
                                                </td>
                                                <td class="text-center" data-toggle="tooltip" data-placement="top" title="Quarterly Grade (Transmuted Grade)">    
                                                <strong><?php htmlout($firstQuarter['finalgrade']); ?></strong>
                                                </td>
                                                <td>
                                                <form action="?firstQuarterGrade" method="post">
                                                    <button type="submit" class="btn btn-info"><small><i class="fas fa-eye"></i></small></button>
                                                    <input type="hidden" value="<?php htmlout($firstQuarter['studentid']); ?>" name="studentid">
                                                    <input type="hidden" value="<?php htmlout($firstQuarter['subjectid']); ?>" name="subjectid">
                                                    <input type="hidden" value="<?php htmlout($firstQuarter['teacherid']); ?>" name="teacherid">
                                                    <input type="hidden" value="<?php htmlout($firstQuarter['schoolyear']); ?>" name="schoolyear">
                                                    <input type="hidden" value="<?php htmlout($firstQuarter['quarter']); ?>" name="quarter">
                                                </form>
                                                </td>
                                            </tr>
                                        <?php endforeach;  ?>
                                        <?php endif; ?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <div>
                                        <h4 class="title">Second Quarter</strong>    </h4>
                                        <p class="category">Student Grades</p>
                                    </div>  
                                </div>
                                <div class="card-content">
                                    <table class="table section_table" id="secondQuarter">
                                        <thead class="text-success">
                                            <tr>
                                                <th>
                                                Student Name
                                                </th>
                                                <th>
                                                Subject
                                                </th>
                                                <th>
                                                Initial Grade
                                                </th>
                                                <th>
                                                Quarterly Grade
                                                </th>
                                                <th>
                                                View Details
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($secondQuarters)): ?>
                                        <?php foreach($secondQuarters as $secondQuarter): ?>
                                            <tr>
                                                <td style="width:200px">    
                                                <?php htmlout($secondQuarter['teacher_firstname'] . ' '. substr($secondQuarter['teacher_middlename'],0,1) . '. ' . $secondQuarter['teacher_lastname']); ?>
                                                </td>
                                                <td>    
                                                <?php htmlout($secondQuarter['subject_code']); ?>
                                                </td>
                                                <td class="text-center" data-toggle="tooltip" data-placement="top" title="Initial Grade">    
                                                <strong><?php htmlout($secondQuarter['initialgrade']); ?></strong>
                                                </td>
                                                <td class="text-center" data-toggle="tooltip" data-placement="top" title="Quarterly Grade (Transmuted Grade)">    
                                                <strong><?php htmlout($secondQuarter['finalgrade']); ?></strong>
                                                </td>
                                                <td>
                                                <form action="?secondQuarterGrade" method="post">
                                                    <button type="submit" class="btn btn-primary"><small><i class="fas fa-eye"></i></small></button>
                                                    <input type="hidden" value="<?php htmlout($secondQuarter['studentid']); ?>" name="studentid">
                                                    <input type="hidden" value="<?php htmlout($secondQuarter['subjectid']); ?>" name="subjectid">
                                                    <input type="hidden" value="<?php htmlout($secondQuarter['teacherid']); ?>" name="teacherid">
                                                    <input type="hidden" value="<?php htmlout($secondQuarter['schoolyear']); ?>" name="schoolyear">
                                                    <input type="hidden" value="<?php htmlout($secondQuarter['quarter']); ?>" name="quarter">
                                                </form>
                                                </td>
                                            </tr>
                                        <?php endforeach;  ?>
                                        <?php endif; ?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <div>
                                        <h4 class="title">Third Quarter</strong>    </h4>
                                        <p class="category">Student Grades</p>
                                    </div>  
                                </div>
                                <div class="card-content">
                                    <table class="table section_table" id="thirdQuarter">
                                        <thead class="text-success">
                                            <tr>
                                                <th>
                                                Student Name
                                                </th>
                                                <th>
                                                Subject
                                                </th>
                                                <th>
                                                Initial Grade
                                                </th>
                                                <th>
                                                Quarterly Grade
                                                </th>
                                                <th>
                                                View Details
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($thirdQuarters)): ?>
                                        <?php foreach($thirdQuarters as $thirdQuarter): ?>
                                            <tr>
                                                <td style="width:200px">    
                                                <?php htmlout($thirdQuarter['teacher_firstname'] . ' '. substr($thirdQuarter['teacher_middlename'],0,1) . '. ' . $thirdQuarter['teacher_lastname']); ?>
                                                </td>
                                                <td>    
                                                <?php htmlout($thirdQuarter['subject_code']); ?>
                                                </td>
                                                <td class="text-center" data-toggle="tooltip" data-placement="top" title="Initial Grade">    
                                                <strong><?php htmlout($thirdQuarter['initialgrade']); ?></strong>
                                                </td>
                                                <td class="text-center" data-toggle="tooltip" data-placement="top" title="Quarterly Grade (Transmuted Grade)">    
                                                <strong><?php htmlout($thirdQuarter['finalgrade']); ?></strong>
                                                </td>
                                                <td>
                                                <form action="?thirdQuarterGrade" method="post">
                                                    <button type="submit" class="btn btn-success"><small><i class="fas fa-eye"></i></small></button>
                                                    <input type="hidden" value="<?php htmlout($thirdQuarter['studentid']); ?>" name="studentid">
                                                    <input type="hidden" value="<?php htmlout($thirdQuarter['subjectid']); ?>" name="subjectid">
                                                    <input type="hidden" value="<?php htmlout($thirdQuarter['teacherid']); ?>" name="teacherid">
                                                    <input type="hidden" value="<?php htmlout($thirdQuarter['schoolyear']); ?>" name="schoolyear">
                                                    <input type="hidden" value="<?php htmlout($thirdQuarter['quarter']); ?>" name="quarter">
                                                </form>
                                                </td>
                                            </tr>
                                        <?php endforeach;  ?>
                                        <?php endif; ?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <div>
                                        <h4 class="title">Fourth Quarter</strong>    </h4>
                                        <p class="category">Student Grades</p>
                                    </div>  
                                </div>
                                <div class="card-content">
                                    <table class="table section_table" id="fourthQuarter">
                                        <thead class="text-success">
                                            <tr>
                                                <th>
                                                Student Name
                                                </th>
                                                <th>
                                                Subject
                                                </th>
                                                <th>
                                                Initial Grade
                                                </th>
                                                <th>
                                                Quarterly Grade
                                                </th>
                                                <th>
                                                View Details
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($fourthQuarters)): ?>
                                        <?php foreach($fourthQuarters as $fourthQuarter): ?>
                                            <tr>
                                                <td style="width:200px">    
                                                <?php htmlout($fourthQuarter['teacher_firstname'] . ' '. substr($fourthQuarter['teacher_middlename'],0,1) . '. ' . $fourthQuarter['teacher_lastname']); ?>
                                                </td>
                                                <td>    
                                                <?php htmlout($fourthQuarter['subject_code']); ?>
                                                </td>
                                                <td class="text-center" data-toggle="tooltip" data-placement="top" title="Initial Grade">    
                                                <strong><?php htmlout($fourthQuarter['initialgrade']); ?></strong>
                                                </td>
                                                <td class="text-center" data-toggle="tooltip" data-placement="top" title="Quarterly Grade (Transmuted Grade)">    
                                                <strong><?php htmlout($fourthQuarter['finalgrade']); ?></strong>
                                                </td>
                                                <td>
                                                <form action="?fourthQuarterGrade" method="post">
                                                    <button type="submit" class="btn btn-danger"><small><i class="fas fa-eye"></i></small></button>
                                                    <input type="hidden" value="<?php htmlout($fourthQuarter['studentid']); ?>" name="studentid">
                                                    <input type="hidden" value="<?php htmlout($fourthQuarter['subjectid']); ?>" name="subjectid">
                                                    <input type="hidden" value="<?php htmlout($fourthQuarter['teacherid']); ?>" name="teacherid">
                                                    <input type="hidden" value="<?php htmlout($fourthQuarter['schoolyear']); ?>" name="schoolyear">
                                                    <input type="hidden" value="<?php htmlout($fourthQuarter['quarter']); ?>" name="quarter">
                                                </form>
                                                </td>
                                            </tr>
                                        <?php endforeach;  ?>
                                        <?php endif; ?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            
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
        $('#firstQuarter').DataTable({
            'searching': false,
            "paging": false,
            "scrollY": 400
        });
    } );
</script>
<script>
    $(document).ready( function () {
        $('#secondQuarter').DataTable({
            'searching': false,
            "paging": false,
            "scrollY": 400
        });
    } );
</script>
<script>
    $(document).ready( function () {
        $('#thirdQuarter').DataTable({
            'searching': false,
            "paging": false,
            "scrollY": 400
        });
    } );
</script>
<script>
    $(document).ready( function () {
        $('#fourthQuarter').DataTable({
            'searching': false,
            "paging": false,
            "scrollY": 400
        });
    } );
</script>
<script>
    $(document).ready( function (){
        $('#post_table').DataTable({
            "order": [[ 0, "desc" ]],
            "paging": false,
            "scrollY": 450
        });
    });
</script>
</html>