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
                        <a href="dashboard.html">
                            <i class="material-icons">dashboard</i>
                            <p>Post</p>
                        </a>
                    </li>
                    <li>
                        <a href="?addpost">
                            <i class="material-icons">add_to_photos</i>
                            <p>Add Post</p>
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
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="title">Your Post</h4>
                                    <p class="category">...</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover" id="post_table">
                                        <thead class="text-warning">
                                            <th>ID</th>
                                            <th>Section</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Date Created</th>
                                            <th>Action</th>                                            
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($posts)): ?>
                                        <?php foreach($posts as $post): ?>
                                            <tr>
                                                <td><?php htmlout($post['postid']); ?></td>
                                                <td><?php htmlout($post['section_year'].'-'.$post['section_name']); ?></td>
                                                <td><strong><?php htmlout($post['post_title']); ?></strong></td>
                                                <td><?php htmlout($post['post_category']); ?></td>
                                                <td><?php htmlout($post['datecreated']); ?></td>
                                                <td>
                                                <form action="" method="post">
                                                <input type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php htmlout($post['postid']); ?>" value="View Post">
                                                <input type="submit" class="btn btn-success" name="postUpdate" value="Update Post">
                                                <input type="submit" class="btn btn-danger" name="postDelete" value="Delete Post">
                                                <input type="hidden" name="postid" value="<?php htmlout($post['postid']); ?>">
                                                <input type="hidden" name="sectionid" value="<?php htmlout($post['sectionid']); ?>">
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
    $(document).ready( function (){
        $('#post_table').DataTable({
            "order": [[ 0, "desc" ]]
        });
    });
</script>
</html>