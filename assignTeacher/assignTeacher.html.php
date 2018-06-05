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
                        <a href="../assigning/">
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
                                    <div class="card-header" data-background-color="green">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="title">Teacher Assigning</h4>
                                                <p class="category">Complete list of Sections</p>
                                            </div>  
                                            <div class="col-md-2">
                                                <div class="form-group label-floating">
                                                    <label class="control-label title">Set School Year</label>
                                                        <select name="schoolyear" class="form-control" required>
                                                            <option value=""></option>
                                                            <?php if(!empty($Schoolyears)): ?>
                                                            <?php foreach($Schoolyears as $schoolyear): ?>
                                                            <option value="<?php htmlout($schoolyear['schoolyear']); ?>"><?php htmlout($schoolyear['schoolyear']); ?></option>
                                                            <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <table class="table" id="section_table">
                                            <thead class="text-success">
                                                <tr>
                                                    <th>
                                                    ID
                                                    </th>
                                                    <th>
                                                    Section Year
                                                    </th>
                                                    <th>
                                                    Section Name
                                                    </th>
                                                    <th>
                                                    Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($section_details)): ?>
                                            <?php foreach($section_details as $section_detail): ?>
                                                <tr>
                                                    <td>
                                                    <?php htmlout($section_detail['id']); ?>
                                                    </td>
                                                    <td>
                                                    <?php htmlout($section_detail['section_year']); ?>
                                                    </td>
                                                    <td>
                                                    <?php htmlout($section_detail['section_name']); ?>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="sectionid" class="radion" value="<?php echo $section_detail['id']; ?>" required>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                            <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer text-right">
                                        <input type="submit" name="selectTeacher" class="btn btn-success" value="Select Teacher">
                                        <input type="submit" name="deselectTeacher" class="btn btn-danger" value="Deselect Teacher">
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
        $('#section_table').DataTable();
    } );
</script>
</html>