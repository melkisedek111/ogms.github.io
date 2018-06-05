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
                                    <div class="card-header" data-background-color="<?php htmlout($bgcolor); ?>">
                                            <div>
                                                <h4 class="title">List of Student</h4>
                                                <p class="category">Complete list of students</p>
                                            </div>  
                                    </div>
                                    <div class="card-content">
                                        <table class="table section_table" id="">
                                            <thead class="text-success">
                                                <tr>
                                                    <th>
                                                    Section
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
                                                    <?php htmlout($studentDetail['section_year'].'-'.$studentDetail['section_name']); ?>
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
                                                    <td>
                                                    <input type="radio" name="studentid" class="radio" value="<?php echo $studentDetail['studentid']; ?>" required>
                                                    </td>
                                                </tr>
                                                <?php endforeach;  ?>
                                                <?php endif; ?> 
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer text-right">
                                        
                                        <?php if(isset($_GET['setWrittenworks'])): ?>
                                        <input type="submit" class="btn btn-success" name="setGradeww" value="Set Grade">
                                        <?php endif; ?>
                                        <?php if(isset($_GET['setPerformancetask'])): ?>
                                            <input type="submit" class="btn btn-primary" name="setGradept" value="Set Grade">
                                        <?php endif; ?>
                                        <?php if(isset($_GET['setQuarterlyassessment'])): ?>
                                            <input type="submit" class="btn btn-danger" name="setGradeqa" value="Set Grade">
                                        <?php endif; ?>
                                        <input type="text" name="quarter" value="<?php htmlout($quarter); ?>">      
                                        <input type="text" name="teacherid" value="<?php htmlout($teacherid); ?>">    
                                        <input type="text" name="schoolyear" value="<?php htmlout($schoolyear); ?>">  
                                        <input type="text" name="subjectid" value="<?php htmlout($subjectid); ?>">                                    
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