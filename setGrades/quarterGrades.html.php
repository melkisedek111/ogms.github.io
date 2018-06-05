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
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/name.php'; ?>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="../setGrades/">
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
                                    <div class="card-header" data-background-color="blue">
                                            <div>
                                                <h4 class="title">Written Works for <?php htmlout($quarter); ?></strong>    </h4>
                                                <p class="category">Written Works Scores</p>
                                            </div>  
                                    </div>
                                    <div class="card-content">
                                        <table class="table section_table" id="">
                                            <thead class="text-success">
                                                <tr>
                                                    <th>
                                                    Quiz 1
                                                    </th>
                                                    <th>
                                                    Quiz 2
                                                    </th>
                                                    <th>
                                                    Quiz 3
                                                    </th>
                                                    <th>
                                                    Quiz 4
                                                    </th>
                                                    <th>
                                                    Quiz 5
                                                    </th>
                                                    <th>
                                                    Quiz 6
                                                    </th>
                                                    <th>
                                                    Quiz 7
                                                    </th>
                                                    <th>
                                                    Quiz 8
                                                    </th>
                                                    <th>
                                                    Quiz 9
                                                    </th>
                                                    <th>
                                                    Quiz 10
                                                    </th>
                                                    <th>
                                                    Quiz Total
                                                    </th>
                                                    <th>
                                                    PS
                                                    </th>
                                                    <th>
                                                    WS
                                                    </th>
                                                    <th>
                                                    schoolyear
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($firstQuarterGrades)): ?>
                                                <?php foreach($firstQuarterGrades as $firstQuarterGrade): ?>
                                                <tr>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['qs1']); ?>
                                                    </td>   
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['qs2']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['qs3']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['qs4']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['qs5']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['qs6']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['qs7']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['qs8']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['qs9']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['qs10']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['qtotal']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['qps']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['qws']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['schoolyear']); ?>
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
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div class="card">
                                    <div class="card-header" data-background-color="purple">
                                            <div>
                                                <h4 class="title">Performance Task for <?php htmlout($quarter); ?></h4>
                                                <p class="category">Performance Tasks Scores</p>
                                            </div>  
                                    </div>
                                    <div class="card-content">
                                        <table class="table section_table" id="">
                                        <thead class="text-success">
                                                <tr>
                                                    <th>
                                                    Quiz 1
                                                    </th>
                                                    <th>
                                                    Quiz 2
                                                    </th>
                                                    <th>
                                                    Quiz 3
                                                    </th>
                                                    <th>
                                                    Quiz 4
                                                    </th>
                                                    <th>
                                                    Quiz 5
                                                    </th>
                                                    <th>
                                                    Quiz 6
                                                    </th>
                                                    <th>
                                                    Quiz 7
                                                    </th>
                                                    <th>
                                                    Quiz 8
                                                    </th>
                                                    <th>
                                                    Quiz 9
                                                    </th>
                                                    <th>
                                                    Quiz 10
                                                    </th>
                                                    <th>
                                                    Quiz Total
                                                    </th>
                                                    <th>
                                                    PS
                                                    </th>
                                                    <th>
                                                    WS
                                                    </th>
                                                    <th>
                                                    School Year
                                                    </th>
                                                </tr>
                                               
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($firstQuarterGrades)): ?>
                                                <?php foreach($firstQuarterGrades as $firstQuarterGrade): ?>
                                                <tr>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['ptq1']); ?>
                                                    </td>   
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['ptq2']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['ptq3']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['ptq4']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['ptq5']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['ptq6']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['ptq7']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['ptq8']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['ptq9']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['ptq10']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['ptqtotal']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['ptps']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['ptws']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['schoolyear']); ?>
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
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div class="card">
                                    <div class="card-header" data-background-color="red">
                                            <div>
                                                <h4 class="title">Quarterly Assessment for <?php htmlout($quarter); ?></h4>
                                                <p class="category">Quarterly Assessment Scores</p>
                                            </div>  
                                    </div>
                                    <div class="card-content">
                                        <table class="table section_table" id="">
                                        <thead class="text-success">
                                                <tr>
                                                    <th>
                                                    Test Score
                                                    </th>
                                                    <th>
                                                    PS
                                                    </th>
                                                    <th>
                                                    WS
                                                    </th>
                                                    <th>
                                                    School Year
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($firstQuarterGrades)): ?>
                                                <?php foreach($firstQuarterGrades as $firstQuarterGrade): ?>
                                                <tr>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['qa1']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['qaps']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['qaws']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['schoolyear']); ?>
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
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div class="card">
                                    <div class="card-header" data-background-color="orange">
                                            <div>
                                                <h4 class="title">Initial and Quarterly Grade for <?php htmlout($quarter); ?></h4>
                                                <p class="category">Computed and Transmuted Grade</p>
                                            </div>  
                                    </div>
                                    <div class="card-content">
                                        <table class="table section_table" id="">
                                        <thead class="text-success">
                                                <tr>
                                                    <th>
                                                    WW WS
                                                    </th>
                                                    <th>
                                                    PT WS
                                                    </th>
                                                    <th>
                                                    QA WS
                                                    </th>
                                                    <th>
                                                    Initial Grade
                                                    </th>
                                                    <th>
                                                    Qaurterly Grade
                                                    </th>
                                                    <th>
                                                    School Year
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($firstQuarterGrades)): ?>
                                                <?php foreach($firstQuarterGrades as $firstQuarterGrade): ?>
                                                <tr>
                                                    <td data-toggle="tooltip" data-placement="top" title="Written Works Weighted Score">    
                                                    <?php htmlout($firstQuarterGrade['qws']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="Performance Tasks Weighted Score">    
                                                    <?php htmlout($firstQuarterGrade['ptws']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="Quarterly Assessment Weighted Score">    
                                                    <?php htmlout($firstQuarterGrade['qaws']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['initialgrade']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($firstQuarterGrade['finalgrade']); ?>
                                                    </td>
                                                    <td> 
                                                    <?php htmlout($firstQuarterGrade['schoolyear']); ?>
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
        $('#studentww').DataTable();
    } );
</script>
<script>
    $(document).ready( function () {
        $('#teacher_table').DataTable();
    } );
</script>
<script>
    $(document).ready( function () {
        $('#subject_table').DataTable();
    } );
</script>
<script>
    $(document).ready( function () {
        $('#section_table').DataTable();
    } );
</script>
</html>