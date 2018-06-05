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
                        <?php if(isset($_GET['writtenworks'])): ?>
                        <a href="?writtenworks">
                            <i class="material-icons">arrow_back</i>
                            <p>Back</p>
                        </a>
                        <?php endif; ?>
                        <?php if(isset($_GET['performancetask'])): ?>
                        <a href="?performancetask">
                            <i class="material-icons">arrow_back</i>
                            <p>Back</p>
                        </a>
                        <?php endif; ?>
                        <?php if(isset($_GET['quarterlyassessment'])): ?>
                        <a href="?quarterlyassessment">
                            <i class="material-icons">arrow_back</i>
                            <p>Back</p>
                        </a>
                        <?php endif; ?>
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
                                                <p class="category">Set Item/Quiz Scores</p>
                                            </div>  
                                    </div>
                                    <div class="card-content">
                                        <div class="col">
                                            <small>Highest Possible Scores</small>
                                        </div>
                                        <?php if(isset($_GET['writtenworks']) or isset($_GET['performancetask'])): ?>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quiz 1</label>
                                                        <input 
                                                            type="text" 
                                                            name="q1" 
                                                            class="form-control" 
                                                            id="quiz"
                                                            onkeypress="return isNumberKey(event);"  
                                                            value="<?php htmlout($q1); ?>"
                                                            onFocus="if(this.value == '<?php htmlout($q1); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($q1); ?>';}" 
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quiz 2</label>
                                                        <input 
                                                            type="text" 
                                                            name="q2" 
                                                            class="form-control" 
                                                            id="quiz"
                                                            onkeypress="return isNumberKey(event);" 
                                                            value="<?php htmlout($q2); ?>" 
                                                            onFocus="if(this.value == '<?php htmlout($q2); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($q2); ?>';}"
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quiz 3</label>
                                                        <input 
                                                            type="text" 
                                                            name="q3" 
                                                            id="quiz"
                                                            class="form-control" 
                                                            onkeypress="return isNumberKey(event);" 
                                                            value="<?php htmlout($q3); ?>" 
                                                            onFocus="if(this.value == '<?php htmlout($q3); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($q3); ?>';}"
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quiz 4</label>
                                                        <input 
                                                            type="text" 
                                                            name="q4" 
                                                            id="quiz"
                                                            class="form-control" 
                                                            onkeypress="return isNumberKey(event);" 
                                                            value="<?php htmlout($q4); ?>"
                                                            onFocus="if(this.value == '<?php htmlout($q4); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($q4); ?>';}" 
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quiz 5</label>
                                                        <input 
                                                            type="text" 
                                                            name="q5" 
                                                            id="quiz"
                                                            class="form-control" 
                                                            onkeypress="return isNumberKey(event);" 
                                                            value="<?php htmlout($q5); ?>"
                                                            onFocus="if(this.value == '<?php htmlout($q5); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($q5); ?>';}" 
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quiz 6</label>
                                                        <input 
                                                            type="text" 
                                                            name="q6" 
                                                            id="quiz"
                                                            class="form-control" 
                                                            onkeypress="return isNumberKey(event);" 
                                                            value="<?php htmlout($q6); ?>"
                                                            onFocus="if(this.value == '<?php htmlout($q6); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($q6); ?>';}" 
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quiz 7</label>
                                                        <input 
                                                            type="text" 
                                                            name="q7" 
                                                            id="quiz"
                                                            class="form-control" 
                                                            onkeypress="return isNumberKey(event);" 
                                                            value="<?php htmlout($q7); ?>"
                                                            onFocus="if(this.value == '<?php htmlout($q7); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($q7); ?>';}" 
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quiz 8</label>
                                                        <input 
                                                            type="text" 
                                                            name="q8" 
                                                            id="quiz"
                                                            class="form-control" 
                                                            onkeypress="return isNumberKey(event);" 
                                                            value="<?php htmlout($q8); ?>"
                                                            onFocus="if(this.value == '<?php htmlout($q8); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($q8); ?>';}" 
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quiz 9</label>
                                                        <input 
                                                            type="text" 
                                                            name="q9" 
                                                            id="quiz"
                                                            class="form-control"
                                                            onkeypress="return isNumberKey(event);" 
                                                            value="<?php htmlout($q9); ?>"
                                                            onFocus="if(this.value == '<?php htmlout($q9); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($q9); ?>';}" 
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quiz 10</label>
                                                        <input 
                                                            type="text" 
                                                            name="q10" 
                                                            id="quiz"
                                                            class="form-control" 
                                                            onkeypress="return isNumberKey(event);" 
                                                            value="<?php htmlout($q10); ?>"
                                                            onFocus="if(this.value == '<?php htmlout($q10); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($q10); ?>';}" 
                                                            >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <div class="form-group label-static">
                                                        <label class="control-label">Total</label>
                                                        <input 
                                                            type="text" 
                                                            name="total1"
                                                            id="result"
                                                            class="form-control" 
                                                            onkeypress="return isNumberKey(event);" 
                                                            value="<?php htmlout($totalitem); ?>" 
                                                            disabled
                                                            >
                                                        <input 
                                                            type="hidden" 
                                                            name="total"
                                                            id="result"
                                                            class="form-control" 
                                                            onkeypress="return isNumberKey(event);" 
                                                            value="<?php htmlout($totalitem); ?>"
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">PS</label>
                                                        <input 
                                                            type="text" 
                                                            id = "ps"
                                                            name="ps" 
                                                            class="form-control" 
                                                            onkeypress="return isNumberKey(event);" 
                                                            value="<?php htmlout($ps); ?>" 
                                                            onFocus="if(this.value == '<?php htmlout($ps); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($ps); ?>';}" 
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">WS</label>
                                                        <input 
                                                            type="text" 
                                                            name="ws" 
                                                            id="ws"
                                                            class="form-control"  
                                                            onkeypress="return isNumberKey(event);" 
                                                            value="<?php htmlout($ws); ?>"
                                                            onFocus="if(this.value == '<?php htmlout($ws); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($ws); ?>';}"  
                                                            >
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>   
                                        <?php if(isset($_GET['quarterlyassessment'])): ?>     
                                        <div class="row">   
                                            <div class="col-md-1">
                                                <div class="form-group label-floating">
                                                        <label class="control-label">Quarterly Test</label>
                                                        <input 
                                                            type="text" 
                                                            name="t1" 
                                                            class="form-control" 
                                                            id="quiz"
                                                            onkeypress="return isNumberKey(event);"  
                                                            value="<?php htmlout($q1); ?>"
                                                            onFocus="if(this.value == '<?php htmlout($q1); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($q1); ?>';}" 
                                                            >
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">PS</label>
                                                        <input 
                                                            type="text" 
                                                            id = "ps"
                                                            name="qps" 
                                                            class="form-control" 
                                                            onkeypress="return isNumberKey(event);" 
                                                            value="<?php htmlout($ps); ?>" 
                                                            onFocus="if(this.value == '<?php htmlout($ps); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($ps); ?>';}" 
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">WS</label>
                                                        <input 
                                                            type="text" 
                                                            name="qws" 
                                                            id="ws"
                                                            class="form-control"  
                                                            onkeypress="return isNumberKey(event);" 
                                                            value="<?php htmlout($ws); ?>"
                                                            onFocus="if(this.value == '<?php htmlout($ws); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($ws); ?>';}"  
                                                            >
                                                    </div>
                                                </div>
                                        </diV>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-footer text-right">
                                        <input type="hidden" name="teacherid" value="<?php htmlout($teacherid); ?>">
                                        <input type="hidden" name="subjectid" value="<?php htmlout($subjectid); ?>">
                                        <input type="hidden" name="setquarter" value="<?php htmlout($quarter); ?>">
                                        <input type="hidden" name="schoolyear" value="<?php htmlout($schoolyear); ?>">
                                        <?php if(isset($_GET['writtenworks'])):?>
                                        <input type="submit" class="btn btn-success" name="setww" value="Submit">
                                        <?php endif; ?>
                                        <?php if(isset($_GET['performancetask'])):?>
                                        <input type="submit" class="btn btn-primary" name="setpt" value="Submit">
                                        <?php endif; ?>
                                        <?php if(isset($_GET['quarterlyassessment'])):?>
                                        <input type="submit" class="btn btn-danger" name="setqa" value="Submit">
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
<script>
    function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
</script>
<script>
      $(document).ready(function(e){
          $("input").change(function(){
         var sumall =0;
          $("input[id=quiz]").each(function(){
             sumall = sumall + parseInt($(this).val());
            })
            $("input[id=result]").val(sumall);
          });
      });
  </script>
<script>
    $('#texttwo').keyup(function(){
        var textone;
        var texttwo;
        textone = parseFloat($('#textone').val());
        texttwo = parseFloat($('#texttwo').val());
        var result = textone + texttwo;
        $('#result').val(result.toFixed(2));


    });
</script>
</html>