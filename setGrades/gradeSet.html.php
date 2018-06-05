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
                        <a href=".">
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
                                                <h4 class="title"><?php htmlout($title); ?><?php htmlout($studentName); ?></h4>
                                                <p class="category">Set Item/Quiz Scores</p>
                                            </div>  
                                    </div>
                                    <div class="card-content">
                                        <div class="col">
                                            <small>Highest Possible Scores</small>
                                        </div>
                                        <?php if(isset($_GET['setWrittenworks']) or isset($_GET['setPerformancetask'])): ?>
                                        <div class="row">
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quiz 1</label>
                                                        <input 
                                                            type="text"
                                                            id="qi1"
                                                            class="qi1 form-control" 
                                                            value="<?php htmlout($q1); ?>" 
                                                            disabled
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quiz 2</label>
                                                        <input 
                                                            type="text"
                                                            id="qi2" 
                                                            class="form-control"
                                                            value="<?php htmlout($q2); ?>"
                                                            disabled
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quiz 3</label>
                                                        <input 
                                                            type="text"
                                                            id="qi3"
                                                            class="form-control" 
                                                            value="<?php htmlout($q3); ?>"
                                                            disabled
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quiz 4</label>
                                                        <input 
                                                            type="text"
                                                            id="qi4"
                                                            class="form-control" 
                                                            value="<?php htmlout($q4); ?>" 
                                                            disabled
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quiz 5</label>
                                                        <input 
                                                            type="text"
                                                            id="qi5"
                                                            class="form-control" 
                                                            value="<?php htmlout($q5); ?>" 
                                                            disabled
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quiz 6</label>
                                                        <input 
                                                            type="text"
                                                            id="qi6"
                                                            class="form-control" 
                                                            value="<?php htmlout($q6); ?>" 
                                                            disabled
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quiz 7</label>
                                                        <input 
                                                            type="text"
                                                            id="qi7"
                                                            class="form-control" 
                                                            value="<?php htmlout($q7); ?>" 
                                                            disabled
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quiz 8</label>
                                                        <input 
                                                            type="text"
                                                            id="qi8"
                                                            class="form-control" 
                                                            value="<?php htmlout($q8); ?>" 
                                                            disabled
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quiz 9</label>
                                                        <input 
                                                            type="text"
                                                            id="qi9"
                                                            class="form-control" 
                                                            value="<?php htmlout($q9); ?>" 
                                                            disabled
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quiz 10</label>
                                                        <input 
                                                            type="text"
                                                            id="qi10"
                                                            class="form-control" 
                                                            value="<?php htmlout($q10); ?>" 
                                                            disabled
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
                                                            id="itemtotal"
                                                            class="form-control" 
                                                            value="<?php htmlout($totalitem); ?>" 
                                                            disabled
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">PS</label>
                                                        <input 
                                                            type="text" 
                                                            id="wwpercentage"
                                                            class="form-control" 
                                                            value="<?php htmlout($ps); ?>" 
                                                            disabled
                                                            >
                                                            
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">WS</label>
                                                        <input 
                                                            type="text"
                                                            id="wsweighted"
                                                            class="form-control" 
                                                            value="<?php htmlout($ws); ?>"  
                                                            disabled
                                                            >
                                                    </div>
                                                </div>
                                        </div>
                                        <?php endif; ?> 

                                        <?php if(isset($_GET['setQuarterlyassessment'])): ?>                     
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="col-md-2">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Quarterly Test</label>
                                                            <input 
                                                                type="text"
                                                                id="qa1"
                                                                class="form-control"  
                                                                value="<?php htmlout($q1); ?>"
                                                                disabled
                                                                >
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">PS</label>
                                                        <input 
                                                            type="text"
                                                            id="qaps1" 
                                                            class="form-control" 
                                                            value="<?php htmlout($ps); ?>"
                                                            disabled
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">WS</label>
                                                        <input 
                                                            type="text"
                                                            id="qaws1"
                                                            class="form-control"  
                                                            value="<?php htmlout($ws); ?>"
                                                            disabled
                                                            >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col">
                                                    <small><strong>Written Works</strong></small>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Score</label>
                                                                <input 
                                                                    type="text"
                                                                    id="wwscore" 
                                                                    class="form-control"  
                                                                    value="<?php htmlout($wwscore); ?>"
                                                                    disabled
                                                                    >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">PS</label>
                                                            <input 
                                                                type="text"
                                                                id="wwps" 
                                                                class="form-control" 
                                                                value="<?php htmlout($wwps); ?>"
                                                                disabled
                                                                >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">WS</label>
                                                            <input 
                                                                type="text"
                                                                id="wwws"
                                                                class="form-control"  
                                                                value="<?php htmlout($wwws); ?>"
                                                                disabled
                                                                >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <small><strong>Performance Tasks</strong></small>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Score</label>
                                                                <input 
                                                                    type="text"
                                                                    id="ptscore" 
                                                                    class="form-control"  
                                                                    value="<?php htmlout($ptscore); ?>"
                                                                    disabled
                                                                    >
                                                                    
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">PS</label>
                                                            <input 
                                                                type="text"
                                                                id="ptps" 
                                                                class="form-control" 
                                                                value="<?php htmlout($ptps); ?>"
                                                                disabled
                                                                >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">WS</label>
                                                            <input 
                                                                type="text"
                                                                id="ppws"
                                                                class="form-control"  
                                                                value="<?php htmlout($ppws); ?>"
                                                                disabled
                                                                >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <small><strong>Quarterly Assessment</strong></small>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Score</label>
                                                                <input 
                                                                    type="text"
                                                                    id="qascore" 
                                                                    class="form-control"  
                                                                    value="<?php htmlout($qas1); ?>"
                                                                    disabled
                                                                    >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group label-static">
                                                            <label class="control-label">PS</label>
                                                            <input 
                                                                type="text"
                                                                id="qaps2"
                                                                class="form-control" 
                                                                value="<?php htmlout($qaps); ?>"
                                                                disabled
                                                                >
                                                                <input 
                                                                type="hidden"
                                                                id="qaps"
                                                                name="qaps" 
                                                                class="form-control" 
                                                                value="<?php htmlout($qaps); ?>"
                                                                >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">WS</label>
                                                            <input 
                                                                type="text"
                                                                id="qaws2"
                                                                class="form-control"  
                                                                value="<?php htmlout($qaws); ?>"
                                                                diabled
                                                                onchange="qaFunction()"
                                                                >
                                                                <input 
                                                                type="hidden"
                                                                id="qaws"
                                                                name="qaws"
                                                                class="form-control"  
                                                                value="<?php htmlout($qaws); ?>"
                                                                >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <small>Initial Grade and Quarterly Grade</small>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group label-static">
                                                            <label class="control-label">Initial Grade</label>
                                                                <input 
                                                                    type="text"
                                                                    id="ig1"
                                                                    class="form-control"  
                                                                    value="<?php htmlout($ig); ?>"
                                                                    disabled
                                                                    onChange="qaFunction()"
                                                                    >
                                                                    <input 
                                                                    type="hidden"
                                                                    id="ig"
                                                                    name="ig" 
                                                                    class="form-control"  
                                                                    value="<?php htmlout($ig); ?>"
                                                                    onChange="qaFunction()"
                                                                    >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group label-static">
                                                            <label class="control-label">Quarterly Grade</label>
                                                                <input 
                                                                    type="text"
                                                                    id="qg1"
                                                                    class="form-control"  
                                                                    value="<?php htmlout($qg); ?>"
                                                                    disabled
                                                                    >
                                                                    <input 
                                                                    type="hidden"
                                                                    id="qg"
                                                                    name="qg"
                                                                    class="form-control"  
                                                                    value="<?php htmlout($qg); ?>"
                                                                    >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                        <hr>
                                        <div class="col">
                                            <small>Student Quiz Scores</small>
                                        </div>
                                        <?php if(isset($_GET['setQuarterlyassessment'])): ?> 
                                               
                                        <div class="row">
                                                <div class="col-md-1">
                                                    <div class="form-group label-static">
                                                            <label class="control-label">Test Score</label>
                                                            <input 
                                                                type="text"
                                                                id="qas1"
                                                                name="qas1" 
                                                                class="form-control"
                                                                onkeypress="return isNumberKey(event);"  
                                                                value="<?php htmlout($qas1); ?>"
                                                                onFocus="if(this.value == '<?php htmlout($qas1); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($qas1); ?>';}"
                                                                onChange="qaFunction()"
                                                                
                                                                >
                                                    </div>
                                                </div>
                                        </div>
                                        <?php endif; ?>      

                                        <?php if(isset($_GET['setWrittenworks']) or isset($_GET['setPerformancetask'])): ?>
                                        <div class="row">
                                            
                                            <div class="col-md-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Quiz 1</label>
                                                    <input 
                                                        type="text" 
                                                        name="q1" 
                                                        class="quiz1 form-control" 
                                                        id="quiz1"
                                                        onkeypress="return isNumberKey(event);"  
                                                        value="<?php htmlout($qs1); ?>"
                                                        onFocus="if(this.value == '<?php htmlout($qs1); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($qs1); ?>';}"
                                                        onchange="myFunction()" 
                                                        
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Quiz 2</label>
                                                    <input 
                                                        type="text" 
                                                        name="q2" 
                                                        class="form-control " 
                                                        id="quiz2"
                                                        onkeypress="return isNumberKey(event);"  
                                                        value="<?php htmlout($qs2); ?>"
                                                        onFocus="if(this.value == '<?php htmlout($qs2); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($qs2); ?>';}"
                                                        onchange="myFunction()" 
                                                        
                                                        >

                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Quiz 3</label>
                                                    <input 
                                                        type="text" 
                                                        name="q3" 
                                                        class="form-control " 
                                                        id="quiz3"
                                                        onkeypress="return isNumberKey(event);"  
                                                        value="<?php htmlout($qs3); ?>"
                                                        onFocus="if(this.value == '<?php htmlout($qs3); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($qs3); ?>';}"
                                                        onchange="myFunction()" 
                                                        
                                                        >

                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Quiz 4</label>
                                                    <input 
                                                        type="text" 
                                                        name="q4" 
                                                        class="form-control " 
                                                        id="quiz4"
                                                        onkeypress="return isNumberKey(event);"  
                                                        value="<?php htmlout($qs4); ?>"
                                                        onFocus="if(this.value == '<?php htmlout($qs4); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($qs4); ?>';}"
                                                        onchange="myFunction()" 
                                                        
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Quiz 5</label>
                                                    <input 
                                                        type="text" 
                                                        name="q5" 
                                                        class="form-control " 
                                                        id="quiz5"
                                                        onkeypress="return isNumberKey(event);"  
                                                        value="<?php htmlout($qs5); ?>"
                                                        onFocus="if(this.value == '<?php htmlout($qs5); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($qs5); ?>';}"
                                                        onchange="myFunction()" 
                                                        
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Quiz 6</label>
                                                    <input 
                                                        type="text" 
                                                        name="q6" 
                                                        class="form-control " 
                                                        id="quiz6"
                                                        onkeypress="return isNumberKey(event);"  
                                                        value="<?php htmlout($qs6); ?>"
                                                        onFocus="if(this.value == '<?php htmlout($qs6); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($qs6); ?>';}" 
                                                        onchange="myFunction()"
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Quiz 7</label>
                                                    <input 
                                                        type="text" 
                                                        name="q7" 
                                                        class="form-control " 
                                                        id="quiz7"
                                                        onkeypress="return isNumberKey(event);"  
                                                        value="<?php htmlout($qs7); ?>"
                                                        onFocus="if(this.value == '<?php htmlout($qs7); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($qs7); ?>';}" 
                                                        onchange="myFunction()"
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Quiz 8</label>
                                                    <input 
                                                        type="text" 
                                                        name="q8" 
                                                        class="form-control " 
                                                        id="quiz8"
                                                        onkeypress="return isNumberKey(event);"  
                                                        value="<?php htmlout($qs8); ?>"
                                                        onFocus="if(this.value == '<?php htmlout($qs8); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($qs8); ?>';}" 
                                                        onchange="myFunction()"
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Quiz 9</label>
                                                    <input 
                                                        type="text" 
                                                        name="q9" 
                                                        class="form-control " 
                                                        id="quiz9"
                                                        onkeypress="return isNumberKey(event);"  
                                                        value="<?php htmlout($qs9); ?>"
                                                        onFocus="if(this.value == '<?php htmlout($qs9); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($qs9); ?>';}" 
                                                        onchange="myFunction()"
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Quiz 10</label>
                                                    <input 
                                                        type="text" 
                                                        name="q10" 
                                                        class="form-control " 
                                                        id="quiz10"
                                                        onkeypress="return isNumberKey(event);"  
                                                        value="<?php htmlout($qs10); ?>"
                                                        onFocus="if(this.value == '<?php htmlout($qs10); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php htmlout($qs10); ?>';}" 
                                                        onchange="myFunction()"
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
                                                            id="result"
                                                            class="form-control" 
                                                            value="<?php htmlout($qtotal); ?>" 
                                                            disabled
                                                            >
                                                            
                                                        <input 
                                                            type="hidden" 
                                                            name="total"
                                                            id="result1"
                                                            class="form-control" 
                                                            value="<?php htmlout($qtotal); ?>"
                                                            >
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                    <div class="form-group label-static">
                                                        <label class="control-label">PS</label>
                                                        <input 
                                                            type="text" 
                                                            id="pstotal"
                                                            class="form-control" 
                                                            value="<?php htmlout($qps); ?>" 
                                                            disabled
                                                            >
                                                            <input 
                                                            type="hidden" 
                                                            id="pstotal1"
                                                            name="ps" 
                                                            class="form-control" 
                                                            value="<?php htmlout($qps); ?>"
                                                            >
                                                            
                                                    </div>
                                            </div>
                                            <div class="col-md-1">
                                                    <div class="form-group label-static">
                                                        <label class="control-label">WS</label>
                                                        <input 
                                                            type="text" 
                                                            id="wstotal"
                                                            class="form-control"  
                                                            value="<?php htmlout($qws); ?>"  
                                                            disabled
                                                            >
                                                            <input 
                                                            type="hidden" 
                                                            name="ws" 
                                                            id="wstotal1"
                                                            class="form-control"  
                                                            value="<?php htmlout($qws); ?>"  
                                                            >
                                                    </div>
                                                </div>
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                    <div class="card-footer text-right">
                                        <input type="text" name="teacherid" value="<?php htmlout($teacherid); ?>">
                                        <input type="text" name="subjectid" value="<?php htmlout($subjectid); ?>">
                                        <input type="text" name="quarter" value="<?php htmlout($quarter); ?>">
                                        <input type="text" name="schoolyear" value="<?php htmlout($schoolyear); ?>">
                                        <input type="text" name="studentid" value="<?php htmlout($studentid); ?>">
                                        <?php if(isset($_GET['setWrittenworks'])): ?>
                                        <input type="submit" class="btn btn-success" name="setww" value="Submit">
                                        <?php endif; ?>
                                        <?php if(isset($_GET['setPerformancetask'])): ?>
                                        <input type="submit" class="btn btn-primary" name="setpt" value="Submit">
                                        <?php endif; ?>
                                        <?php if(isset($_GET['setQuarterlyassessment'])): ?>
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
<!--
<script>
      $(document).ready(function(e){
          $("input").change(function(){
         var sumall = 0;
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
<script>
    $(document).ready(function(){
        $("input").change(function(){
        var test2 = $("input[class=test2]").val();
        var test1 = $("input[class=test1]").val();
      
        if(test1 > test2)
        {
            swal({
            type: 'error',
            title: 'Oops...',
            text: 'Score must be lower or equal to the Highest Possbile Score',
            })
            $("input[class=quiz1]").val(0);
        }
        });
    });
  </script>-->
    <script>
        function myFunction()
        {
            var qi1 = document.getElementById("qi1").value;
            var qi2 = document.getElementById("qi2").value;
            var qi3 = document.getElementById("qi3").value;
            var qi4 = document.getElementById("qi4").value;
            var qi5 = document.getElementById("qi5").value;
            var qi6 = document.getElementById("qi6").value;
            var qi7 = document.getElementById("qi7").value;
            var qi8 = document.getElementById("qi8").value;
            var qi9 = document.getElementById("qi9").value;
            var qi10 = document.getElementById("qi10").value;

            var quiz1 = document.getElementById("quiz1").value;
            var quiz2 = document.getElementById("quiz2").value;
            var quiz3 = document.getElementById("quiz3").value;
            var quiz4 = document.getElementById("quiz4").value;
            var quiz5 = document.getElementById("quiz5").value;
            var quiz6 = document.getElementById("quiz6").value;
            var quiz7 = document.getElementById("quiz7").value;
            var quiz8 = document.getElementById("quiz8").value;
            var quiz9 = document.getElementById("quiz9").value;
            var quiz10 = document.getElementById("quiz10").value;
            var itemtotal = document.getElementById("itemtotal").value;
            var wwpercentage = document.getElementById("wwpercentage").value;
            var wsweighted = document.getElementById("wsweighted").value;
            var sumall = 0;
            var pstotal = 0;
            var wstotal = 0;
            
            if(parseInt(quiz1) > parseInt(qi1) || parseInt(quiz2) > parseInt(qi2) || parseInt(quiz3) > parseInt(qi3) || parseInt(quiz4) > parseInt(qi4) || parseInt(quiz5) > parseInt(qi5) || parseInt(quiz6) > parseInt(qi6) || parseInt(quiz7) > parseInt(qi7) || parseInt(quiz8) > parseInt(qi8) || parseInt(quiz9) > parseInt(qi9) || parseInt(quiz10) > parseInt(qi10) )
            {
                swal({
                type: 'error',
                title: 'Oops...',
                text: 'Score must be lower or equal to the Highest Possbile Score',
                });
                document.getElementById("quiz1").value = <?php htmlout($qs1); ?>;
                document.getElementById("quiz2").value = <?php htmlout($qs2); ?>;
                document.getElementById("quiz3").value = <?php htmlout($qs3); ?>;
                document.getElementById("quiz4").value = <?php htmlout($qs4); ?>;
                document.getElementById("quiz5").value = <?php htmlout($qs5); ?>;
                document.getElementById("quiz6").value = <?php htmlout($qs6); ?>;
                document.getElementById("quiz7").value = <?php htmlout($qs7); ?>;
                document.getElementById("quiz8").value = <?php htmlout($qs8); ?>;
                document.getElementById("quiz9").value = <?php htmlout($qs9); ?>;
                document.getElementById("quiz10").value = <?php htmlout($qs10); ?>;
                document.getElementById("result").value;
                document.getElementById("pstotal").value;

            }
            else
            {
                sumall = parseInt(quiz1) + parseInt(quiz2) + parseInt(quiz3) + parseInt(quiz4) + parseInt(quiz5) + parseInt(quiz6) + parseInt(quiz7) + parseInt(quiz8) + parseInt(quiz9) + parseInt(quiz10);
                document.getElementById("result").value = sumall;
                document.getElementById("result1").value = sumall;

                pstotal = (sumall/itemtotal) * wwpercentage;
                var pstotal2 = parseFloat(pstotal).toFixed(2);
                document.getElementById("pstotal").value = pstotal2;
                document.getElementById("pstotal1").value = pstotal2;

                wstotal = (sumall/itemtotal) * wsweighted;
                var wstotal2 = parseFloat(wstotal).toFixed(2);
                document.getElementById("wstotal").value =  wstotal2;
                document.getElementById("wstotal1").value = wstotal2;
            }

        }
    </script>

    <script>
        function qaFunction()
        {
            var qa1 = document.getElementById("qa1").value;
            var qaps1 = document.getElementById("qaps1").value;
            var qaws1 = document.getElementById("qaws1").value;

            var wwscore = document.getElementById("wwscore").value;
            var wwps = document.getElementById("wwps").value;
            

            var ptscore = document.getElementById("ptscore").value;
            
            var ptps = document.getElementById("ptps").value;

            var qascore = document.getElementById("qascore").value;
            var qaps = document.getElementById("qaps").value;
            
            var qaws = document.getElementById("qaws").value;
            var wwws = document.getElementById("wwws").value;
            var ppws = document.getElementById("ppws").value;

            var ig = document.getElementById("ig").value;
            var qg = document.getElementById("qg").value;

            var qas1 = document.getElementById("qas1").value;

            var qapstotal = 0;
            var qawwtotal = 0;

            var igtotal = 0;
            
            var qgtotal = 0;

            if(parseInt(qas1) > parseInt(qa1))
            {
                swal({
                type: 'error',
                title: 'Oops...',
                text: 'Score must be lower or equal to the Highest Possbile Score',
                });
                document.getElementById("qas1").value = <?php htmlout($qas1); ?>;
            }
            else
            {
                qapstotal = (qas1/qa1) * qaps1;
                var qapstotal1 = parseFloat(qapstotal).toFixed(2);
                document.getElementById("qaps").value = qapstotal1;
                document.getElementById("qaps2").value = qapstotal1;

                qawwtotal = (qas1/qa1) * qaws1;
                var qawwtotal1 = parseFloat(qawwtotal).toFixed(2);
                document.getElementById("qaws").value = qawwtotal1;
                document.getElementById("qaws2").value = qawwtotal1;

                
                var igtotal = parseFloat(ppws) + parseFloat(wwws) + parseFloat(qawwtotal1)  ;
                var igtotal1 = parseFloat(igtotal).toFixed(2);
                document.getElementById("ig").value = igtotal1;
                document.getElementById("ig1").value = igtotal1;
                document.getElementById("qascore").value = qas1;

                

            }
            if(parseFloat(igtotal1) >= 100.00 && parseFloat(igtotal1) <= 100.00)
            {
                    document.getElementById("qg").value = 100;
                    document.getElementById("qg1").value = 100;
            }
            else if(parseFloat(igtotal1) >= 98.40 && parseFloat(igtotal1) <= 99.99)
            {
                document.getElementById("qg").value = 99;
                document.getElementById("qg1").value = 99;
            }
            else if(parseFloat(igtotal1) >= 96.80 && parseFloat(igtotal1) <= 98.39)
            {
                document.getElementById("qg").value = 98;
                document.getElementById("qg1").value = 98;
            }
            else if(parseFloat(igtotal1) >= 95.20 && parseFloat(igtotal1) <= 96.79)
            {
                document.getElementById("qg").value = 97;
                document.getElementById("qg1").value = 97;
            }
            else if(parseFloat(igtotal1) >= 93.60 && parseFloat(igtotal1) <= 95.19)
            {
                document.getElementById("qg").value = 96;
                document.getElementById("qg1").value = 96;
            }
            else if(parseFloat(igtotal1) >= 92.00 && parseFloat(igtotal1) <= 93.59)
            {
                document.getElementById("qg").value = 95;
                document.getElementById("qg1").value = 95;
            }
            else if(parseFloat(igtotal1) >= 90.40 && parseFloat(igtotal1) <= 91.99)
            {
                document.getElementById("qg").value = 94;
                document.getElementById("qg1").value = 94;
            }
            else if(parseFloat(igtotal1) >= 88.80 && parseFloat(igtotal1) <= 90.39)
            {
                document.getElementById("qg").value = 93;
                document.getElementById("qg1").value = 93;
            }
            else if(parseFloat(igtotal1) >= 87.20 && parseFloat(igtotal1) <= 88.79)
            {
                document.getElementById("qg").value = 92;
                document.getElementById("qg1").value = 92;
            }
            else if(parseFloat(igtotal1) >= 85.60 && parseFloat(igtotal1) <= 87.19)
            {
                document.getElementById("qg").value = 91;
                document.getElementById("qg1").value = 91;
            }
            else if(parseFloat(igtotal1) >= 84.00 && parseFloat(igtotal1) <= 85.59)
            {
                document.getElementById("qg").value = 90;
                document.getElementById("qg1").value = 90;
            }
            else if(parseFloat(igtotal1) >= 82.40 && parseFloat(igtotal1) <= 83.99)
            {
                document.getElementById("qg").value = 89;
                document.getElementById("qg1").value = 89;
            }
            else if(parseFloat(igtotal1) >= 80.80 && parseFloat(igtotal1) <= 82.39)
            {
                document.getElementById("qg").value = 88;
                document.getElementById("qg1").value = 88;
            }
            else if(parseFloat(igtotal1) >= 79.20 && parseFloat(igtotal1) <= 80.79)
            {
                document.getElementById("qg").value = 87;
                document.getElementById("qg1").value = 87;
            }
            else if(parseFloat(igtotal1) >= 77.60 && parseFloat(igtotal1) <= 79.19)
            {
                document.getElementById("qg").value = 86;
                document.getElementById("qg1").value = 86;
            }
            else if(parseFloat(igtotal1) >= 76.00 && parseFloat(igtotal1) <= 77.59)
            {
                document.getElementById("qg").value = 85;
                document.getElementById("qg1").value = 85;
            }
            else if(parseFloat(igtotal1) >= 74.40 && parseFloat(igtotal1) <= 75.99)
            {
                document.getElementById("qg").value = 84;
                document.getElementById("qg1").value = 84;
            }
            else if(parseFloat(igtotal1) >= 72.80 && parseFloat(igtotal1) <= 74.39)
            {
                document.getElementById("qg").value = 83;
                document.getElementById("qg1").value = 83;
            }
            else if(parseFloat(igtotal1) >= 71.20 && parseFloat(igtotal1) <= 72.79)
            {
                document.getElementById("qg").value = 82;
                document.getElementById("qg1").value = 82;
            }
            else if(parseFloat(igtotal1) >= 69.60 && parseFloat(igtotal1) <= 71.19)
            {
                document.getElementById("qg").value = 81;
                document.getElementById("qg1").value = 81;
            }
            else if(parseFloat(igtotal1) >= 68.00 && parseFloat(igtotal1) <= 69.59)
            {
                document.getElementById("qg").value = 80;
                document.getElementById("qg1").value = 80;
            }
            else if(parseFloat(igtotal1) >= 66.40 && parseFloat(igtotal1) <= 67.99)
            {
                document.getElementById("qg").value = 79;
                document.getElementById("qg1").value = 79;
            }
            else if(parseFloat(igtotal1) >= 64.80 && parseFloat(igtotal1) <= 66.39)
            {
                document.getElementById("qg").value = 78;
                document.getElementById("qg1").value = 78;
            }
            else if(parseFloat(igtotal1) >= 63.20 && parseFloat(igtotal1) <= 64.79)
            {
                document.getElementById("qg").value = 77;
                document.getElementById("qg1").value = 77
            }
            else if(parseFloat(igtotal1) >= 61.60 && parseFloat(igtotal1) <= 63.19)
            {
                document.getElementById("qg").value = 76;
                document.getElementById("qg1").value = 76;
            }
            else if(parseFloat(igtotal1) >= 60.00 && parseFloat(igtotal1) <= 61.59)
            {
                document.getElementById("qg").value = 75;
                document.getElementById("qg1").value = 75;
            }
            else if(parseFloat(igtotal1) >= 56.00 && parseFloat(igtotal1) <= 59.99)
            {
                document.getElementById("qg").value = 74;
                document.getElementById("qg1").value = 74;
            }
            else if(parseFloat(igtotal1) >= 52.00 && parseFloat(igtotal1) <= 55.99)
            {
                document.getElementById("qg").value = 73;
                document.getElementById("qg1").value = 73;
            }
            else if(parseFloat(igtotal1) >= 48.00 && parseFloat(igtotal1) <= 51.99)
            {
                document.getElementById("qg").value = 72;
                document.getElementById("qg1").value = 72;
            }
            else if(parseFloat(igtotal1) >= 44.00 && parseFloat(igtotal1) <= 47.99)
            {
                document.getElementById("qg").value = 71;
                document.getElementById("qg1").value = 71;
            }
            else if(parseFloat(igtotal1) >= 40.00 && parseFloat(igtotal1) <= 43.99)
            {
                document.getElementById("qg").value = 70;
                document.getElementById("qg1").value = 70;
            }
            else if(parseFloat(igtotal1) >= 36.00 && parseFloat(igtotal1) <= 39.99)
            {
                document.getElementById("qg").value = 69;
                document.getElementById("qg1").value = 69;
            }
            else if(parseFloat(igtotal1) >= 32.00 && parseFloat(igtotal1) <= 35.99)
            {
                document.getElementById("qg").value = 68;
                document.getElementById("qg1").value = 68;
            }
            else if(parseFloat(igtotal1) >= 28.00 && parseFloat(igtotal1) <= 31.99)
            {
                document.getElementById("qg").value = 67;
                document.getElementById("qg1").value = 67;
            }
            else if(parseFloat(igtotal1) >= 24.00 && parseFloat(igtotal1) <= 27.99)
            {
                document.getElementById("qg").value = 66;
                document.getElementById("qg1").value = 66;
            }
            else if(parseFloat(igtotal1) >= 20.00 && parseFloat(igtotal1) <= 23.99)
            {
                document.getElementById("qg").value = 65;
                document.getElementById("qg1").value = 65;
            }
            else if(parseFloat(igtotal1) >= 16.00 && parseFloat(igtotal1) <= 19.99)
            {
                document.getElementById("qg").value = 64;
                document.getElementById("qg1").value = 64;
            }
            else if(parseFloat(igtotal1) >= 12.00 && parseFloat(igtotal1) <= 15.99)
            {
                document.getElementById("qg").value = 63;
                document.getElementById("qg1").value = 63;
            }
            else if(parseFloat(igtotal1) >= 8.00 && parseFloat(igtotal1) <= 11.99)
            {
                document.getElementById("qg").value = 62;
                document.getElementById("qg1").value = 62;
            }
            else if(parseFloat(igtotal1) >= 4.00 && parseFloat(igtotal1) <= 7.99)
            {
                document.getElementById("qg").value = 61;
                document.getElementById("qg1").value = 61;
            }
            else if(parseFloat(igtotal1) >= 0.00 && parseFloat(igtotal1) <= 3.99)
            {
                document.getElementById("qg").value = 60;
                document.getElementById("qg1").value = 60;
            }
        }
    </script>

</html>