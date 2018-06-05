            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Online Grading and Monitoring System</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i><?php echo $_SESSION['user_name']; ?>
                                    <p class="hidden-lg hidden-md">Notifications</p>
                                </a>
                                <ul class="dropdown-menu">


                                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/classes/settings.php'; ?>
                                    <?php if(dateSetting($_SESSION['userno'], $_SESSION['user_type'])): ?>

                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#schoolYear">Add School Year</a>
                                    </li>

                                    
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#selectSchoolYear">Set School Year</a>
                                    </li>
                                    <?php endif; ?>
                                    <li>
                                        <a href="?logout">Logout</a>
                                    </li>
                                    
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <?php  
            include $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/magicquotes.inc.php';
            
            if(isset($_POST['addSchoolYear']) AND $_POST['addSchoolYear'] == 'Submit')
            {
                include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';

                try
                {
                    $sql = 'SELECT COUNT(*) FROM table_school_year WHERE schoolyear = :schoolyear';
                    $s = $pdo->prepare($sql);
                    $s->bindValue(':schoolyear', $_POST['schoolyear']);
                    $s->execute();
                }
                catch(PDOException $e)
                {
                    echo '<script>alert("Error Checking School Year");</script>';
                }

                $hasSchoolYear = $s->fetch();

                if($hasSchoolYear[0] > 0)
                {
                    echo '<script>alert("School Year Already Exist!");</script>';
                }
                else
                {
                    try
                    {
                        $sql = 'INSERT INTO table_school_year SET schoolyear = :schoolyear, schoolyear_status = "Unset"';
                        $s = $pdo->prepare($sql);
                        $s->bindValue(':schoolyear', $_POST['schoolyear']);
                        $s->execute();
                    }
                    catch(PDOException $e)
                    {
                        echo '<script>alert("Error Inserting School Year");</script>';
                    }   
                }   
                echo "<meta http-equiv='refresh' content='0'>";    
            }

            include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';

            try
            {
                $unsetSchoolyear = $pdo->query('SELECT id, schoolyear FROM table_school_year WHERE schoolyear_status = "Unset" ORDER BY schoolyear ASC');
            }
            catch (PDOException $e)
            {
                echo '<script>alert("Error Fetching School Year");</script>';
            }

            foreach($unsetSchoolyear as $row)
            {
                $unsetSchoolyears[] = array(
                                        'id' => $row['id'],
                                        'schoolyear' => $row['schoolyear']
                                    );
            }

            try
            {
                $setSchoolYear = $pdo->query('SELECT * FROM table_school_year WHERE schoolyear_status = "Set"');
            }
            catch (PDOException $e)
            {
                echo '<script>alert("Error Fetching School Year");</script>';
            }
            foreach($setSchoolYear as $row)
            {
                $setSchoolYears[] = array(
                                            'id' => $row['id'],
                                            'schoolyear' => $row['schoolyear'],
                                            'schoolyear_status' => $row['schoolyear_status']
                                        );
            }
            
            /*
            try
            {
                $countSet = $pdo->query('SELECT COUNT(*) FROM table_school_year WHERE schoolyear_status = "Set"');
            }
            catch (PDOException $e)
            {
                echo '<script>alert("Error Fetching School Year");</script>';
            }

            $countSet = $countSet->fetch();
                 
            */

            if(isset($_POST['setSchoolYear']) and $_POST['setSchoolYear'] == 'Confirm')
            {
                include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
                try
                {
                    $sql = 'UPDATE table_school_year SET schoolyear_status = "Set" WHERE id = :id';
                    $s = $pdo->prepare($sql);
                    $s->bindValue(':id', $_POST['selectSchoolyear']);
                    $s->execute();
                }
                catch (PDOException $e)
                {
                    echo '<script>alert("Error Setting Up School Year");</script>';
                }
                
                if(isset($_POST['set']))
                {
                    try
                {
                    $sql = 'UPDATE table_school_year SET schoolyear_status = "Unset" WHERE id = :id';
                    $s = $pdo->prepare($sql);
                    $s->bindValue(':id', $_POST['set']);
                    $s->execute();
                    }
                    catch (PDOException $e)
                    {
                        echo '<script>alert("Error Setting Up School Year");</script>';
                    }
                }
                echo "<meta http-equiv='refresh' content='0'>";
            }
            ?>
            <div class="modal fade" id="schoolYear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                            </button>
                            <h4 class="modal-title">Add School Year</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group label-floating">
                                <label class="control-label">Set School Year</label>
                                <input type="number" name="schoolyear" class="form-control" onkeypress="return NumberKey(event)" minlength="4" maxlength="4" min="2018" max="2025" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="addSchoolYear" class="btn btn-default btn-simple" value="Submit">
                            <button type="submit" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="selectSchoolYear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                            </button>
                            <h4 class="modal-title">Add School Year</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group label-floating">
                                <label class="control-label">Set School Year</label>
                                    <select name="selectSchoolyear" class="form-control" required>
                                        <option value=""></option>
                                        <?php if(!empty($unsetSchoolyears)): ?>
                                        <?php foreach($unsetSchoolyears as $unsetSchoolyears): ?>
                                        <option value="<?php htmlout($unsetSchoolyears['id']); ?>"><?php htmlout($unsetSchoolyears['schoolyear']); ?></option>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <?php if(!empty($setSchoolYears)):?>
                            <?php foreach($setSchoolYears as $setSchoolYear): ?>
                                <input type="hidden" name="set" value="<?php htmlout($setSchoolYear['id']); ?>">   
                            <?php endforeach; ?>  
                            <?php else: ?>
                            <?php endif; ?>
                            <input type="submit" name="setSchoolYear" class="btn btn-default btn-simple" value="Confirm">
                            <button type="submit" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <script>
            function NumberKey(evt)
            {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;

                return true;
            }
            </script>