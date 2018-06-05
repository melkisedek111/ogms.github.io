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
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <div>
                                        <h4 class="title">Final Grade</strong></h4>
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
                                                Section
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
                                                <th>
                                                Action
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
                                            <td>    
                                            <strong><?php htmlout($finalgrade['section_year'].'-'. $finalgrade['section_name']); ?></strong>
                                            </td>
                                            <td data-toggle="tooltip" data-placement="top" title="Initial Grade">    
                                            <?php htmlout($finalgrade['firstquarter']); ?>
                                            </td>
                                            <td data-toggle="tooltip" data-placement="top" title="Quarterly Grade (Transmuted Grade)">    
                                            <?php htmlout($finalgrade['secondquarter']); ?>
                                            </td>
                                            <td>
                                            <?php htmlout($finalgrade['thirdquarter']); ?>
                                            </td>
                                            <td>
                                            <?php htmlout($finalgrade['fourthquarter']); ?>
                                            </td>
                                            <td>
                                            <?php htmlout(intval(($finalgrade['firstquarter']+$finalgrade['secondquarter']+$finalgrade['thirdquarter']+$finalgrade['fourthquarter'])/4)); ?>
                                            </td>
                                            <td>
                                            <form action="" method="post">
                                                <input type="submit" class="btn btn-primary" value="Verify" name="verifygrade">
                                                <input type="hidden" value="<?php htmlout($finalgrade['studentid']); ?>" name="studentid">.
                                                <input type="hidden" value="<?php htmlout($finalgrade['teacherid']); ?>" name="teacherid">
                                                <input type="hidden" value="<?php htmlout($finalgrade['subjectid']); ?>" name="subjectid">
                                                <input type="hidden" value="<?php htmlout($finalgrade['schoolyear']); ?>" name="schoolyear">
                                                <input type="hidden" value="<?php htmlout($finalgrade['firstquarter']); ?>" name="firstquarter">
                                                <input type="hidden" value="<?php htmlout($finalgrade['secondquarter']); ?>" name="secondquarter">
                                                <input type="hidden" value="<?php htmlout($finalgrade['thirdquarter']); ?>" name="thirdquarter">
                                                <input type="hidden" value="<?php htmlout($finalgrade['fourthquarter']); ?>" name="fourthquarter">
                                                <input type="hidden" value="<?php htmlout(intval(($finalgrade['firstquarter']+$finalgrade['secondquarter']+$finalgrade['thirdquarter']+$finalgrade['fourthquarter'])/4)); ?>" name="subjectgrade">

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
        $('#fourthQuarter').DataTable({
            "lengthMenu": [10]
        });
    } );
</script>
</html>