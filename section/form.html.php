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
                                <div class="card-header" data-background-color="<?php htmlout($headercardcolor); ?>">

                                    <h4 class="title"><?php htmlout($title); ?></h4>
                                    <p class="category">Enter Complete Student Details</p>
                                </div>
                                <div class="card-content">
                                    <form action="?<?php htmlout($action); ?>" method="post">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Section Year</label>
                                                    <select name="section_year" class="form-control" required oninvalid="invalidSectionYear(this);">
                                                        <option value="<?php htmlout($section_year); ?>"><?php htmlout($section_year); ?></option>
                                                        <option value="I">I</option>
                                                        <option value="II">II</option>
                                                        <option value="III">III</option>
                                                        <option value="IV">IV</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Section Name</label>
                                                    <input 
                                                        type="text" 
                                                        name="section_name"
                                                        class="form-control" 
                                                        onkeydown="capitalize(this)" 
                                                        onkeypress="return onlyletters(event);" 
                                                        oninvalid="invalidSectionName(this);"
                                                        value="<?php htmlout($section_name); ?>"
                                                        required
                                                        >
                                                </div>
                                            </div>
                                        </div>
                                        <input 
                                            type="hidden" 
                                            id="id" name="sectionid" 
                                            value="<?php htmlout($section_id); ?>">
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


<!-- FUNCTION FOR NO WHITE SPACES -->
<script type="text/javascript">
        function blockSpecialChar(e) {
            var k = e.keyCode;
            return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8   || (k >= 48 && k <= 57));
        }
</script>

<script>
    function invalidSectionName(textbox) {
	    if (textbox.value == '') {
	        textbox.setCustomValidity('Please Enter Section Name');
	    }
	    else{
	       textbox.setCustomValidity('');
	       
	    }
   		 return true;

	}
    function invalidSectionYear(textbox) {
	    if (textbox.value == '') {
	        textbox.setCustomValidity('Please Select Section Year in the List');
	    }
	    else{
	       textbox.setCustomValidity('');
	       
	    }
   		 return true;

	}
</script>
</html>