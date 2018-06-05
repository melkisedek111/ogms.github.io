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
                        <a href="../studentPage/">
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
                                                <h4 class="title">Written Works</strong>    </h4>
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
                                                <?php if(!empty($QuarterGrades)): ?>
                                                <?php foreach($QuarterGrades as $QuarterGrade): ?>
                                                <tr>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['qs1']); ?> out of <?php htmlout($QuarterGrade['iq1']); ?>">    
                                                    <?php htmlout($QuarterGrade['qs1']); ?>
                                                    </td>   
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['qs2']); ?> out of <?php htmlout($QuarterGrade['iq2']); ?>">    
                                                    <?php htmlout($QuarterGrade['qs2']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['qs3']); ?> out of <?php htmlout($QuarterGrade['iq3']); ?>">    
                                                    <?php htmlout($QuarterGrade['qs3']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['qs4']); ?> out of <?php htmlout($QuarterGrade['iq4']); ?>">    
                                                    <?php htmlout($QuarterGrade['qs4']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['qs5']); ?> out of <?php htmlout($QuarterGrade['iq5']); ?>">    
                                                    <?php htmlout($QuarterGrade['qs5']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['qs6']); ?> out of <?php htmlout($QuarterGrade['iq6']); ?>">    
                                                    <?php htmlout($QuarterGrade['qs6']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['qs7']); ?> out of <?php htmlout($QuarterGrade['iq7']); ?>">    
                                                    <?php htmlout($QuarterGrade['qs7']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['qs8']); ?> out of <?php htmlout($QuarterGrade['iq8']); ?>">    
                                                    <?php htmlout($QuarterGrade['qs8']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['qs9']); ?> out of <?php htmlout($QuarterGrade['iq9']); ?>">    
                                                    <?php htmlout($QuarterGrade['qs9']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['qs10']); ?> out of <?php htmlout($QuarterGrade['iq10']); ?>">    
                                                    <?php htmlout($QuarterGrade['qs10']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Total Score is <?php htmlout($QuarterGrade['qtotal']); ?> out of <?php htmlout($QuarterGrade['totalitem']); ?>">    
                                                    <?php htmlout($QuarterGrade['qtotal']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="Your Percentage Score">        
                                                    <?php htmlout($QuarterGrade['qps']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="Your Weighted Score">    
                                                    <strong><?php htmlout($QuarterGrade['qws']); ?></strong>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($QuarterGrade['schoolyear']); ?>
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
                                                <h4 class="title">Performance Task</h4>
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
                                            <?php if(!empty($QuarterGrades)): ?>
                                                <?php foreach($QuarterGrades as $QuarterGrade): ?>
                                                <tr>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['ptq1']); ?> out of <?php htmlout($QuarterGrade['ptiq1']); ?>">    
                                                    <?php htmlout($QuarterGrade['ptq1']); ?>
                                                    </td>   
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['ptq2']); ?> out of <?php htmlout($QuarterGrade['ptiq2']); ?>">    
                                                    <?php htmlout($QuarterGrade['ptq2']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['ptq3']); ?> out of <?php htmlout($QuarterGrade['ptiq3']); ?>">    
                                                    <?php htmlout($QuarterGrade['ptq3']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['ptq4']); ?> out of <?php htmlout($QuarterGrade['ptiq4']); ?>">    
                                                    <?php htmlout($QuarterGrade['ptq4']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['ptq5']); ?> out of <?php htmlout($QuarterGrade['ptiq5']); ?>">    
                                                    <?php htmlout($QuarterGrade['ptq5']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['ptq6']); ?> out of <?php htmlout($QuarterGrade['ptiq6']); ?>">    
                                                    <?php htmlout($QuarterGrade['ptq6']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['ptq7']); ?> out of <?php htmlout($QuarterGrade['ptiq7']); ?>">    
                                                    <?php htmlout($QuarterGrade['ptq7']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['ptq8']); ?> out of <?php htmlout($QuarterGrade['ptiq8']); ?>">    
                                                    <?php htmlout($QuarterGrade['ptq8']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['ptq9']); ?> out of <?php htmlout($QuarterGrade['ptiq9']); ?>">    
                                                    <?php htmlout($QuarterGrade['ptq9']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['ptq10']); ?> out of <?php htmlout($QuarterGrade['ptiq10']); ?>">    
                                                    <?php htmlout($QuarterGrade['ptq10']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['ptqtotal']); ?> out of <?php htmlout($QuarterGrade['pttotalitem']); ?>">    
                                                    <?php htmlout($QuarterGrade['ptqtotal']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="Your Percentage Score">    
                                                    <?php htmlout($QuarterGrade['ptps']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Weighted Score">    
                                                    <?php htmlout($QuarterGrade['ptws']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($QuarterGrade['schoolyear']); ?>
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
                                                <h4 class="title">Quarterly Assessment</h4>
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
                                            <?php if(!empty($QuarterGrades)): ?>
                                                <?php foreach($QuarterGrades as $QuarterGrade): ?>
                                                <tr>
                                                    <td data-toggle="tooltip" data-placement="top" title="You Scored <?php htmlout($QuarterGrade['qa1']); ?> out of <?php htmlout($QuarterGrade['qaitem']); ?>">    
                                                    <?php htmlout($QuarterGrade['qa1']); ?>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="Your Percentage Score">    
                                                    <?php htmlout($QuarterGrade['qaps']); ?>
                                                    </td>
                                                    <td  data-toggle="tooltip" data-placement="top" title="You Weighted Score">    
                                                    <?php htmlout($QuarterGrade['qaws']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($QuarterGrade['schoolyear']); ?>
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
                                                <h4 class="title">Initial and Quarterly Grade</h4>
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
                                            <?php if(!empty($QuarterGrades)): ?>
                                                <?php foreach($QuarterGrades as $QuarterGrade): ?>
                                                <tr>
                                                    <td data-toggle="tooltip" data-placement="top" title="Written Works Weighted Score">    
                                                    <strong><?php htmlout($QuarterGrade['qws']); ?></strong>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="Performance Tasks Weighted Score">    
                                                    <strong><?php htmlout($QuarterGrade['ptws']); ?></strong>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="Quarterly Assessment Weighted Score">    
                                                    <strong><?php htmlout($QuarterGrade['qaws']); ?></strong>
                                                    </td>
                                                    <td  data-toggle="tooltip" data-placement="top" title="The Sum of All Weighted Scores">    
                                                    <strong><?php htmlout($QuarterGrade['initialgrade']); ?></strong>
                                                    </td>
                                                    <td data-toggle="tooltip" data-placement="top" title="Quarterly Grade (Transmuted Grade)">    
                                                    <strong><?php htmlout($QuarterGrade['finalgrade']); ?></strong>
                                                    </td>
                                                    <td> 
                                                    <?php htmlout($QuarterGrade['schoolyear']); ?>
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