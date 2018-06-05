<?php
include $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/magicquotes.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/classes/access.php';

if(!user())
{
    $headerColor = 'danger';
    $title = 'TEACHER LOGIN';
    $bg = 'teacherbg';
    include '../login/index.php';
    exit();
}

if(!level('Teacher'))
{
    $headerColor = 'danger';
    $title = 'TEACHER LOGIN';
    $bg = 'teacherbg';
    include '../login/index.php';
    exit();
}

if(isset($_POST['studentww']) and $_POST['studentww'] == 'Set')
{
    
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    $quarter = $_POST['quarter'];
    $teacherid = $_SESSION['teacherid'];
    $schoolyear = $_SESSION['schoolyear'];
    $subjectid = $_SESSION['subjectid'];
    try
    {
        $sql = 'SELECT table_section.id as sectionid, section_year, section_name, table_student.id as studentid, student_firstname, student_middlename, student_lastname FROM table_student_section 
        INNER JOIN table_student ON table_student.id = table_student_section.studentid 
        INNER JOIN table_section ON table_section.id = table_student_section.sectionid 
        INNER JOIN table_teacher_section ON table_teacher_section.sectionid = table_student_section.sectionid 
        WHERE table_teacher_section.teacherid = :teacherid AND table_student_section.schoolyear = :schoolyear AND table_teacher_section.schoolyear = :schoolyear AND student_status = "Active" AND section_status = "Active"';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_SESSION['teacherid']);
        $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Fetching Student Data at Set Grades");</script>';
    }

    foreach($s as $row)
    {
        $studentDetails[] = array(
                            'sectionid' => $row['sectionid'],
                            'section_year' => $row['section_year'],
                            'section_name' => $row['section_name'],
                            'studentid' => $row['studentid'],
                            'student_firstname' => $row['student_firstname'],
                            'student_middlename' => $row['student_middlename'],
                            'student_lastname' => $row['student_lastname']
                        );
    }
    $bgcolor = 'blue';
    include 'selectStudent.html.php';
    exit();
}

if(isset($_POST['studentpt']) and $_POST['studentpt'] == 'Set')
{
    
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    $quarter = $_POST['quarter'];
    $teacherid = $_SESSION['teacherid'];
    $schoolyear = $_SESSION['schoolyear'];
    $subjectid = $_SESSION['subjectid'];
    try
    {
        $sql = 'SELECT table_section.id as sectionid, section_year, section_name, table_student.id as studentid, student_firstname, student_middlename, student_lastname FROM table_student_section 
        INNER JOIN table_student ON table_student.id = table_student_section.studentid 
        INNER JOIN table_section ON table_section.id = table_student_section.sectionid 
        INNER JOIN table_teacher_section ON table_teacher_section.sectionid = table_student_section.sectionid 
        WHERE table_teacher_section.teacherid = :teacherid AND table_student_section.schoolyear = :schoolyear AND table_teacher_section.schoolyear = :schoolyear AND student_status = "Active" AND section_status = "Active"';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_SESSION['teacherid']);
        $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Fetching Student Data at Set Grades");</script>';
    }

    foreach($s as $row)
    {
        $studentDetails[] = array(
                            'sectionid' => $row['sectionid'],
                            'section_year' => $row['section_year'],
                            'section_name' => $row['section_name'],
                            'studentid' => $row['studentid'],
                            'student_firstname' => $row['student_firstname'],
                            'student_middlename' => $row['student_middlename'],
                            'student_lastname' => $row['student_lastname']
                        );
    }
    $bgcolor = 'purple';
    include 'selectStudent.html.php';
    exit();
}

if(isset($_POST['studentqa']) and $_POST['studentqa'] == 'Set')
{
    
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    $quarter = $_POST['quarter'];
    $teacherid = $_SESSION['teacherid'];
    $schoolyear = $_SESSION['schoolyear'];
    $subjectid = $_SESSION['subjectid'];
    try
    {
        $sql = 'SELECT table_section.id as sectionid, section_year, section_name, table_student.id as studentid, student_firstname, student_middlename, student_lastname FROM table_student_section 
        INNER JOIN table_student ON table_student.id = table_student_section.studentid 
        INNER JOIN table_section ON table_section.id = table_student_section.sectionid 
        INNER JOIN table_teacher_section ON table_teacher_section.sectionid = table_student_section.sectionid 
        WHERE table_teacher_section.teacherid = :teacherid AND table_student_section.schoolyear = :schoolyear AND table_teacher_section.schoolyear = :schoolyear AND student_status = "Active" AND section_status = "Active"';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_SESSION['teacherid']);
        $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Fetching Student Data at Set Grades");</script>';
    }

    foreach($s as $row)
    {
        $studentDetails[] = array(
                            'sectionid' => $row['sectionid'],
                            'section_year' => $row['section_year'],
                            'section_name' => $row['section_name'],
                            'studentid' => $row['studentid'],
                            'student_firstname' => $row['student_firstname'],
                            'student_middlename' => $row['student_middlename'],
                            'student_lastname' => $row['student_lastname']
                        );
    }
    $bgcolor = 'red';
    include 'selectStudent.html.php';
    exit();
}

if(isset($_POST['setGradeww']) and $_POST['setGradeww'] == 'Set Grade')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    $quarter = $_POST['quarter'];
    $teacherid = $_POST['teacherid'];
    $schoolyear = $_POST['schoolyear'];
    $subjectid = $_POST['subjectid'];
    $studentid = $_POST['studentid'];
    try
    {
        $sql = 'SELECT student_firstname, student_middlename, student_lastname FROM table_student WHERE id = :studentid AND student_status = "Active"';
        $s = $pdo->prepare($sql);
        $s->bindValue(':studentid', $studentid);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Fetching Student Data at Written Works Data'.$e->getMessage().'");</script>';
    }

    $rowStudent = $s->fetch();
    $studentName = $rowStudent['student_firstname'] . ' ' . $rowStudent['student_middlename'] . ' ' . $rowStudent['student_lastname'];  

    try
    {
        $sql = 'SELECT * FROM table_writtenworks WHERE teacherid = :teacherid AND subjectid = :subjectid AND quarter = :quarter AND schoolyear = :schoolyear';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':subjectid', $_POST['subjectid']);
        $s->bindValue(':quarter', $_POST['quarter']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Written Works Data'.$e->getMessage().'");</script>';
    }

    $row = $s->fetch();
    $q1 = $row['iq1'];
    $q2 = $row['iq2'];
    $q3 = $row['iq3'];
    $q4 = $row['iq4'];
    $q5 = $row['iq5'];
    $q6 = $row['iq6'];
    $q7 = $row['iq7'];
    $q8 = $row['iq8'];
    $q9 = $row['iq9'];
    $q10 = $row['iq10'];
    $percentage = $row['percentage'];
    $totalitem = $row['totalitem'];
    $ps = $row['ps'];
    $ws = $row['ws'];

    try
    {
        $sql = 'SELECT * FROM table_student_writtenworks WHERE teacherid = :teacherid AND subjectid = :subjectid AND quarter = :quarter AND schoolyear = :schoolyear AND studentid = :studentid';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $teacherid);
        $s->bindValue(':subjectid', $subjectid);
        $s->bindValue(':quarter', $quarter);
        $s->bindValue(':schoolyear', $schoolyear);
        $s->bindValue(':studentid', $studentid);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Written Works Data for Student'.$e->getMessage().'");</script>';
    }
    $row = $s->fetch();
    if($row[0] > 0)
    {
        $qs1 = $row['qs1'];
        $qs2 = $row['qs2'];
        $qs3 = $row['qs3'];
        $qs4 = $row['qs4'];
        $qs5 = $row['qs5'];
        $qs6 = $row['qs6'];
        $qs7 = $row['qs7'];
        $qs8 = $row['qs8'];
        $qs9 = $row['qs9'];
        $qs10 = $row['qs10'];
        $qtotal = $row['qtotal'];
        $qps = $row['qps'];
        $qws = $row['qws'];
    }
    else
    {
        $qs1 = 0;
        $qs2 = 0;
        $qs3 = 0;
        $qs4 = 0;
        $qs5 = 0;
        $qs6 = 0;
        $qs7 = 0;
        $qs8 = 0;
        $qs9 = 0;
        $qs10 = 0;
        $qtotal = 0;
        $qps = 0;
        $qws = 0;
    }
    
    $title = 'Written Work Grades for ';
    include 'gradeSet.html.php';
    exit();
}

if(isset($_POST['setGradept']) and $_POST['setGradept'] == 'Set Grade')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    $quarter = $_POST['quarter'];
    $teacherid = $_SESSION['teacherid'];
    $schoolyear = $_SESSION['schoolyear'];
    $subjectid = $_SESSION['subjectid'];
    $studentid = $_POST['studentid'];
    try
    {
        $sql = 'SELECT student_firstname, student_middlename, student_lastname FROM table_student WHERE id = :studentid AND student_status = "Active"';
        $s = $pdo->prepare($sql);
        $s->bindValue(':studentid', $studentid);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Fetching Student Data at Written Works Data'.$e->getMessage().'");</script>';
    }

    $rowStudent = $s->fetch();
    $studentName = $rowStudent['student_firstname'] . ' ' . $rowStudent['student_middlename'] . ' ' . $rowStudent['student_lastname'];  

    try
    {
        $sql = 'SELECT * FROM table_performancetasks WHERE teacherid = :teacherid AND subjectid = :subjectid AND quarter = :quarter AND schoolyear = :schoolyear';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $teacherid);
        $s->bindValue(':subjectid', $subjectid);
        $s->bindValue(':quarter', $quarter);
        $s->bindValue(':schoolyear', $schoolyear);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Written Works Data'.$e->getMessage().'");</script>';
    }

    $row = $s->fetch();
    $q1 = $row['iq1'];
    $q2 = $row['iq2'];
    $q3 = $row['iq3'];
    $q4 = $row['iq4'];
    $q5 = $row['iq5'];
    $q6 = $row['iq6'];
    $q7 = $row['iq7'];
    $q8 = $row['iq8'];
    $q9 = $row['iq9'];
    $q10 = $row['iq10'];
    $totalitem = $row['totalitem'];
    $ps = $row['ps'];
    $ws = $row['ws'];

    try
    {
        $sql = 'SELECT * FROM table_student_performancetasks WHERE teacherid = :teacherid AND subjectid = :subjectid AND quarter = :quarter AND schoolyear = :schoolyear AND studentid = :studentid';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $teacherid);
        $s->bindValue(':subjectid', $subjectid);
        $s->bindValue(':quarter', $quarter);
        $s->bindValue(':schoolyear', $schoolyear);
        $s->bindValue(':studentid', $studentid);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Written Works Data for Student'.$e->getMessage().'");</script>';
    }
    $row = $s->fetch();
    if($row[0] > 0)
    {
        $qs1 = $row['ptq1'];
        $qs2 = $row['ptq2'];
        $qs3 = $row['ptq3'];
        $qs4 = $row['ptq4'];
        $qs5 = $row['ptq5'];
        $qs6 = $row['ptq6'];
        $qs7 = $row['ptq7'];
        $qs8 = $row['ptq8'];
        $qs9 = $row['ptq9'];
        $qs10 = $row['ptq10'];
        $qtotal = $row['ptqtotal'];
        $qps = $row['ptps'];
        $qws = $row['ptws'];
    }
    else
    {
        $qs1 = 0;
        $qs2 = 0;
        $qs3 = 0;
        $qs4 = 0;
        $qs5 = 0;
        $qs6 = 0;
        $qs7 = 0;
        $qs8 = 0;
        $qs9 = 0;
        $qs10 = 0;
        $qtotal = 0;
        $qps = 0;
        $qws = 0;
    }
    
    $title = 'Performance Grades for ';
    include 'gradeSet.html.php';
    exit();
}

if(isset($_POST['setGradeqa']) and $_POST['setGradeqa'] == 'Set Grade')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    $quarter = $_POST['quarter'];
    $teacherid = $_SESSION['teacherid'];
    $schoolyear = $_SESSION['schoolyear'];
    $subjectid = $_SESSION['subjectid'];
    $studentid = $_POST['studentid'];
    try
    {
        $sql = 'SELECT student_firstname, student_middlename, student_lastname FROM table_student WHERE id = :studentid AND student_status = "Active"';
        $s = $pdo->prepare($sql);
        $s->bindValue(':studentid', $studentid);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Fetching Student Data at Written Works Data'.$e->getMessage().'");</script>';
    }

    $rowStudent = $s->fetch();
    $studentName = $rowStudent['student_firstname'] . ' ' . $rowStudent['student_middlename'] . ' ' . $rowStudent['student_lastname'];  
    
    try
    {
        $sql = 'SELECT * FROM table_quarterlyassessment WHERE teacherid = :teacherid AND subjectid = :subjectid AND quarter = :quarter AND schoolyear = :schoolyear';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $teacherid);
        $s->bindValue(':subjectid', $subjectid);
        $s->bindValue(':quarter', $quarter);
        $s->bindValue(':schoolyear', $schoolyear);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error table_quarterlyassessment Data'.$e->getMessage().'");</script>';
    }

    $row = $s->fetch();
    $q1 = $row['iq1'];
    $ps = $row['ps'];
    $ws = $row['ws'];

    try
    {
        $sql = 'SELECT * FROM table_student_writtenworks WHERE teacherid = :teacherid AND subjectid = :subjectid AND quarter = :quarter AND schoolyear = :schoolyear AND studentid = :studentid';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $teacherid);
        $s->bindValue(':subjectid', $subjectid);
        $s->bindValue(':quarter', $quarter);
        $s->bindValue(':schoolyear', $schoolyear);
        $s->bindValue(':studentid', $studentid);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error table_student_writtenworks Data'.$e->getMessage().'");</script>';
    }

    $row = $s->fetch();
    $wwscore = $row['qtotal'];
    $wwps = $row['qps'];
    $wwws = $row['qws'];

    try
    {
        $sql = 'SELECT * FROM table_student_performancetasks WHERE teacherid = :teacherid AND subjectid = :subjectid AND quarter = :quarter AND schoolyear = :schoolyear AND studentid = :studentid';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $teacherid);
        $s->bindValue(':subjectid', $subjectid);
        $s->bindValue(':quarter', $quarter);
        $s->bindValue(':schoolyear', $schoolyear);
        $s->bindValue(':studentid', $studentid);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error table_student_performancetasks Data'.$e->getMessage().'");</script>';
    }

    $row = $s->fetch();
    $ptscore = $row['ptqtotal'];
    $ptps = $row['ptps'];
    $ppws = $row['ptws'];

    try
    {
        $sql = 'SELECT * FROM table_student_quarterlyassessment WHERE teacherid = :teacherid AND subjectid = :subjectid AND quarter = :quarter AND schoolyear = :schoolyear AND studentid = :studentid';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $teacherid);
        $s->bindValue(':subjectid', $subjectid);
        $s->bindValue(':quarter', $quarter);
        $s->bindValue(':schoolyear', $schoolyear);
        $s->bindValue(':studentid', $studentid);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error table_student_quarterlyassessment Data for Student'.$e->getMessage().'");</script>';
    }
    $row = $s->fetch();
    if($row[0] > 0)
    {
        $qas1 = $row['qa1'];
        $qaps = $row['qaps'];
        $qaws = $row['qaws'];
    }
    else
    {
        $qas1 = 0;
        $qaps = 0;
        $qaws = 0;
    }
    
    try
    {
        $sql = 'SELECT * FROM table_student_finalgrade WHERE teacherid = :teacherid AND subjectid = :subjectid AND quarter = :quarter AND schoolyear = :schoolyear AND studentid = :studentid';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $teacherid);
        $s->bindValue(':subjectid', $subjectid);
        $s->bindValue(':quarter', $quarter);
        $s->bindValue(':schoolyear', $schoolyear);
        $s->bindValue(':studentid', $studentid);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error table_student_finalgrade Data for Student'.$e->getMessage().'");</script>';
    }
    $row = $s->fetch();
    if($row[0] > 0)
    {
        $ig = $row['initialgrade'];
        $qg = $row['finalgrade'];
    }
    else
    {
        $ig = 0;
        $qg = 0;
    }
    
    $title = 'Quarterly Assessment Grades for ';
    include 'gradeSet.html.php';
    exit();
}

if(isset($_POST['setww']) and $_POST['setww'] == 'Submit')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT COUNT(*) FROM table_student_writtenworks WHERE teacherid = :teacherid AND subjectid = :subjectid AND quarter = :quarter AND schoolyear = :schoolyear AND studentid = :studentid';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':subjectid', $_POST['subjectid']);
        $s->bindValue(':quarter', $_POST['quarter']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->bindValue(':studentid', $_POST['studentid']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Set Written Works Data");</script>';
    }
    $row = $s->fetch();

    if($row[0] > 0)
    {
        try
        {
            $sql = 'UPDATE table_student_writtenworks SET
            qs1 = :qs1,
            qs2 = :qs2,
            qs3 = :qs3,
            qs4 = :qs4,
            qs5 = :qs5,
            qs6 = :qs6,
            qs7 = :qs7,
            qs8 = :qs8,
            qs9 = :qs9,
            qs10 = :qs10,
            qtotal = :qtotal,
            qps = :qps,
            qws = :qws
            WHERE teacherid = :teacherid 
            AND subjectid = :subjectid 
            AND quarter = :quarter 
            AND schoolyear = :schoolyear
            AND studentid = :studentid';
            $s = $pdo->prepare($sql);
            $s->bindValue(':qs1', $_POST['q1']);
            $s->bindValue(':qs2', $_POST['q2']);
            $s->bindValue(':qs3', $_POST['q3']);
            $s->bindValue(':qs4', $_POST['q4']);
            $s->bindValue(':qs5', $_POST['q5']);
            $s->bindValue(':qs6', $_POST['q6']);
            $s->bindValue(':qs7', $_POST['q7']);
            $s->bindValue(':qs8', $_POST['q8']);
            $s->bindValue(':qs9', $_POST['q9']);
            $s->bindValue(':qs10', $_POST['q10']);
            $s->bindValue(':teacherid', $_POST['teacherid']);
            $s->bindValue(':subjectid', $_POST['subjectid']);
            $s->bindValue(':qtotal', $_POST['total']);
            $s->bindValue(':qps', $_POST['ps']);
            $s->bindValue(':qws', $_POST['ws']);
            $s->bindValue(':schoolyear', $_POST['schoolyear']);
            $s->bindValue(':quarter', $_POST['quarter']);
            $s->bindValue(':studentid', $_POST['studentid']);
            $s->execute();
        }
        catch(PDOException $e)
        {
            echo '<script>alert("Error Inserting Written Works Data");</script>';
        }
    }
    else
    {
        try
        {
            $sql = 'INSERT INTO table_student_writtenworks SET
            teacherid = :teacherid,
            subjectid = :subjectid,
            studentid = :studentid,
            qs1 = :qs1,
            qs2 = :qs2,
            qs3 = :qs3,
            qs4 = :qs4,
            qs5 = :qs5,
            qs6 = :qs6,
            qs7 = :qs7,
            qs8 = :qs8,
            qs9 = :qs9,
            qs10 = :qs10,
            qtotal = :qtotal,
            qps = :qps,
            qws = :qws,
            schoolyear = :schoolyear,
            quarter = :quarter';
            $s = $pdo->prepare($sql);
            $s->bindValue(':qs1', $_POST['q1']);
            $s->bindValue(':qs2', $_POST['q2']);
            $s->bindValue(':qs3', $_POST['q3']);
            $s->bindValue(':qs4', $_POST['q4']);
            $s->bindValue(':qs5', $_POST['q5']);
            $s->bindValue(':qs6', $_POST['q6']);
            $s->bindValue(':qs7', $_POST['q7']);
            $s->bindValue(':qs8', $_POST['q8']);
            $s->bindValue(':qs9', $_POST['q9']);
            $s->bindValue(':qs10', $_POST['q10']);
            $s->bindValue(':teacherid', $_POST['teacherid']);
            $s->bindValue(':subjectid', $_POST['subjectid']);
            $s->bindValue(':qtotal', $_POST['total']);
            $s->bindValue(':qps', $_POST['ps']);
            $s->bindValue(':qws', $_POST['ws']);
            $s->bindValue(':schoolyear', $_POST['schoolyear']);
            $s->bindValue(':quarter', $_POST['quarter']);
            $s->bindValue(':studentid', $_POST['studentid']);
            $s->execute();
        }
        catch(PDOException $e)
        {
            echo '<script>alert("Error Updating Written Works Data");</script>';
        }
    }
    header('Location: .');
    exit();
}

if(isset($_POST['setpt']) and $_POST['setpt'] == 'Submit')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT COUNT(*) FROM table_student_performancetasks WHERE teacherid = :teacherid AND subjectid = :subjectid AND quarter = :quarter AND schoolyear = :schoolyear AND studentid = :studentid';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':subjectid', $_POST['subjectid']);
        $s->bindValue(':quarter', $_POST['quarter']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->bindValue(':studentid', $_POST['studentid']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Set Performance Task Data");</script>';
    }
    $row = $s->fetch();

    if($row[0] > 0)
    {
        try
        {
            $sql = 'UPDATE table_student_performancetasks SET
            ptq1 = :qs1,
            ptq2 = :qs2,
            ptq3 = :qs3,
            ptq4 = :qs4,
            ptq5 = :qs5,
            ptq6 = :qs6,
            ptq7 = :qs7,
            ptq8 = :qs8,
            ptq9 = :qs9,
            ptq10 = :qs10,
            ptqtotal = :qtotal,
            ptps = :qps,
            ptws = :qws
            WHERE teacherid = :teacherid 
            AND subjectid = :subjectid 
            AND quarter = :quarter 
            AND schoolyear = :schoolyear
            AND studentid = :studentid';
            $s = $pdo->prepare($sql);
            $s->bindValue(':qs1', $_POST['q1']);
            $s->bindValue(':qs2', $_POST['q2']);
            $s->bindValue(':qs3', $_POST['q3']);
            $s->bindValue(':qs4', $_POST['q4']);
            $s->bindValue(':qs5', $_POST['q5']);
            $s->bindValue(':qs6', $_POST['q6']);
            $s->bindValue(':qs7', $_POST['q7']);
            $s->bindValue(':qs8', $_POST['q8']);
            $s->bindValue(':qs9', $_POST['q9']);
            $s->bindValue(':qs10', $_POST['q10']);
            $s->bindValue(':teacherid', $_POST['teacherid']);
            $s->bindValue(':subjectid', $_POST['subjectid']);
            $s->bindValue(':qtotal', $_POST['total']);
            $s->bindValue(':qps', $_POST['ps']);
            $s->bindValue(':qws', $_POST['ws']);
            $s->bindValue(':schoolyear', $_POST['schoolyear']);
            $s->bindValue(':quarter', $_POST['quarter']);
            $s->bindValue(':studentid', $_POST['studentid']);
            $s->execute();
        }
        catch(PDOException $e)
        {
            echo '<script>alert("Error Inserting Performance Task Data");</script>';
        }
    }
    else
    {
        try
        {
            $sql = 'INSERT INTO table_student_performancetasks SET
            teacherid = :teacherid,
            subjectid = :subjectid,
            studentid = :studentid,
            ptq1 = :qs1,
            ptq2 = :qs2,
            ptq3 = :qs3,
            ptq4 = :qs4,
            ptq5 = :qs5,
            ptq6 = :qs6,
            ptq7 = :qs7,
            ptq8 = :qs8,
            ptq9 = :qs9,
            ptq10 = :qs10,
            ptqtotal = :qtotal,
            ptps = :qps,
            ptws = :qws,
            schoolyear = :schoolyear,
            quarter = :quarter';
            $s = $pdo->prepare($sql);
            $s->bindValue(':qs1', $_POST['q1']);
            $s->bindValue(':qs2', $_POST['q2']);
            $s->bindValue(':qs3', $_POST['q3']);
            $s->bindValue(':qs4', $_POST['q4']);
            $s->bindValue(':qs5', $_POST['q5']);
            $s->bindValue(':qs6', $_POST['q6']);
            $s->bindValue(':qs7', $_POST['q7']);
            $s->bindValue(':qs8', $_POST['q8']);
            $s->bindValue(':qs9', $_POST['q9']);
            $s->bindValue(':qs10', $_POST['q10']);
            $s->bindValue(':teacherid', $_POST['teacherid']);
            $s->bindValue(':subjectid', $_POST['subjectid']);
            $s->bindValue(':qtotal', $_POST['total']);
            $s->bindValue(':qps', $_POST['ps']);
            $s->bindValue(':qws', $_POST['ws']);
            $s->bindValue(':schoolyear', $_POST['schoolyear']);
            $s->bindValue(':quarter', $_POST['quarter']);
            $s->bindValue(':studentid', $_POST['studentid']);
            $s->execute();
        }
        catch(PDOException $e)
        {
            echo '<script>alert("Error Updating Performance Tasks Data");</script>';
        }
    }
    header('Location: .');
    exit();
}

if(isset($_POST['setqa']) and $_POST['setqa'] == 'Submit')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT COUNT(*) FROM table_student_quarterlyassessment WHERE teacherid = :teacherid AND subjectid = :subjectid AND quarter = :quarter AND schoolyear = :schoolyear AND studentid = :studentid';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':subjectid', $_POST['subjectid']);
        $s->bindValue(':quarter', $_POST['quarter']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->bindValue(':studentid', $_POST['studentid']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Set Quarterly Assessment Task Data");</script>';
    }
    $row = $s->fetch();
    if($row[0] > 0)
    {
        try
        {
            $sql = 'UPDATE table_student_quarterlyassessment SET
            qa1 = :qa1,
            qaps = :qaps,
            qaws = :qaws
            WHERE teacherid = :teacherid 
            AND subjectid = :subjectid 
            AND quarter = :quarter 
            AND schoolyear = :schoolyear
            AND studentid = :studentid';
            $s = $pdo->prepare($sql);
            $s->bindValue(':qa1', $_POST['qas1']);
            $s->bindValue(':qaps', $_POST['qaps']);
            $s->bindValue(':qaws', $_POST['qaws']);
            $s->bindValue(':teacherid', $_POST['teacherid']);
            $s->bindValue(':subjectid', $_POST['subjectid']);
            $s->bindValue(':schoolyear', $_POST['schoolyear']);
            $s->bindValue(':quarter', $_POST['quarter']);
            $s->bindValue(':studentid', $_POST['studentid']);
            $s->execute();
        }
        catch(PDOException $e)
        {
            echo '<script>alert("Error Updating Student Quarterly Assessment Data");</script>';
        }
    }
    else
    {
        try
        {
            $sql = 'INSERT INTO table_student_quarterlyassessment SET
            qa1 = :qa1,
            qaps = :qaps,
            qaws = :qaws,
            teacherid = :teacherid,
            subjectid = :subjectid,
            studentid = :studentid,
            schoolyear = :schoolyear,
            quarter = :quarter';
            $s = $pdo->prepare($sql);
            $s->bindValue(':qa1', $_POST['qas1']);
            $s->bindValue(':qaps', $_POST['qaps']);
            $s->bindValue(':qaws', $_POST['qaws']);
            $s->bindValue(':teacherid', $_POST['teacherid']);
            $s->bindValue(':subjectid', $_POST['subjectid']);
            $s->bindValue(':schoolyear', $_POST['schoolyear']);
            $s->bindValue(':quarter',   $_POST['quarter']);
            $s->bindValue(':studentid', $_POST['studentid']);
            $s->execute();
        }
        catch(PDOException $e)
        {
            echo '<script>alert("Error Inserting Student Quarterly Assessment Data");</script>';
        }        
    }


    try
    {
        $sql = 'SELECT COUNT(*) FROM table_student_finalgrade WHERE teacherid = :teacherid AND subjectid = :subjectid AND quarter = :quarter AND schoolyear = :schoolyear AND studentid = :studentid';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':subjectid', $_POST['subjectid']);
        $s->bindValue(':quarter', $_POST['quarter']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->bindValue(':studentid', $_POST['studentid']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Set table_student_finalgrade Data");</script>';
    }
    $row = $s->fetch();

    if($row[0] > 0)
    {
        try
        {
            $sql = 'UPDATE table_student_finalgrade SET
            initialgrade = :initialgrade,
            finalgrade = :finalgrade
            WHERE teacherid = :teacherid 
            AND subjectid = :subjectid 
            AND quarter = :quarter 
            AND schoolyear = :schoolyear
            AND studentid = :studentid';
            $s = $pdo->prepare($sql);
            $s->bindValue(':initialgrade', $_POST['ig']);
            $s->bindValue(':finalgrade', $_POST['qg']);
            $s->bindValue(':teacherid', $_POST['teacherid']);
            $s->bindValue(':subjectid', $_POST['subjectid']);
            $s->bindValue(':schoolyear', $_POST['schoolyear']);
            $s->bindValue(':quarter', $_POST['quarter']);
            $s->bindValue(':studentid', $_POST['studentid']);
            $s->execute();
        }
        catch(PDOException $e)
        {
            echo '<script>alert("Error Updating table_student_finalgrade Data");</script>';
        }
    }
    else
    {
        try
        {
            $sql = 'INSERT INTO table_student_finalgrade SET
            initialgrade = :initialgrade,
            finalgrade = :finalgrade,
            teacherid = :teacherid,
            subjectid = :subjectid,
            studentid = :studentid,
            schoolyear = :schoolyear,
            quarter = :quarter';
            $s = $pdo->prepare($sql);
            $s->bindValue(':initialgrade', $_POST['ig']);
            $s->bindValue(':finalgrade', $_POST['qg']);
            $s->bindValue(':teacherid', $_POST['teacherid']);
            $s->bindValue(':subjectid', $_POST['subjectid']);
            $s->bindValue(':schoolyear', $_POST['schoolyear']);
            $s->bindValue(':quarter', $_POST['quarter']);
            $s->bindValue(':studentid', $_POST['studentid']);
            $s->execute();
        }
        catch(PDOException $e)
        {
            echo '<script>alert("Error Inserting table_student_finalgrade Data");</script>';
        }        
    }
    

    header('Location: .');
    exit();
}

if(isset($_POST['verifygrade']) and $_POST['verifygrade'] == 'Verify')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT COUNT(*) FROM table_student_sujectgrade WHERE teacherid = :teacherid AND subjectid = :subjectid AND schoolyear = :schoolyear AND studentid = :studentid';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':subjectid', $_POST['subjectid']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->bindValue(':studentid', $_POST['studentid']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Set table_student_sujectgrade Data");</script>';
    }
    $row = $s->fetch();
    if($row[0] > 0)
    {
        try
        {
            $sql = 'UPDATE table_student_sujectgrade SET
            firstquarter = :firstquarter,
            secondquarter = :secondquarter,
            thirdquarter = :thirdquarter,
            fourthquarter = :fourthquarter,
            subjectgrade = :subjectgrade
            WHERE teacherid = :teacherid 
            AND subjectid = :subjectid 
            AND studentid = :studentid 
            AND schoolyear = :schoolyear';
            $s = $pdo->prepare($sql);
            $s->bindValue(':firstquarter', $_POST['firstquarter']);
            $s->bindValue(':secondquarter', $_POST['secondquarter']);
            $s->bindValue(':thirdquarter', $_POST['thirdquarter']);
            $s->bindValue(':fourthquarter', $_POST['fourthquarter']);
            $s->bindValue(':subjectgrade', $_POST['subjectgrade']);
            $s->bindValue(':schoolyear', $_POST['schoolyear']);
            $s->bindValue(':subjectid', $_POST['subjectid']);
            $s->bindValue(':studentid', $_POST['studentid']);
            $s->bindValue(':teacherid', $_POST['teacherid']);
            $s->execute();
        }
        catch(PDOException $e)
        {
            echo '<script>alert("Error updating table_student_sujectgrade Data");</script>';
        }
    }
    else
    {
        try
        {
            $sql = 'INSERT INTO table_student_sujectgrade SET
            teacherid = :teacherid,
            subjectid = :subjectid,
            studentid = :studentid,
            firstquarter = :firstquarter,
            secondquarter = :secondquarter,
            thirdquarter = :thirdquarter,
            fourthquarter = :fourthquarter,
            subjectgrade = :subjectgrade,
            schoolyear = :schoolyear';
            $s = $pdo->prepare($sql);
            $s->bindValue(':firstquarter', $_POST['firstquarter']);
            $s->bindValue(':secondquarter', $_POST['secondquarter']);
            $s->bindValue(':thirdquarter', $_POST['thirdquarter']);
            $s->bindValue(':fourthquarter', $_POST['fourthquarter']);
            $s->bindValue(':subjectgrade', $_POST['subjectgrade']);
            $s->bindValue(':schoolyear', $_POST['schoolyear']);
            $s->bindValue(':subjectid', $_POST['subjectid']);
            $s->bindValue(':studentid', $_POST['studentid']);
            $s->bindValue(':teacherid', $_POST['teacherid']);
            $s->execute();
        }
        catch(PDOException $e)
        {
            echo '<script>alert("Error insert table_student_sujectgrade Data");</script>';
        }
    }
    header('Location: ../setGrades/');
    exit();
}

if(isset($_GET['setWrittenworks']))
{
    $bgcolor = 'blue';
    $title = 'Set Student Written Works';
    include 'quarterSet.html.php';
    exit();
}

if(isset($_GET['setPerformancetask']))
{
    $bgcolor = 'purple';
    $title = 'Set Student Performance Tasks';
    include 'quarterSet.html.php';
    exit();
}

if(isset($_GET['setQuarterlyassessment']))
{
    $bgcolor = 'red';
    $title = 'Set Student Quarterly Assessment';
    include 'quarterSet.html.php';
    exit();
}

/*
if(isset($_GET['firstquarter']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT teacherid,qs1,qs2,qs3,qs4,qs5,qs6,qs7,qs8,qs9,qs10,qtotal,qps,qws,table_student_writtenworks.schoolyear as schoolyear,section_name,section_year, student_firstname, student_middlename, student_lastname FROM table_student_writtenworks 
        INNER JOIN table_student_section ON table_student_section.studentid = table_student_writtenworks.studentid 
        INNER JOIN table_section ON table_section.id = table_student_section.sectionid
        INNER JOIN table_student ON table_student.id = table_student_writtenworks.studentid
        WHERE table_student_writtenworks.teacherid = :teacherid AND table_student_writtenworks.quarter = "First Quarter" AND table_student_writtenworks.schoolyear = :schoolyear AND student_status = "Active" AND section_status = "Active"';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_SESSION['teacherid']);
        $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
        $s->execute();
    
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Fetching table_student_writtenworks for First Quarter");</script>';
    }
    
    foreach($s as $row)
    {
        $wwStudentGrades[] = array(
                                'teacherid' => $row['teacherid'],
                                'qs1' => $row['qs1'],
                                'qs2' => $row['qs2'],
                                'qs3' => $row['qs3'],
                                'qs4' => $row['qs4'],
                                'qs5' => $row['qs5'],
                                'qs6' => $row['qs6'],
                                'qs7' => $row['qs7'],
                                'qs8' => $row['qs8'],
                                'qs9' => $row['qs9'],
                                'qs10' => $row['qs10'],
                                'qtotal' => $row['qtotal'],
                                'qps' => $row['qps'],
                                'qws' => $row['qws'],
                                'schoolyear' => $row['schoolyear'],
                                'section_name' => $row['section_name'],
                                'section_year' => $row['section_year'],
                                'student_firstname' => $row['student_firstname'],
                                'student_middlename' => $row['student_middlename'],
                                'student_lastname' => $row['student_lastname']
        );
    }

    try
    {
        $sql = 'SELECT teacherid,ptq1,ptq2,ptq3,ptq4,ptq5,ptq6,ptq7,ptq8,ptq9,ptq10,ptqtotal,ptws,ptps,table_student_performancetasks.schoolyear as schoolyear,section_name,section_year, student_firstname, student_middlename, student_lastname FROM table_student_performancetasks 
        INNER JOIN table_student_section ON table_student_section.studentid = table_student_performancetasks.studentid 
        INNER JOIN table_section ON table_section.id = table_student_section.sectionid
        INNER JOIN table_student ON table_student.id = table_student_performancetasks.studentid
        WHERE table_student_performancetasks.teacherid = :teacherid AND table_student_performancetasks.quarter = "First Quarter" AND table_student_performancetasks.schoolyear = :schoolyear AND student_status = "Active" AND section_status = "Active"';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_SESSION['teacherid']);
        $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
        $s->execute();
    
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Fetching table_student_performancetasks for First Quarter");</script>';
    }
    
    foreach($s as $row)
    {
        $ptStudentGrades[] = array(
                                'teacherid' => $row['teacherid'],
                                'qs1' => $row['ptq1'],
                                'qs2' => $row['ptq2'],
                                'qs3' => $row['ptq3'],
                                'qs4' => $row['ptq4'],
                                'qs5' => $row['ptq5'],
                                'qs6' => $row['ptq6'],
                                'qs7' => $row['ptq7'],
                                'qs8' => $row['ptq8'],
                                'qs9' => $row['ptq9'],
                                'qs10' => $row['ptq10'],
                                'qtotal' => $row['ptqtotal'],
                                'qps' => $row['ptps'],
                                'qws' => $row['ptws'],
                                'schoolyear' => $row['schoolyear'],
                                'section_name' => $row['section_name'],
                                'section_year' => $row['section_year'],
                                'student_firstname' => $row['student_firstname'],
                                'student_middlename' => $row['student_middlename'],
                                'student_lastname' => $row['student_lastname']
        );
    }

    try
    {
        $sql = 'SELECT teacherid,qa1,qaps,qaws,table_student_quarterlyassessment.schoolyear as schoolyear,section_name,section_year, student_firstname, student_middlename, student_lastname FROM table_student_quarterlyassessment 
        INNER JOIN table_student_section ON table_student_section.studentid = table_student_quarterlyassessment.studentid 
        INNER JOIN table_section ON table_section.id = table_student_section.sectionid
        INNER JOIN table_student ON table_student.id = table_student_quarterlyassessment.studentid
        WHERE table_student_quarterlyassessment.teacherid = :teacherid AND table_student_quarterlyassessment.quarter = "First Quarter" AND table_student_quarterlyassessment.schoolyear = :schoolyear AND student_status = "Active" AND section_status = "Active"';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_SESSION['teacherid']);
        $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
        $s->execute();
    
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Fetching table_student_quarterlyassessment for First Quarter");</script>';
    }
    
    foreach($s as $row)
    {
        $qaStudentGrades[] = array(
                                'teacherid' => $row['teacherid'],
                                'qa1' => $row['qa1'],
                                'qaps' => $row['qaps'],
                                'qaws' => $row['qaws'],
                                'schoolyear' => $row['schoolyear'],
                                'section_name' => $row['section_name'],
                                'section_year' => $row['section_year'],
                                'student_firstname' => $row['student_firstname'],
                                'student_middlename' => $row['student_middlename'],
                                'student_lastname' => $row['student_lastname']
        );
    }
    include 'quarterGrades.html.php';
    exit();
}
*/

if(isset($_GET['firstQuarterGrade']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT finalgrade, initialgrade, 
        ptps, ptq1, ptq2, ptq3, ptq4, ptq5, ptq6, ptq7, ptq8, ptq9, ptq10, ptqtotal, ptws, 
        qa1, qaps, qaws, 
        qps, qs1, qs2, qs3, qs4, qs5, qs6, qs7, qs8, qs9, qs10, qtotal, qws, 
        table_student_finalgrade.quarter as quarter, table_student_finalgrade.schoolyear as schoolyear, student_firstname, student_middlename, student_lastname, section_name, section_year FROM table_student_finalgrade 
        INNER JOIN table_student_writtenworks ON 
        table_student_writtenworks.studentid = table_student_finalgrade.studentid AND 
        table_student_writtenworks.teacherid = table_student_finalgrade.teacherid AND 
        table_student_writtenworks.subjectid = table_student_finalgrade.subjectid AND 
        table_student_writtenworks.quarter = table_student_finalgrade.quarter AND 
        table_student_writtenworks.schoolyear = table_student_finalgrade.schoolyear
        INNER JOIN table_student_performancetasks ON 
        table_student_performancetasks.studentid = table_student_finalgrade.studentid AND 
        table_student_performancetasks.teacherid = table_student_finalgrade.teacherid AND 
        table_student_performancetasks.subjectid = table_student_finalgrade.subjectid AND 
        table_student_performancetasks.quarter = table_student_finalgrade.quarter AND 
        table_student_performancetasks.schoolyear = table_student_finalgrade.schoolyear
        INNER JOIN table_student_quarterlyassessment ON 
        table_student_quarterlyassessment.studentid = table_student_finalgrade.studentid AND 
        table_student_quarterlyassessment.teacherid = table_student_finalgrade.teacherid AND 
        table_student_quarterlyassessment.subjectid = table_student_finalgrade.subjectid AND 
        table_student_quarterlyassessment.quarter = table_student_finalgrade.quarter AND 
        table_student_quarterlyassessment.schoolyear = table_student_finalgrade.schoolyear
        INNER JOIN table_student ON table_student.id = table_student_finalgrade.studentid
        INNER JOIN table_student_section ON table_student_section.studentid = table_student_finalgrade.studentid
        INNER JOIN table_section ON table_section.id = table_student_section.sectionid
        WHERE 
        table_student_finalgrade.teacherid = :teacherid AND table_student_finalgrade.subjectid = :subjectid AND 
        table_student_finalgrade.studentid = :studentid AND table_student_finalgrade.schoolyear = :schoolyear AND 
        table_student_finalgrade.quarter = :quarter AND

        table_student_writtenworks.teacherid = :teacherid AND table_student_writtenworks.subjectid = :subjectid AND
        table_student_writtenworks.studentid = :studentid AND table_student_writtenworks.schoolyear = :schoolyear AND 
        table_student_writtenworks.quarter = :quarter AND

        table_student_performancetasks.teacherid = :teacherid AND table_student_performancetasks.subjectid = :subjectid AND 
        table_student_performancetasks.studentid = :studentid AND table_student_performancetasks.schoolyear = :schoolyear AND 
        table_student_performancetasks.quarter = :quarter AND

        table_student_quarterlyassessment.teacherid = :teacherid AND table_student_quarterlyassessment.subjectid = :subjectid AND
        table_student_quarterlyassessment.studentid = :studentid AND table_student_quarterlyassessment.schoolyear = :schoolyear AND
        table_student_quarterlyassessment.quarter = :quarter';

        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':studentid', $_POST['studentid']);
        $s->bindValue(':subjectid', $_POST['subjectid']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->bindValue(':quarter', $_POST['quarter']);
        $s->execute();

    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Fetching First Quarter Grade");</script>';
    }
    foreach($s as $row)
    {
        $firstQuarterGrades[] = array(
                        'qs1' => $row['qs1'],
                        'qs2' => $row['qs2'],
                        'qs3' => $row['qs3'],
                        'qs4' => $row['qs4'],
                        'qs5' => $row['qs5'],
                        'qs6' => $row['qs6'],
                        'qs7' => $row['qs7'],
                        'qs8' => $row['qs8'],
                        'qs9' => $row['qs9'],
                        'qs10' => $row['qs10'],
                        'qtotal' => $row['qtotal'],
                        'qps' => $row['qps'],
                        'qws' => $row['qws'],
                        'ptq1' => $row['ptq1'],
                        'ptq2' => $row['ptq2'],
                        'ptq3' => $row['ptq3'],
                        'ptq4' => $row['ptq4'],
                        'ptq5' => $row['ptq5'],
                        'ptq6' => $row['ptq6'],
                        'ptq7' => $row['ptq7'],
                        'ptq8' => $row['ptq8'],
                        'ptq9' => $row['ptq9'],
                        'ptq10' => $row['ptq10'],
                        'ptqtotal' => $row['ptqtotal'],
                        'ptps' => $row['ptps'],
                        'ptws' => $row['ptws'],
                        'qa1' => $row['qa1'],
                        'qaps' => $row['qaps'],
                        'qaws' => $row['qaws'],
                        'finalgrade' => $row['finalgrade'],
                        'initialgrade' => $row['initialgrade'],
                        'schoolyear' => $row['schoolyear'],
                        'section_name' => $row['section_name'],
                        'section_year' => $row['section_year'],
                        'student_firstname' => $row['student_firstname'],
                        'student_middlename' => $row['student_middlename'],
                        'student_lastname' => $row['student_lastname']
        );
    }
    $quarter = 'First Quarter';
    include 'quarterGrades.html.php';
    exit();
}

if(isset($_GET['secondQuarterGrade']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT finalgrade, initialgrade, 
        ptps, ptq1, ptq2, ptq3, ptq4, ptq5, ptq6, ptq7, ptq8, ptq9, ptq10, ptqtotal, ptws, 
        qa1, qaps, qaws, 
        qps, qs1, qs2, qs3, qs4, qs5, qs6, qs7, qs8, qs9, qs10, qtotal, qws, 
        table_student_finalgrade.quarter as quarter, table_student_finalgrade.schoolyear as schoolyear, student_firstname, student_middlename, student_lastname, section_name, section_year FROM table_student_finalgrade 
        INNER JOIN table_student_writtenworks ON 
        table_student_writtenworks.studentid = table_student_finalgrade.studentid AND 
        table_student_writtenworks.teacherid = table_student_finalgrade.teacherid AND 
        table_student_writtenworks.subjectid = table_student_finalgrade.subjectid AND 
        table_student_writtenworks.quarter = table_student_finalgrade.quarter AND 
        table_student_writtenworks.schoolyear = table_student_finalgrade.schoolyear
        INNER JOIN table_student_performancetasks ON 
        table_student_performancetasks.studentid = table_student_finalgrade.studentid AND 
        table_student_performancetasks.teacherid = table_student_finalgrade.teacherid AND 
        table_student_performancetasks.subjectid = table_student_finalgrade.subjectid AND 
        table_student_performancetasks.quarter = table_student_finalgrade.quarter AND 
        table_student_performancetasks.schoolyear = table_student_finalgrade.schoolyear
        INNER JOIN table_student_quarterlyassessment ON 
        table_student_quarterlyassessment.studentid = table_student_finalgrade.studentid AND 
        table_student_quarterlyassessment.teacherid = table_student_finalgrade.teacherid AND 
        table_student_quarterlyassessment.subjectid = table_student_finalgrade.subjectid AND 
        table_student_quarterlyassessment.quarter = table_student_finalgrade.quarter AND 
        table_student_quarterlyassessment.schoolyear = table_student_finalgrade.schoolyear
        INNER JOIN table_student ON table_student.id = table_student_finalgrade.studentid
        INNER JOIN table_student_section ON table_student_section.studentid = table_student_finalgrade.studentid
        INNER JOIN table_section ON table_section.id = table_student_section.sectionid
        WHERE 
        table_student_finalgrade.teacherid = :teacherid AND table_student_finalgrade.subjectid = :subjectid AND 
        table_student_finalgrade.studentid = :studentid AND table_student_finalgrade.schoolyear = :schoolyear AND 
        table_student_finalgrade.quarter = :quarter AND

        table_student_writtenworks.teacherid = :teacherid AND table_student_writtenworks.subjectid = :subjectid AND
        table_student_writtenworks.studentid = :studentid AND table_student_writtenworks.schoolyear = :schoolyear AND 
        table_student_writtenworks.quarter = :quarter AND

        table_student_performancetasks.teacherid = :teacherid AND table_student_performancetasks.subjectid = :subjectid AND 
        table_student_performancetasks.studentid = :studentid AND table_student_performancetasks.schoolyear = :schoolyear AND 
        table_student_performancetasks.quarter = :quarter AND

        table_student_quarterlyassessment.teacherid = :teacherid AND table_student_quarterlyassessment.subjectid = :subjectid AND
        table_student_quarterlyassessment.studentid = :studentid AND table_student_quarterlyassessment.schoolyear = :schoolyear AND
        table_student_quarterlyassessment.quarter = :quarter';

        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':studentid', $_POST['studentid']);
        $s->bindValue(':subjectid', $_POST['subjectid']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->bindValue(':quarter', $_POST['quarter']);
        $s->execute();

    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Fetching First Quarter Grade");</script>';
    }
    foreach($s as $row)
    {
        $firstQuarterGrades[] = array(
                        'qs1' => $row['qs1'],
                        'qs2' => $row['qs2'],
                        'qs3' => $row['qs3'],
                        'qs4' => $row['qs4'],
                        'qs5' => $row['qs5'],
                        'qs6' => $row['qs6'],
                        'qs7' => $row['qs7'],
                        'qs8' => $row['qs8'],
                        'qs9' => $row['qs9'],
                        'qs10' => $row['qs10'],
                        'qtotal' => $row['qtotal'],
                        'qps' => $row['qps'],
                        'qws' => $row['qws'],
                        'ptq1' => $row['ptq1'],
                        'ptq2' => $row['ptq2'],
                        'ptq3' => $row['ptq3'],
                        'ptq4' => $row['ptq4'],
                        'ptq5' => $row['ptq5'],
                        'ptq6' => $row['ptq6'],
                        'ptq7' => $row['ptq7'],
                        'ptq8' => $row['ptq8'],
                        'ptq9' => $row['ptq9'],
                        'ptq10' => $row['ptq10'],
                        'ptqtotal' => $row['ptqtotal'],
                        'ptps' => $row['ptps'],
                        'ptws' => $row['ptws'],
                        'qa1' => $row['qa1'],
                        'qaps' => $row['qaps'],
                        'qaws' => $row['qaws'],
                        'finalgrade' => $row['finalgrade'],
                        'initialgrade' => $row['initialgrade'],
                        'schoolyear' => $row['schoolyear'],
                        'section_name' => $row['section_name'],
                        'section_year' => $row['section_year'],
                        'student_firstname' => $row['student_firstname'],
                        'student_middlename' => $row['student_middlename'],
                        'student_lastname' => $row['student_lastname']
        );
    }
    $quarter = 'Second Quarter';
    include 'quarterGrades.html.php';
    exit();
}

if(isset($_GET['thirdQuarterGrade']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT finalgrade, initialgrade, 
        ptps, ptq1, ptq2, ptq3, ptq4, ptq5, ptq6, ptq7, ptq8, ptq9, ptq10, ptqtotal, ptws, 
        qa1, qaps, qaws, 
        qps, qs1, qs2, qs3, qs4, qs5, qs6, qs7, qs8, qs9, qs10, qtotal, qws, 
        table_student_finalgrade.quarter as quarter, table_student_finalgrade.schoolyear as schoolyear, student_firstname, student_middlename, student_lastname, section_name, section_year FROM table_student_finalgrade 
        INNER JOIN table_student_writtenworks ON 
        table_student_writtenworks.studentid = table_student_finalgrade.studentid AND 
        table_student_writtenworks.teacherid = table_student_finalgrade.teacherid AND 
        table_student_writtenworks.subjectid = table_student_finalgrade.subjectid AND 
        table_student_writtenworks.quarter = table_student_finalgrade.quarter AND 
        table_student_writtenworks.schoolyear = table_student_finalgrade.schoolyear
        INNER JOIN table_student_performancetasks ON 
        table_student_performancetasks.studentid = table_student_finalgrade.studentid AND 
        table_student_performancetasks.teacherid = table_student_finalgrade.teacherid AND 
        table_student_performancetasks.subjectid = table_student_finalgrade.subjectid AND 
        table_student_performancetasks.quarter = table_student_finalgrade.quarter AND 
        table_student_performancetasks.schoolyear = table_student_finalgrade.schoolyear
        INNER JOIN table_student_quarterlyassessment ON 
        table_student_quarterlyassessment.studentid = table_student_finalgrade.studentid AND 
        table_student_quarterlyassessment.teacherid = table_student_finalgrade.teacherid AND 
        table_student_quarterlyassessment.subjectid = table_student_finalgrade.subjectid AND 
        table_student_quarterlyassessment.quarter = table_student_finalgrade.quarter AND 
        table_student_quarterlyassessment.schoolyear = table_student_finalgrade.schoolyear
        INNER JOIN table_student ON table_student.id = table_student_finalgrade.studentid
        INNER JOIN table_student_section ON table_student_section.studentid = table_student_finalgrade.studentid
        INNER JOIN table_section ON table_section.id = table_student_section.sectionid
        WHERE 
        table_student_finalgrade.teacherid = :teacherid AND table_student_finalgrade.subjectid = :subjectid AND 
        table_student_finalgrade.studentid = :studentid AND table_student_finalgrade.schoolyear = :schoolyear AND 
        table_student_finalgrade.quarter = :quarter AND

        table_student_writtenworks.teacherid = :teacherid AND table_student_writtenworks.subjectid = :subjectid AND
        table_student_writtenworks.studentid = :studentid AND table_student_writtenworks.schoolyear = :schoolyear AND 
        table_student_writtenworks.quarter = :quarter AND

        table_student_performancetasks.teacherid = :teacherid AND table_student_performancetasks.subjectid = :subjectid AND 
        table_student_performancetasks.studentid = :studentid AND table_student_performancetasks.schoolyear = :schoolyear AND 
        table_student_performancetasks.quarter = :quarter AND

        table_student_quarterlyassessment.teacherid = :teacherid AND table_student_quarterlyassessment.subjectid = :subjectid AND
        table_student_quarterlyassessment.studentid = :studentid AND table_student_quarterlyassessment.schoolyear = :schoolyear AND
        table_student_quarterlyassessment.quarter = :quarter';

        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':studentid', $_POST['studentid']);
        $s->bindValue(':subjectid', $_POST['subjectid']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->bindValue(':quarter', $_POST['quarter']);
        $s->execute();

    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Fetching First Quarter Grade");</script>';
    }
    foreach($s as $row)
    {
        $firstQuarterGrades[] = array(
                        'qs1' => $row['qs1'],
                        'qs2' => $row['qs2'],
                        'qs3' => $row['qs3'],
                        'qs4' => $row['qs4'],
                        'qs5' => $row['qs5'],
                        'qs6' => $row['qs6'],
                        'qs7' => $row['qs7'],
                        'qs8' => $row['qs8'],
                        'qs9' => $row['qs9'],
                        'qs10' => $row['qs10'],
                        'qtotal' => $row['qtotal'],
                        'qps' => $row['qps'],
                        'qws' => $row['qws'],
                        'ptq1' => $row['ptq1'],
                        'ptq2' => $row['ptq2'],
                        'ptq3' => $row['ptq3'],
                        'ptq4' => $row['ptq4'],
                        'ptq5' => $row['ptq5'],
                        'ptq6' => $row['ptq6'],
                        'ptq7' => $row['ptq7'],
                        'ptq8' => $row['ptq8'],
                        'ptq9' => $row['ptq9'],
                        'ptq10' => $row['ptq10'],
                        'ptqtotal' => $row['ptqtotal'],
                        'ptps' => $row['ptps'],
                        'ptws' => $row['ptws'],
                        'qa1' => $row['qa1'],
                        'qaps' => $row['qaps'],
                        'qaws' => $row['qaws'],
                        'finalgrade' => $row['finalgrade'],
                        'initialgrade' => $row['initialgrade'],
                        'schoolyear' => $row['schoolyear'],
                        'section_name' => $row['section_name'],
                        'section_year' => $row['section_year'],
                        'student_firstname' => $row['student_firstname'],
                        'student_middlename' => $row['student_middlename'],
                        'student_lastname' => $row['student_lastname']
        );
    }
    $quarter = 'Third Quarter';
    include 'quarterGrades.html.php';
    exit();
}

if(isset($_GET['fourthQuarterGrade']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT finalgrade, initialgrade, 
        ptps, ptq1, ptq2, ptq3, ptq4, ptq5, ptq6, ptq7, ptq8, ptq9, ptq10, ptqtotal, ptws, 
        qa1, qaps, qaws, 
        qps, qs1, qs2, qs3, qs4, qs5, qs6, qs7, qs8, qs9, qs10, qtotal, qws, 
        table_student_finalgrade.quarter as quarter, table_student_finalgrade.schoolyear as schoolyear, student_firstname, student_middlename, student_lastname, section_name, section_year FROM table_student_finalgrade 
        INNER JOIN table_student_writtenworks ON 
        table_student_writtenworks.studentid = table_student_finalgrade.studentid AND 
        table_student_writtenworks.teacherid = table_student_finalgrade.teacherid AND 
        table_student_writtenworks.subjectid = table_student_finalgrade.subjectid AND 
        table_student_writtenworks.quarter = table_student_finalgrade.quarter AND 
        table_student_writtenworks.schoolyear = table_student_finalgrade.schoolyear
        INNER JOIN table_student_performancetasks ON 
        table_student_performancetasks.studentid = table_student_finalgrade.studentid AND 
        table_student_performancetasks.teacherid = table_student_finalgrade.teacherid AND 
        table_student_performancetasks.subjectid = table_student_finalgrade.subjectid AND 
        table_student_performancetasks.quarter = table_student_finalgrade.quarter AND 
        table_student_performancetasks.schoolyear = table_student_finalgrade.schoolyear
        INNER JOIN table_student_quarterlyassessment ON 
        table_student_quarterlyassessment.studentid = table_student_finalgrade.studentid AND 
        table_student_quarterlyassessment.teacherid = table_student_finalgrade.teacherid AND 
        table_student_quarterlyassessment.subjectid = table_student_finalgrade.subjectid AND 
        table_student_quarterlyassessment.quarter = table_student_finalgrade.quarter AND 
        table_student_quarterlyassessment.schoolyear = table_student_finalgrade.schoolyear
        INNER JOIN table_student ON table_student.id = table_student_finalgrade.studentid
        INNER JOIN table_student_section ON table_student_section.studentid = table_student_finalgrade.studentid
        INNER JOIN table_section ON table_section.id = table_student_section.sectionid
        WHERE 
        table_student_finalgrade.teacherid = :teacherid AND table_student_finalgrade.subjectid = :subjectid AND 
        table_student_finalgrade.studentid = :studentid AND table_student_finalgrade.schoolyear = :schoolyear AND 
        table_student_finalgrade.quarter = :quarter AND

        table_student_writtenworks.teacherid = :teacherid AND table_student_writtenworks.subjectid = :subjectid AND
        table_student_writtenworks.studentid = :studentid AND table_student_writtenworks.schoolyear = :schoolyear AND 
        table_student_writtenworks.quarter = :quarter AND

        table_student_performancetasks.teacherid = :teacherid AND table_student_performancetasks.subjectid = :subjectid AND 
        table_student_performancetasks.studentid = :studentid AND table_student_performancetasks.schoolyear = :schoolyear AND 
        table_student_performancetasks.quarter = :quarter AND

        table_student_quarterlyassessment.teacherid = :teacherid AND table_student_quarterlyassessment.subjectid = :subjectid AND
        table_student_quarterlyassessment.studentid = :studentid AND table_student_quarterlyassessment.schoolyear = :schoolyear AND
        table_student_quarterlyassessment.quarter = :quarter';

        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':studentid', $_POST['studentid']);
        $s->bindValue(':subjectid', $_POST['subjectid']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->bindValue(':quarter', $_POST['quarter']);
        $s->execute();

    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Fetching First Quarter Grade");</script>';
    }
    foreach($s as $row)
    {
        $firstQuarterGrades[] = array(
                        'qs1' => $row['qs1'],
                        'qs2' => $row['qs2'],
                        'qs3' => $row['qs3'],
                        'qs4' => $row['qs4'],
                        'qs5' => $row['qs5'],
                        'qs6' => $row['qs6'],
                        'qs7' => $row['qs7'],
                        'qs8' => $row['qs8'],
                        'qs9' => $row['qs9'],
                        'qs10' => $row['qs10'],
                        'qtotal' => $row['qtotal'],
                        'qps' => $row['qps'],
                        'qws' => $row['qws'],
                        'ptq1' => $row['ptq1'],
                        'ptq2' => $row['ptq2'],
                        'ptq3' => $row['ptq3'],
                        'ptq4' => $row['ptq4'],
                        'ptq5' => $row['ptq5'],
                        'ptq6' => $row['ptq6'],
                        'ptq7' => $row['ptq7'],
                        'ptq8' => $row['ptq8'],
                        'ptq9' => $row['ptq9'],
                        'ptq10' => $row['ptq10'],
                        'ptqtotal' => $row['ptqtotal'],
                        'ptps' => $row['ptps'],
                        'ptws' => $row['ptws'],
                        'qa1' => $row['qa1'],
                        'qaps' => $row['qaps'],
                        'qaws' => $row['qaws'],
                        'finalgrade' => $row['finalgrade'],
                        'initialgrade' => $row['initialgrade'],
                        'schoolyear' => $row['schoolyear'],
                        'section_name' => $row['section_name'],
                        'section_year' => $row['section_year'],
                        'student_firstname' => $row['student_firstname'],
                        'student_middlename' => $row['student_middlename'],
                        'student_lastname' => $row['student_lastname']
        );
    }
    $quarter = 'Fourth Quarter';
    include 'quarterGrades.html.php';
    exit();
}

if(isset($_GET['finalizegrade']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT table_student_finalgrade.studentid as studentid, table_student_finalgrade.schoolyear as schoolyear, table_student_finalgrade.teacherid as teacherid, table_student_finalgrade.subjectid as subjectid, student_firstname, student_middlename, student_lastname, section_name, section_year,
        max(CASE WHEN quarter = "First Quarter" THEN finalgrade ELSE 0 END) as firstquarter,
        max(CASE WHEN quarter = "Second Quarter" THEN finalgrade ELSE 0 END) as secondquarter,
        max(CASE WHEN quarter = "Third Quarter" THEN finalgrade ELSE 0 END) as thirdquarter,
        max(CASE WHEN quarter = "Fourth Quarter" THEN finalgrade ELSE 0 END) as fourthquarter
        FROM table_student_finalgrade
        INNER JOIN table_student_section on table_student_section.studentid = table_student_finalgrade.studentid
        INNER JOIN table_section ON table_section.id = table_student_section.sectionid
        INNER JOIN table_student ON table_student.id = table_student_finalgrade.studentid
        WHERE table_student_finalgrade.schoolyear = :schoolyear AND student_status = "Active" AND section_status = "Active" AND table_student_finalgrade.teacherid = :teacherid AND table_student_finalgrade.subjectid = :subjectid
        GROUP BY studentid
        ORDER by studentid';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_SESSION['teacherid']);
        $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
        $s->bindValue(':subjectid', $_SESSION['subjectid']);
        $s->execute();
    
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Fetching table_student_finalgrade at Set Grades");</script>';
    }
    foreach($s as $row)
    {
        $finalgrades[] = array(
                            'student_firstname' => $row['student_firstname'],
                            'student_middlename' => $row['student_middlename'],
                            'student_lastname' => $row['student_lastname'],
                            'section_name' => $row['section_name'],
                            'section_year' => $row['section_year'],
                            'secondquarter' => $row['secondquarter'],
                            'thirdquarter' => $row['thirdquarter'],
                            'fourthquarter' => $row['fourthquarter'],
                            'firstquarter' => $row['firstquarter'],
                            'studentid' => $row['studentid'],
                            'teacherid' => $row['teacherid'],
                            'subjectid' => $row['subjectid'],
                            'schoolyear' => $row['schoolyear']
    
        );
    }

    include 'finalizegrade.html.php';
    exit();
}

include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';

try
{
    $sql = 'SELECT qtotal, qps, qa1, qws, ptqtotal, ptps, ptws, qaps, qaws, initialgrade, finalgrade, table_student_finalgrade.quarter as quarter, table_student_finalgrade.studentid as studentid, table_student_finalgrade.subjectid as subjectid, table_student_finalgrade.teacherid as teacherid, table_student_finalgrade.schoolyear as schoolyear, student_firstname, student_middlename, student_lastname, section_name, section_year FROM table_student_finalgrade 
    INNER JOIN table_student_writtenworks ON 
    table_student_writtenworks.studentid = table_student_finalgrade.studentid AND 
    table_student_writtenworks.teacherid = table_student_finalgrade.teacherid AND 
    table_student_writtenworks.subjectid = table_student_finalgrade.subjectid AND 
    table_student_writtenworks.quarter = table_student_finalgrade.quarter AND 
    table_student_writtenworks.schoolyear = table_student_finalgrade.schoolyear
    INNER JOIN table_student_performancetasks ON 
    table_student_performancetasks.studentid = table_student_finalgrade.studentid AND 
    table_student_performancetasks.teacherid = table_student_finalgrade.teacherid AND 
    table_student_performancetasks.subjectid = table_student_finalgrade.subjectid AND 
    table_student_performancetasks.quarter = table_student_finalgrade.quarter AND 
    table_student_performancetasks.schoolyear = table_student_finalgrade.schoolyear
    INNER JOIN table_student_quarterlyassessment ON 
    table_student_quarterlyassessment.studentid = table_student_finalgrade.studentid AND 
    table_student_quarterlyassessment.teacherid = table_student_finalgrade.teacherid AND 
    table_student_quarterlyassessment.subjectid = table_student_finalgrade.subjectid AND 
    table_student_quarterlyassessment.quarter = table_student_finalgrade.quarter AND 
    table_student_quarterlyassessment.schoolyear = table_student_finalgrade.schoolyear
    INNER JOIN table_student ON table_student.id = table_student_finalgrade.studentid
    INNER JOIN table_student_section ON table_student_section.studentid = table_student_finalgrade.studentid
    INNER JOIN table_section ON table_section.id = table_student_section.sectionid
    WHERE table_student_finalgrade.teacherid = :teacherid AND table_student_finalgrade.subjectid = :subjectid AND table_student_finalgrade.quarter = "First Quarter" AND table_student_finalgrade.schoolyear = :schoolyear';
    $s = $pdo->prepare($sql);
    $s->bindValue(':teacherid', $_SESSION['teacherid']);
    $s->bindValue(':subjectid', $_SESSION['subjectid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();
}
catch (PDOException $e)
{
    echo '<script>alert("Error Fetching Overall Grade");</script>';
}
foreach($s as $row)
{   
    $firstQuarters[] = array(
                            'qtotal' => $row['qtotal'],
                            'qps' => $row['qps'],
                            'qws' => $row['qws'],
                            'ptqtotal' => $row['ptqtotal'],
                            'qa1' => $row['qa1'],
                            'ptps' => $row['ptps'],
                            'ptws' => $row['ptws'],
                            'qaps' => $row['qaps'],
                            'qaws' => $row['qaws'],
                            'initialgrade' => $row['initialgrade'],
                            'finalgrade' => $row['finalgrade'],
                            'studentid' => $row['studentid'],
                            'subjectid' => $row['subjectid'],
                            'teacherid' => $row['teacherid'],
                            'student_firstname' => $row['student_firstname'],
                            'student_middlename' => $row['student_middlename'],
                            'student_lastname' => $row['student_lastname'],
                            'section_name' => $row['section_name'],
                            'section_year' => $row['section_year'],
                            'schoolyear' => $row['schoolyear'],
                            'quarter' => $row['quarter']
                        );
}

try
{
    $sql = 'SELECT qtotal, qps, qa1, qws, ptqtotal, ptps, ptws, qaps, qaws, initialgrade, finalgrade, table_student_finalgrade.quarter as quarter, table_student_finalgrade.studentid as studentid, table_student_finalgrade.subjectid as subjectid, table_student_finalgrade.teacherid as teacherid, table_student_finalgrade.schoolyear as schoolyear, student_firstname, student_middlename, student_lastname, section_name, section_year FROM table_student_finalgrade 
    INNER JOIN table_student_writtenworks ON 
    table_student_writtenworks.studentid = table_student_finalgrade.studentid AND 
    table_student_writtenworks.teacherid = table_student_finalgrade.teacherid AND 
    table_student_writtenworks.subjectid = table_student_finalgrade.subjectid AND 
    table_student_writtenworks.quarter = table_student_finalgrade.quarter AND 
    table_student_writtenworks.schoolyear = table_student_finalgrade.schoolyear
    INNER JOIN table_student_performancetasks ON 
    table_student_performancetasks.studentid = table_student_finalgrade.studentid AND 
    table_student_performancetasks.teacherid = table_student_finalgrade.teacherid AND 
    table_student_performancetasks.subjectid = table_student_finalgrade.subjectid AND 
    table_student_performancetasks.quarter = table_student_finalgrade.quarter AND 
    table_student_performancetasks.schoolyear = table_student_finalgrade.schoolyear
    INNER JOIN table_student_quarterlyassessment ON 
    table_student_quarterlyassessment.studentid = table_student_finalgrade.studentid AND 
    table_student_quarterlyassessment.teacherid = table_student_finalgrade.teacherid AND 
    table_student_quarterlyassessment.subjectid = table_student_finalgrade.subjectid AND 
    table_student_quarterlyassessment.quarter = table_student_finalgrade.quarter AND 
    table_student_quarterlyassessment.schoolyear = table_student_finalgrade.schoolyear
    INNER JOIN table_student ON table_student.id = table_student_finalgrade.studentid
    INNER JOIN table_student_section ON table_student_section.studentid = table_student_finalgrade.studentid
    INNER JOIN table_section ON table_section.id = table_student_section.sectionid
    WHERE table_student_finalgrade.teacherid = :teacherid AND table_student_finalgrade.subjectid = :subjectid AND table_student_finalgrade.quarter = "Second Quarter" AND table_student_finalgrade.schoolyear = :schoolyear';
    $s = $pdo->prepare($sql);
    $s->bindValue(':teacherid', $_SESSION['teacherid']);
    $s->bindValue(':subjectid', $_SESSION['subjectid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();
}
catch (PDOException $e)
{
    echo '<script>alert("Error Fetching Overall Grade");</script>';
}
foreach($s as $row)
{
    $secondQuarters[] = array(
                            'qtotal' => $row['qtotal'],
                            'qps' => $row['qps'],
                            'qws' => $row['qws'],
                            'ptqtotal' => $row['ptqtotal'],
                            'qa1' => $row['qa1'],
                            'ptps' => $row['ptps'],
                            'ptws' => $row['ptws'],
                            'qaps' => $row['qaps'],
                            'qaws' => $row['qaws'],
                            'initialgrade' => $row['initialgrade'],
                            'finalgrade' => $row['finalgrade'],
                            'studentid' => $row['studentid'],
                            'subjectid' => $row['subjectid'],
                            'teacherid' => $row['teacherid'],
                            'student_firstname' => $row['student_firstname'],
                            'student_middlename' => $row['student_middlename'],
                            'student_lastname' => $row['student_lastname'],
                            'section_name' => $row['section_name'],
                            'section_year' => $row['section_year'],
                            'schoolyear' => $row['schoolyear'],
                            'quarter' => $row['quarter']
                        );
}

try
{
    $sql = 'SELECT qtotal, qps, qa1, qws, ptqtotal, ptps, ptws, qaps, qaws, initialgrade, finalgrade, table_student_finalgrade.quarter as quarter, table_student_finalgrade.studentid as studentid, table_student_finalgrade.subjectid as subjectid, table_student_finalgrade.teacherid as teacherid, table_student_finalgrade.schoolyear as schoolyear, student_firstname, student_middlename, student_lastname, section_name, section_year FROM table_student_finalgrade 
    INNER JOIN table_student_writtenworks ON 
    table_student_writtenworks.studentid = table_student_finalgrade.studentid AND 
    table_student_writtenworks.teacherid = table_student_finalgrade.teacherid AND 
    table_student_writtenworks.subjectid = table_student_finalgrade.subjectid AND 
    table_student_writtenworks.quarter = table_student_finalgrade.quarter AND 
    table_student_writtenworks.schoolyear = table_student_finalgrade.schoolyear
    INNER JOIN table_student_performancetasks ON 
    table_student_performancetasks.studentid = table_student_finalgrade.studentid AND 
    table_student_performancetasks.teacherid = table_student_finalgrade.teacherid AND 
    table_student_performancetasks.subjectid = table_student_finalgrade.subjectid AND 
    table_student_performancetasks.quarter = table_student_finalgrade.quarter AND 
    table_student_performancetasks.schoolyear = table_student_finalgrade.schoolyear
    INNER JOIN table_student_quarterlyassessment ON 
    table_student_quarterlyassessment.studentid = table_student_finalgrade.studentid AND 
    table_student_quarterlyassessment.teacherid = table_student_finalgrade.teacherid AND 
    table_student_quarterlyassessment.subjectid = table_student_finalgrade.subjectid AND 
    table_student_quarterlyassessment.quarter = table_student_finalgrade.quarter AND 
    table_student_quarterlyassessment.schoolyear = table_student_finalgrade.schoolyear
    INNER JOIN table_student ON table_student.id = table_student_finalgrade.studentid
    INNER JOIN table_student_section ON table_student_section.studentid = table_student_finalgrade.studentid
    INNER JOIN table_section ON table_section.id = table_student_section.sectionid
    WHERE table_student_finalgrade.teacherid = :teacherid AND table_student_finalgrade.subjectid = :subjectid AND table_student_finalgrade.quarter = "Third Quarter" AND table_student_finalgrade.schoolyear = :schoolyear';
    $s = $pdo->prepare($sql);
    $s->bindValue(':teacherid', $_SESSION['teacherid']);
    $s->bindValue(':subjectid', $_SESSION['subjectid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();
}
catch (PDOException $e)
{
    echo '<script>alert("Error Fetching Overall Grade");</script>';
}
foreach($s as $row)
{
    $thirdQuarters[] = array(
                            'qtotal' => $row['qtotal'],
                            'qps' => $row['qps'],
                            'qws' => $row['qws'],
                            'ptqtotal' => $row['ptqtotal'],
                            'qa1' => $row['qa1'],
                            'ptps' => $row['ptps'],
                            'ptws' => $row['ptws'],
                            'qaps' => $row['qaps'],
                            'qaws' => $row['qaws'],
                            'initialgrade' => $row['initialgrade'],
                            'finalgrade' => $row['finalgrade'],
                            'studentid' => $row['studentid'],
                            'subjectid' => $row['subjectid'],
                            'teacherid' => $row['teacherid'],
                            'student_firstname' => $row['student_firstname'],
                            'student_middlename' => $row['student_middlename'],
                            'student_lastname' => $row['student_lastname'],
                            'section_name' => $row['section_name'],
                            'section_year' => $row['section_year'],
                            'schoolyear' => $row['schoolyear'],
                            'quarter' => $row['quarter']
                        );
}

try
{
    $sql = 'SELECT qtotal, qps, qa1, qws, ptqtotal, ptps, ptws, qaps, qaws, initialgrade, finalgrade, table_student_finalgrade.quarter as quarter, table_student_finalgrade.studentid as studentid, table_student_finalgrade.subjectid as subjectid, table_student_finalgrade.teacherid as teacherid, table_student_finalgrade.schoolyear as schoolyear, student_firstname, student_middlename, student_lastname, section_name, section_year FROM table_student_finalgrade 
    INNER JOIN table_student_writtenworks ON 
    table_student_writtenworks.studentid = table_student_finalgrade.studentid AND 
    table_student_writtenworks.teacherid = table_student_finalgrade.teacherid AND 
    table_student_writtenworks.subjectid = table_student_finalgrade.subjectid AND 
    table_student_writtenworks.quarter = table_student_finalgrade.quarter AND 
    table_student_writtenworks.schoolyear = table_student_finalgrade.schoolyear
    INNER JOIN table_student_performancetasks ON 
    table_student_performancetasks.studentid = table_student_finalgrade.studentid AND 
    table_student_performancetasks.teacherid = table_student_finalgrade.teacherid AND 
    table_student_performancetasks.subjectid = table_student_finalgrade.subjectid AND 
    table_student_performancetasks.quarter = table_student_finalgrade.quarter AND 
    table_student_performancetasks.schoolyear = table_student_finalgrade.schoolyear
    INNER JOIN table_student_quarterlyassessment ON 
    table_student_quarterlyassessment.studentid = table_student_finalgrade.studentid AND 
    table_student_quarterlyassessment.teacherid = table_student_finalgrade.teacherid AND 
    table_student_quarterlyassessment.subjectid = table_student_finalgrade.subjectid AND 
    table_student_quarterlyassessment.quarter = table_student_finalgrade.quarter AND 
    table_student_quarterlyassessment.schoolyear = table_student_finalgrade.schoolyear
    INNER JOIN table_student ON table_student.id = table_student_finalgrade.studentid
    INNER JOIN table_student_section ON table_student_section.studentid = table_student_finalgrade.studentid
    INNER JOIN table_section ON table_section.id = table_student_section.sectionid
    WHERE table_student_finalgrade.teacherid = :teacherid AND table_student_finalgrade.subjectid = :subjectid AND table_student_finalgrade.quarter = "Fourth Quarter" AND table_student_finalgrade.schoolyear = :schoolyear';
    $s = $pdo->prepare($sql);
    $s->bindValue(':teacherid', $_SESSION['teacherid']);
    $s->bindValue(':subjectid', $_SESSION['subjectid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();
}
catch (PDOException $e)
{
    echo '<script>alert("Error Fetching Overall Grade");</script>';
}
foreach($s as $row)
{
    $fourthQuarters[] = array(
                            'qtotal' => $row['qtotal'],
                            'qps' => $row['qps'],
                            'qws' => $row['qws'],
                            'ptqtotal' => $row['ptqtotal'],
                            'qa1' => $row['qa1'],
                            'ptps' => $row['ptps'],
                            'ptws' => $row['ptws'],
                            'qaps' => $row['qaps'],
                            'qaws' => $row['qaws'],
                            'initialgrade' => $row['initialgrade'],
                            'finalgrade' => $row['finalgrade'],
                            'studentid' => $row['studentid'],
                            'subjectid' => $row['subjectid'],
                            'teacherid' => $row['teacherid'],
                            'student_firstname' => $row['student_firstname'],
                            'student_middlename' => $row['student_middlename'],
                            'student_lastname' => $row['student_lastname'],
                            'section_name' => $row['section_name'],
                            'section_year' => $row['section_year'],
                            'schoolyear' => $row['schoolyear'],
                            'quarter' => $row['quarter']
                        );
}

try
{
    $sql = 'SELECT table_section.id as sectionid, section_year, section_name, table_student.id as studentid, student_firstname, student_middlename, student_lastname FROM table_student_section 
    INNER JOIN table_student ON table_student.id = table_student_section.studentid 
    INNER JOIN table_section ON table_section.id = table_student_section.sectionid 
    INNER JOIN table_teacher_section ON table_teacher_section.sectionid = table_student_section.sectionid 
    WHERE table_teacher_section.teacherid = :teacherid AND table_student_section.schoolyear = :schoolyear AND table_teacher_section.schoolyear = :schoolyear AND student_status = "Active" AND section_status = "Active"';
    $s = $pdo->prepare($sql);
    $s->bindValue(':teacherid', $_SESSION['teacherid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();
}
catch (PDOException $e)
{
    echo '<script>alert("Error Fetching Student Data at Set Grades");</script>';
}
foreach($s as $row)
{
    $studentDetails[] = array(
                        'sectionid' => $row['sectionid'],
                        'section_year' => $row['section_year'],
                        'section_name' => $row['section_name'],
                        'studentid' => $row['studentid'],
                        'student_firstname' => $row['student_firstname'],
                        'student_middlename' => $row['student_middlename'],
                        'student_lastname' => $row['student_lastname']
                    );
}

try
{
    $sql = 'SELECT student_firstname, student_middlename, student_lastname, firstquarter, secondquarter, thirdquarter, fourthquarter, subjectgrade FROM table_student_sujectgrade
    INNER JOIN table_student ON table_student.id = table_student_sujectgrade.studentid
    WHERE table_student_sujectgrade.teacherid = :teacherid AND table_student_sujectgrade.schoolyear = :schoolyear AND student_status = "Active"';
    $s = $pdo->prepare($sql);
    $s->bindValue(':teacherid', $_SESSION['teacherid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();
}
catch(PDEOxception $e)
{
    echo '<script>alert("Error Fetching table_student_sujectgrade at Set Grades");</script>';
}
foreach($s as $row)
{
    $finalgrades[] = array(
        'student_firstname' => $row['student_firstname'],
        'student_middlename' => $row['student_middlename'],
        'student_lastname' => $row['student_lastname'],
        'firstquarter' => $row['firstquarter'],
        'secondquarter' => $row['secondquarter'],
        'thirdquarter' => $row['thirdquarter'],
        'fourthquarter' => $row['fourthquarter'],
        'subjectgrade' => $row['subjectgrade']
    );
}

include 'setGrade.html.php';