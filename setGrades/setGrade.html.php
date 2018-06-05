<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/helpers.inc.php'; ?>
<!doctype html>
<html lang="en">

<head>

    <!-- CSS AND META CONTENT -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/css.inc.php'; ?>

</head>

<body>
    <div class="wrapper">
    <div class="sidebar" data-color="red" data-image="../assets/img/abstract.jpg">
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
                            <p>Grading</p>
                        </a>
                    </li>
                    <li>
                        <a href="?setWrittenworks">
                            <i class="material-icons">create</i>
                            <p>Written Works</p>
                        </a>
                    </li>
                    <li>
                        <a href="?setPerformancetask">
                            <i class="material-icons text-gray">assignment</i>
                            <p>Performance Task</p>
                        </a>
                    </li>
                    <li>
                        <a href="?setQuarterlyassessment">
                            <i class="material-icons text-gray">assessment</i>
                            <p>Quarterly Assessment</p>
                        </a>
                    </li>
                    <li>
                        <a href="?finalizegrade">
                            <i class="material-icons text-gray">note</i>
                            <p>Finalize Grade</p>
                        </a>
                    </li>
                    <li>
                        <a href="../teacherPage/">
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
                                                Section
                                                </th>
                                                <th>
                                                Initial Grade
                                                </th>
                                                <th>
                                                Quarterly Grade
                                                </th>
                                                <th>
                                                School Year
                                                </th>
                                                <th>
                                                Action>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($firstQuarters)): ?>
                                        <?php foreach($firstQuarters as $firstQuarter): ?>
                                            <tr>
                                                <td style="width:200px">    
                                                <strong><?php htmlout($firstQuarter['student_firstname'] . ' '. substr($firstQuarter['student_middlename'],0,1) . '. ' . $firstQuarter['student_lastname']); ?></strong>
                                                </td>
                                                <td>    
                                                <strong><?php htmlout($firstQuarter['section_year'].'-'. $firstQuarter['section_name']); ?></strong>
                                                </td>
                                                <td data-toggle="tooltip" data-placement="top" title="Initial Grade">    
                                                <?php htmlout($firstQuarter['initialgrade']); ?>
                                                </td>
                                                <td data-toggle="tooltip" data-placement="top" title="Quarterly Grade (Transmuted Grade)">    
                                                <?php htmlout($firstQuarter['finalgrade']); ?>
                                                </td>
                                                <td>
                                                <?php htmlout($firstQuarter['schoolyear']); ?>
                                                </td>
                                                <td>
                                                <form action="?firstQuarterGrade" method="post">
                                                    <button type="submit" class="btn btn-info"><i class="fas fa-eye"></i></button>
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
                                                Section
                                                </th>
                                                <th>
                                                Initial Grade
                                                </th>
                                                <th>
                                                Quarterly Grade
                                                </th>
                                                <th>
                                                School Year
                                                </th>
                                                <th>
                                                Action>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($secondQuarters)): ?>
                                        <?php foreach($secondQuarters as $secondQuarter): ?>
                                            <tr>
                                                <td style="width:200px">    
                                                <strong><?php htmlout($secondQuarter['student_firstname'] . ' '. substr($secondQuarter['student_middlename'],0,1) . '. ' . $secondQuarter['student_lastname']); ?></strong>
                                                </td>
                                                <td>    
                                                <strong><?php htmlout($secondQuarter['section_year'].'-'. $secondQuarter['section_name']); ?></strong>
                                                </td>
                                                <td data-toggle="tooltip" data-placement="top" title="Initial Grade">    
                                                <?php htmlout($secondQuarter['initialgrade']); ?>
                                                </td>
                                                <td data-toggle="tooltip" data-placement="top" title="Quarterly Grade (Transmuted Grade)">    
                                                <?php htmlout($secondQuarter['finalgrade']); ?>
                                                </td>
                                                <td>
                                                <?php htmlout($secondQuarter['schoolyear']); ?>
                                                </td>
                                                <td>
                                                <form action="?secondQuarterGrade" method="post">
                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-eye"></i></button>
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
                                    <div class="card-header" data-background-color="red">
                                            <div>
                                                <h4 class="title">Third Quarter</strong>    </h4>
                                                <p class="category">Student Grades</p>
                                            </div>  
                                    </div>
                                    <div class="card-content">
                                        <table class="table section_table" id="thirdQuarter">
                                            <thead class="text-success">
                                                <tr >
                                                    <th>
                                                    Student Name
                                                    </th>
                                                    <th>
                                                    Section
                                                    </th>
                                                    <th>
                                                    Initial Grade
                                                    </th>
                                                    <th>
                                                    Quarterly Grade
                                                    </th>
                                                    <th>
                                                    School Year
                                                    </th>
                                                    <th>
                                                    Action>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($thirdQuarters)): ?>
                                                <?php foreach($thirdQuarters as $thirdQuarter): ?>
                                                <tr>
                                                    <td style="width:200px">    
                                                    <strong><?php htmlout($thirdQuarter['student_firstname'] . ' '. substr($thirdQuarter['student_middlename'],0,1) . '. ' . $thirdQuarter['student_lastname']); ?></strong>
                                                    </td>
                                                    <td>    
                                                    <strong><?php htmlout($thirdQuarter['section_year'].'-'. $thirdQuarter['section_name']); ?></strong>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="Initial Grade">    
                                                    <?php htmlout($thirdQuarter['initialgrade']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="Quarterly Grade (Transmuted Grade)">    
                                                    <?php htmlout($thirdQuarter['finalgrade']); ?>
                                                    </td>
                                                    <td>
                                                    <?php htmlout($thirdQuarter['schoolyear']); ?>
                                                    </td>
                                                    <td>
                                                    <form action="?thirdQuarterGrade" method="post">
                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-eye"></i></button>
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
                                    <div class="card-header" data-background-color="orange">
                                            <div>
                                                <h4 class="title">Fourth Quarter</strong>    </h4>
                                                <p class="category">Student Grades</p>
                                            </div>  
                                    </div>
                                    <div class="card-content">
                                        <table class="table section_table" id="fourthQuarter">
                                            <thead class="text-success">
                                                <tr >
                                                    <th>
                                                    Student Name
                                                    </th>
                                                    <th>
                                                    Section
                                                    </th>
                                                    <th>
                                                    Initial Grade
                                                    </th>
                                                    <th>
                                                    Quarterly Grade
                                                    </th>
                                                    <th>
                                                    School Year
                                                    </th>
                                                    <th>
                                                    Action>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($fourthQuarters)): ?>
                                                <?php foreach($fourthQuarters as $fourthQuarter): ?>
                                                <tr>
                                                    <td style="width:200px">    
                                                    <strong><?php htmlout($fourthQuarter['student_firstname'] . ' '. substr($fourthQuarter['student_middlename'],0,1) . '. ' . $fourthQuarter['student_lastname']); ?></strong>
                                                    </td>
                                                    <td>    
                                                    <strong><?php htmlout($fourthQuarter['section_year'].'-'. $fourthQuarter['section_name']); ?></strong>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="Initial Grade">    
                                                    <?php htmlout($fourthQuarter['initialgrade']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="Quarterly Grade (Transmuted Grade)">    
                                                    <?php htmlout($fourthQuarter['finalgrade']); ?>
                                                    </td>
                                                    <td>
                                                    <?php htmlout($fourthQuarter['schoolyear']); ?>
                                                    </td>
                                                    <td>
                                                    <form action="?fourthQuarterGrade" method="post">
                                                        <button type="submit" class="btn btn-warning"><i class="fas fa-eye"></i></button>
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
                        <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" data-background-color="green">
                                            <div>
                                                <h4 class="title">Final Grade</strong>    </h4>
                                                <p class="category">Student Final Grades</p>
                                            </div>  
                                    </div>
                                    <div class="card-content">
                                        <table class="table section_table" id="fourthQuarter">
                                            <thead class="text-success">
                                                <tr >
                                                    <th>
                                                    Student Name
                                                    </th>
                                                    <th>
                                                    First Quarter
                                                    </th>
                                                    <th>
                                                    Second Quarter
                                                    </th>
                                                    <th>
                                                    Third Quarter
                                                    </th>
                                                    <th>
                                                    Fourth Quarter
                                                    </th>
                                                    <th>
                                                    Final Grade
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($finalgrades)): ?>
                                                <?php foreach($finalgrades as $finalgrade): ?>
                                                <tr>
                                                    <td style="width:200px">    
                                                    <strong><?php htmlout($finalgrade['student_firstname'] . ' '. substr($finalgrade['student_middlename'],0,1) . '. ' . $finalgrade['student_lastname']); ?></strong>
                                                    </td>
                                                    <td >    
                                                    <?php htmlout($finalgrade['firstquarter']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($finalgrade['secondquarter']); ?>
                                                    </td>
                                                    <td>
                                                    <?php htmlout($finalgrade['thirdquarter']); ?>
                                                    </td>
                                                    <td>
                                                    <?php htmlout($finalgrade['fourthquarter']); ?>
                                                    </td>
                                                    <td>
                                                    <strong><?php htmlout($finalgrade['subjectgrade']); ?></strong>
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
        $('#firstQuarter').DataTable({
            "lengthMenu": [5]
        });
    } );
</script>
<script>
    $(document).ready( function () {
        $('#secondQuarter').DataTable({
            "lengthMenu": [5]
        });
    } );
</script>
<script>
    $(document).ready( function () {
        $('#thirdQuarter').DataTable({
            "lengthMenu": [5]
        });
    } );
</script>
<script>
    $(document).ready( function () {
        $('#fourthQuarter').DataTable({
            "lengthMenu": [5]
        });
    } );
</script>
</html>