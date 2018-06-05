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
                        <a href="../teacherGrading/">
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
                                                <h4 class="title"><?php htmlout($title); ?></h4>
                                                <p class="category">Set Quarter and School Year</p>
                                            </div>  
                                    </div>
                                    <div class="card-content">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Set Quarter</label>
                                                        <select name="quarter" class="form-control" required>
                                                            <option value=""></option>
                                                            <option value="First Quarter">First Quarter</option>
                                                            <option value="Second Quarter">Second Quarter</option>
                                                            <option value="Third Quarter">Third Quarter</option>
                                                            <option value="Fourth Quarter">Fourth Quarter</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer text-right">
                                    <?php if(isset($_GET['writtenworks'])): ?>
                                        <input type="submit" class="btn btn-success" name="setwwitems" value="Set">
                                    <?php endif; ?>
                                    <?php if(isset($_GET['performancetask'])): ?>
                                        <input type="submit" class="btn btn-primary" name="setptitems" value="Set">
                                    <?php endif; ?>
                                    <?php if(isset($_GET['quarterlyassessment'])): ?>
                                        <input type="submit" class="btn btn-danger" name="setqaitems" value="Set">
                                    <?php endif; ?>
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
</html>