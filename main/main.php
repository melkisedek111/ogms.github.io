<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/helpers.inc.php'; ?>
<!doctype html>
<html lang="en">

<head>

    <!-- CSS AND META CONTENT -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/css.inc.php'; ?>
	<link href="../assets/css/material-kit.css" rel="stylesheet"/>
</head>

<body>
<body class="signup-page">
	<nav class="navbar navbar-transparent navbar-absolute">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
        		<a class="navbar-brand" href="http://www.creative-tim.com">Project OGMS</a>
        	</div>

        	<div class="collapse navbar-collapse" id="navigation-example">
        		<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">person</i>
                        <p class="hidden-lg hidden-md">Notifications</p>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="?admin">Admin Login</a>
                        </li>
                    </ul>
                </li>
        		</ul>
        	</div>
    	</div>
    </nav>

    <div class="wrapper">
		<div class="header header-filter" style="background-image: url('../assets/img/loginbg.jpeg'); background-size: cover; background-position: top center;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form class="form" method="post" action="">
								<div class="header header-primary text-center">
									<h4><strong>CHOOSE LOGIN</strong></h4>
								</div>
								<p class="text-divider">Login Details</p>
								<div class="content text-center">
									
                                        <div class="col-md-11 col-md-offset-1">
                                                <input type="submit" name ="taecherlogin" class="btn btn-lg btn-danger" value="Teacher Login">
                                                <input type="submit" name ="studentlogin" class="btn btn-lg btn-info" value="Student Login">
                                        </div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<footer class="footer">
		        <div class="container">
		            
		            <div class="copyright pull-right">
		                &copy; 2016, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com" target="_blank">ProjectORES</a>
		            </div>
		        </div>
		    </footer>
		</div>
    </div>

</body>
</body>

<!-- JS CONTENT -->
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/js.inc.php'; ?>
</html>