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
                    <li class="active">
                        <a href="dashboard.html">
                            <i class="material-icons">dashboard</i>
                            <p>Grading</p>
                        </a>
                    </li>
                    <li>
                        <a href="?writtenworks">
                            <i class="material-icons">create</i>
                            <p>Written Works</p>
                        </a>
                    </li>
                    <li>
                        <a href="?performancetask">
                            <i class="material-icons text-gray">assignment</i>
                            <p>Performance Task</p>
                        </a>
                    </li>
                    <li>
                        <a href="?quarterlyassessment">
                            <i class="material-icons text-gray">assessment</i>
                            <p>Quarterly Assessment</p>
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
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div class="card">
                                    <div class="card-header" data-background-color="blue">
                                            <div>
                                                <h4 class="title">Written Works Set Items</h4>
                                                <p class="category">Highest Possible Scores</p>
                                            </div>  
                                    </div>
                                    <div class="card-content">
                                        <table class="table section_table" id="">
                                            <thead class="text-success">
                                                <tr>
                                                    <th>
                                                    Quarter
                                                    </th>
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
                                            <?php if(!empty($writtenworks)): ?>
                                                <?php foreach($writtenworks as $writtenwork): ?>
                                                <tr>
                                                    <td>    
                                                    <?php htmlout($writtenwork['quarter']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($writtenwork['iq1']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($writtenwork['iq2']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($writtenwork['iq3']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($writtenwork['iq4']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($writtenwork['iq5']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($writtenwork['iq6']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($writtenwork['iq7']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($writtenwork['iq8']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($writtenwork['iq9']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($writtenwork['iq10']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($writtenwork['totalitem']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($writtenwork['ps']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($writtenwork['ws']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($writtenwork['schoolyear']); ?>
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
                                                <h4 class="title">Performance Task Set Items </h4>
                                                <p class="category">Highest Possible Scores</p>
                                            </div>  
                                    </div>
                                    <div class="card-content">
                                        <table class="table section_table" id="">
                                            <thead class="text-success">
                                                <tr>
                                                    <th>
                                                    Quarter
                                                    </th>
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
                                            <?php if(!empty($performancetasks)): ?>
                                                <?php foreach($performancetasks as $performancetask): ?>
                                                <tr>
                                                    <td>    
                                                    <?php htmlout($performancetask['quarter']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($performancetask['iq1']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($performancetask['iq2']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($performancetask['iq3']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($performancetask['iq4']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($performancetask['iq5']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($performancetask['iq6']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($performancetask['iq7']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($performancetask['iq8']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($performancetask['iq9']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($performancetask['iq10']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($performancetask['totalitem']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($performancetask['ps']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($performancetask['ws']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($performancetask['schoolyear']); ?>
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
                                                <h4 class="title">Quarterly Assessment Set Items</h4>
                                                <p class="category">Highest Possible Scores</p>
                                            </div>  
                                    </div>
                                    <div class="card-content">
                                        <table class="table section_table" id="">
                                            <thead class="text-success">
                                                <tr>
                                                    <th>
                                                    Quarter
                                                    </th>
                                                    <th>
                                                    Score
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
                                            <?php if(!empty($quarterlyassessments)): ?>
                                                <?php foreach($quarterlyassessments as $quarterlyassessment): ?>
                                                <tr>
                                                    <td>    
                                                    <?php htmlout($quarterlyassessment['quarter']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($quarterlyassessment['iq1']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($quarterlyassessment['ps']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($quarterlyassessment['ws']); ?>
                                                    </td>
                                                    <td>    
                                                    <?php htmlout($quarterlyassessment['schoolyear']); ?>
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
        $('#student_table').DataTable();
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