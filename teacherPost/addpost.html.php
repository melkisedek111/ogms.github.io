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
                    <li>
                        <a href="../teacherPost/">
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
                        <div class="col-lg-12 col-md-12">
                        <form action="" method="post">
                            <div class="card">
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="title"> List of Sections</h4>
                                    <p class="category">Select section for your post</p>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Title Post</label>
                                                    <input 
                                                        type="text" 
                                                        name="post_title" 
                                                        class="form-control" 
                                                        title="Please Enter Your Post Title" 
                                                        autofocus   
                                                        value="<?php htmlout($postTitle); ?>" 
                                                        required
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Categories</label>
                                                    <select name="post_category" class="form-control" required>
                                                        <option value="<?php htmlout($postCategory); ?>"><?php htmlout($postCategory); ?></option>
                                                        <option value="Others">Others</option>
                                                        <option value="Assignment">Assignment</option>
                                                        <option value="Notice">Notice</option>
                                                        <option value="Meeting">Meeting</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group label-static">
                                                    <label class="control-label">Message Post</label>
                                                    <textarea name="post_message" id="messagebody" class="form-control" requried><?php echo($postMessage); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <input type="text" name="postid" value="<?php htmlout($postid); ?>">
                                    <input type="submit" class="btn btn-success" name="<?php htmlout($name); ?>" value="<?php htmlout($value); ?>">
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
			CKEDITOR.replace( 'messagebody' );
		</script>
</html>