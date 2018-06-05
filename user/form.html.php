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
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Creative Tim
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="<?php htmlout($backform); ?>">
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
                                <div class="card-header" data-background-color="<?php htmlout($sidebardcolor); ?>">

                                    <h4 class="title"><?php htmlout($title); ?></h4>
                                    <p class="category">Enter Complete User Details</p>
                                </div>
                                <div class="card-content">
                                    <form action="?<?php htmlout($action); ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">First Name</label>
                                                    <input 
                                                        type="text" 
                                                        name="admin_firstname" 
                                                        class="form-control" 
                                                        title="Please Enter Your Firstname" 
                                                        autofocus 
                                                        onkeydown="capitalize(this)" 
                                                        onkeypress="return onlyletters(event);" 
                                                        value="<?php htmlout($admin_firstname); ?>" 
                                                        required
                                                        oninvalid="invalidfirstname(this);"
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Middle Name</label>
                                                    <input 
                                                        type="text" 
                                                        name="admin_middlename"
                                                        class="form-control" 
                                                        onkeydown="capitalize(this)" 
                                                        onkeypress="return onlyletters(event);" 
                                                        value="<?php htmlout($admin_middlename); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Last Name</label>
                                                    <input 
                                                        type="text" 
                                                        name="admin_lastname" 
                                                        class="form-control upperCase" 
                                                        onkeydown="capitalize(this)" 
                                                        onkeypress="return onlyletters(event);" 
                                                        value="<?php htmlout($admin_lastname); ?>" 
                                                        required
                                                        oninvalid="invalidlastname(this);"
                                                        >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Username</label>
                                                    <input 
                                                        type="text" 
                                                        name="admin_username" 
                                                        class="form-control" 
                                                        value="<?php htmlout($admin_username); ?>" 
                                                        onkeypress="return blockSpecialChar(event)" 
                                                        required
                                                        oninvalid="invalidusername(this);"
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Password</label>
                                                    <input 
                                                        type="password" 
                                                        name="admin_password" 
                                                        id="admin_password" 
                                                        class="form-control" 
                                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  
                                                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
                                                        required
                                                        oninvalid="invalidpassword(this);"
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Confirm Password</label>
                                                    <input 
                                                        type="password" 
                                                        name="confirm_password" 
                                                        id="confirm_password" 
                                                        class="form-control" 
                                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  
                                                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
                                                        required
                                                        oninvalid="validatePassword(this);"
                                                        >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Home Address</label>
                                                    <input 
                                                        type="text" 
                                                        name="admin_address" 
                                                        class="form-control" 
                                                        onkeydown="capitalize(this)" 
                                                        value="<?php htmlout($amdin_address); ?>" 
                                                        required
                                                        oninvalid="invalidaddress(this);"
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Contact No.</label>
                                                    <input 
                                                        type="text" 
                                                        name="admin_contact" 
                                                        minlength="11" 
                                                        maxlength="11" 
                                                        class="form-control" 
                                                        onkeypress="return isNumberKey(event)" 
                                                        value="<?php htmlout($admin_contact); ?>" 
                                                        required
                                                        oninvalid="invalidcontact(this);"
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Email</label>
                                                    <input 
                                                        type="email" 
                                                        name="admin_email" 
                                                        class="form-control" 
                                                        value="<?php htmlout($admin_email); ?>" 
                                                        required
                                                        oninvalid="invalidemail(this);"
                                                        >
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div>
                                                        <span class="btn btn-raised btn-round btn-default btn-file">
                                                            <span class="fileinput-new">Add Photo</span>
                                                        <input 
                                                            type="file" 
                                                            name="image" 
                                                            id="file"  
                                                            onchange="return fileValidation()" 
                                                            class="form-control" 
                                                            accept="images/*"
                                                            value="<?php echo htmlout($admin_image); ?>"
                                                            />
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 img-circle img-responsive" id="imagePreview">
                                            </div>
                                        </div>
                                        <input 
                                            type="hidden" 
                                            id="image1" 
                                            name="image1"
                                            value="<?php echo $admin_image; ?>">
                                        <input 
                                            type="hidden" 
                                            id="id" name="id" 
                                            value="<?php htmlout($admin_id); ?>">
                                        <button 
                                            type="submit" 
                                            class="btn btn-<?php htmlout($buttoncolor); ?> pull-right">
                                            <?php htmlout($button); ?>
                                        </button>
                                        <div class="clearfix"></div>
                                    </form>
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

<!-- DATATABLES -->
<script>
    $(document).ready( function () {
        $('#admin_table').DataTable();
    } );
</script>

<!-- FUNCTION FOR INPUT ONLY LETTERS -->
<script>
    function onlyletters(event)
    {
        var char = event.which;
        if(char > 31 && char != 32 &&  (char < 65 || char > 90) && (char < 97 || char > 122))
        {
            return false;
        }
        
    }
</script>

<!-- FUNTION FOR CAPITALIZE EVERY FIRST LETTER OF EACH WORD -->
<script>
   function capitalize(obj)
    {
        obj.value = obj.value.split(' ').map(eachWord=>
        eachWord.charAt(0).toUpperCase() + eachWord.slice(1)
        ).join(' ');
    }
</script>

<!-- FUNCTION FOR INPUT NUMBER ONLY -->
<script>
    function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
</script>

<!-- FUNCTION FOR VALIDATION OF IMAGE EXTENSIONS -->
<script>
    function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        swal(
                'Error File Extension!',
                'Please upload file having extensions .jpeg/.jpg/.png/.gif only.',
                'error'
                )
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
</script>


<script>
    var admin_password = document.getElementById("admin_password")
    , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
    if(admin_password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
        confirm_password.setCustomValidity('');
    }
    }

    admin_password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>


<!-- FUNCTION FOR NO WHITE SPACES -->
<script type="text/javascript">
        function blockSpecialChar(e) {
            var k = e.keyCode;
            return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8   || (k >= 48 && k <= 57));
        }
</script>

<script>
    var admin_password = document.getElementById("admin_password");

    function invalidfirstname(textbox) {
	    if (textbox.value == '') {
	        textbox.setCustomValidity('Please Enter Your First Name');
	    }
	    else{
	       textbox.setCustomValidity('');
	       
	    }
   		 return true;

	}
    function invalidlastname(textbox) {
	    if (textbox.value == '') {
	        textbox.setCustomValidity('Please Enter Your Last Name');
	    }
	    else{
	       textbox.setCustomValidity('');
	       
	    }
   		 return true;

	}
    function invalidusername(textbox) {
	    if (textbox.value == '') {
	        textbox.setCustomValidity('Please Enter Your Username');
	    }
	    else{
	       textbox.setCustomValidity('');
	       
	    }
   		 return true;

	}
    function invalidpassword(textbox) {
	    if (textbox.value == '') {
	        textbox.setCustomValidity('Please Enter Your Password');
	    }
	    else{
	       textbox.setCustomValidity('');
	       
	    }
   		 return true;

	}
    function invalidconfirmpassword(textbox) {
	    if (textbox.value == '') {
	        textbox.setCustomValidity('Please Enter Your Confirm Password');
	    }
	    else{
	       textbox.setCustomValidity('');

	    }
   		 return true;

	}
    function invalidaddress(textbox) {
	    if (textbox.value == '') {
	        textbox.setCustomValidity('Please Enter Your Home Address');
	    }
	    else{
	       textbox.setCustomValidity('');
	       
	    }
   		 return true;

	}
    function invalidcontact(textbox) {
	    if (textbox.value == '') {
	        textbox.setCustomValidity('Please Enter Your Contact Number');
	    }
	    else{
	       textbox.setCustomValidity('');
	       
	    }
   		 return true;

	}
    function invalidemail(textbox) {
	    if (textbox.value == '') {
	        textbox.setCustomValidity('Please Enter Your Email');
	    }
	    else{
	       textbox.setCustomValidity('');
	       
	    }
   		 return true;

	}
    
</script>
</html>