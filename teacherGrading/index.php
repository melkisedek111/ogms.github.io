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

if(isset($_POST['setww']) and $_POST['setww'] == 'Submit')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT COUNT(*) FROM table_writtenworks WHERE teacherid = :teacherid AND subjectid = :subjectid AND quarter = :quarter AND schoolyear = :schoolyear';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':subjectid', $_POST['subjectid']);
        $s->bindValue(':quarter', $_POST['setquarter']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
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
            $sql = 'UPDATE table_writtenworks SET
                iq1 = :iq1,
                iq2 = :iq2,
                iq3 = :iq3,
                iq4 = :iq4,
                iq5 = :iq5,
                iq6 = :iq6,
                iq7 = :iq7,
                iq8 = :iq8,
                iq9 = :iq9,
                iq10 = :iq10,
                totalitem = :totalitem,
                ps = :ps,
                ws = :ws
                WHERE teacherid = :teacherid 
                AND subjectid = :subjectid 
                AND quarter = :quarter 
                AND schoolyear = :schoolyear';
                $s = $pdo->prepare($sql);
                $s->bindValue(':iq1', $_POST['q1']);
                $s->bindValue(':iq2', $_POST['q2']);
                $s->bindValue(':iq3', $_POST['q3']);
                $s->bindValue(':iq4', $_POST['q4']);
                $s->bindValue(':iq5', $_POST['q5']);
                $s->bindValue(':iq6', $_POST['q6']);
                $s->bindValue(':iq7', $_POST['q7']);
                $s->bindValue(':iq8', $_POST['q8']);
                $s->bindValue(':iq9', $_POST['q9']);
                $s->bindValue(':iq10', $_POST['q10']);
                $s->bindValue(':teacherid', $_POST['teacherid']);
                $s->bindValue(':subjectid', $_POST['subjectid']);
                $s->bindValue(':totalitem', $_POST['total']);
                $s->bindValue(':ps', $_POST['ps']);
                $s->bindValue(':ws', $_POST['ws']);
                $s->bindValue(':schoolyear', $_POST['schoolyear']);
                $s->bindValue(':quarter', $_POST['setquarter']);
                $s->execute();
        }
        catch(PDOException $e)
        {
            echo '<script>alert("Error set Written Works Data");</script>';
        }
    }
    else
    {
        try
        {
            $sql = 'INSERT INTO table_writtenworks SET
                teacherid = :teacherid,
                subjectid = :subjectid,
                iq1 = :iq1,
                iq2 = :iq2,
                iq3 = :iq3,
                iq4 = :iq4,
                iq5 = :iq5,
                iq6 = :iq6,
                iq7 = :iq7,
                iq8 = :iq8,
                iq9 = :iq9,
                iq10 = :iq10,
                totalitem = :totalitem,
                ps = :ps,
                ws = :ws,
                schoolyear = :schoolyear,
                quarter = :quarter';
                $s = $pdo->prepare($sql);
                $s->bindValue(':iq1', $_POST['q1']);
                $s->bindValue(':iq2', $_POST['q2']);
                $s->bindValue(':iq3', $_POST['q3']);
                $s->bindValue(':iq4', $_POST['q4']);
                $s->bindValue(':iq5', $_POST['q5']);
                $s->bindValue(':iq6', $_POST['q6']);
                $s->bindValue(':iq7', $_POST['q7']);
                $s->bindValue(':iq8', $_POST['q8']);
                $s->bindValue(':iq9', $_POST['q9']);
                $s->bindValue(':iq10', $_POST['q10']);
                $s->bindValue(':teacherid', $_POST['teacherid']);
                $s->bindValue(':subjectid', $_POST['subjectid']);
                $s->bindValue(':totalitem', $_POST['total']);
                $s->bindValue(':ps', $_POST['ps']);
                $s->bindValue(':ws', $_POST['ws']);
                $s->bindValue(':schoolyear', $_POST['schoolyear']);
                $s->bindValue(':quarter', $_POST['setquarter']);
                $s->execute();
        }
        catch(PDOException $e)
        {
            echo '<script>alert("Error set Written Works Data");</script>';
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
        $sql = 'SELECT COUNT(*) FROM table_performancetasks WHERE teacherid = :teacherid AND subjectid = :subjectid AND quarter = :quarter AND schoolyear = :schoolyear';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':subjectid', $_POST['subjectid']);
        $s->bindValue(':quarter', $_POST['setquarter']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
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
            $sql = 'UPDATE table_performancetasks SET
                iq1 = :iq1,
                iq2 = :iq2,
                iq3 = :iq3,
                iq4 = :iq4,
                iq5 = :iq5,
                iq6 = :iq6,
                iq7 = :iq7,
                iq8 = :iq8,
                iq9 = :iq9,
                iq10 = :iq10,
                totalitem = :totalitem,
                ps = :ps,
                ws = :ws
                WHERE teacherid = :teacherid 
                AND subjectid = :subjectid 
                AND quarter = :quarter 
                AND schoolyear = :schoolyear';
                $s = $pdo->prepare($sql);
                $s->bindValue(':iq1', $_POST['q1']);
                $s->bindValue(':iq2', $_POST['q2']);
                $s->bindValue(':iq3', $_POST['q3']);
                $s->bindValue(':iq4', $_POST['q4']);
                $s->bindValue(':iq5', $_POST['q5']);
                $s->bindValue(':iq6', $_POST['q6']);
                $s->bindValue(':iq7', $_POST['q7']);
                $s->bindValue(':iq8', $_POST['q8']);
                $s->bindValue(':iq9', $_POST['q9']);
                $s->bindValue(':iq10', $_POST['q10']);
                $s->bindValue(':teacherid', $_POST['teacherid']);
                $s->bindValue(':subjectid', $_POST['subjectid']);
                $s->bindValue(':totalitem', $_POST['total']);
                $s->bindValue(':ps', $_POST['ps']);
                $s->bindValue(':ws', $_POST['ws']);
                $s->bindValue(':schoolyear', $_POST['schoolyear']);
                $s->bindValue(':quarter', $_POST['setquarter']);
                $s->execute();
        }
        catch(PDOException $e)
        {
            echo '<script>alert("Error set Written Works Data");</script>';
        }
    }
    else
    {
        try
        {
            $sql = 'INSERT INTO table_performancetasks SET
                teacherid = :teacherid,
                subjectid = :subjectid,
                iq1 = :iq1,
                iq2 = :iq2,
                iq3 = :iq3,
                iq4 = :iq4,
                iq5 = :iq5,
                iq6 = :iq6,
                iq7 = :iq7,
                iq8 = :iq8,
                iq9 = :iq9,
                iq10 = :iq10,
                totalitem = :totalitem,
                ps = :ps,
                ws = :ws,
                schoolyear = :schoolyear,
                quarter = :quarter';
                $s = $pdo->prepare($sql);
                $s->bindValue(':iq1', $_POST['q1']);
                $s->bindValue(':iq2', $_POST['q2']);
                $s->bindValue(':iq3', $_POST['q3']);
                $s->bindValue(':iq4', $_POST['q4']);
                $s->bindValue(':iq5', $_POST['q5']);
                $s->bindValue(':iq6', $_POST['q6']);
                $s->bindValue(':iq7', $_POST['q7']);
                $s->bindValue(':iq8', $_POST['q8']);
                $s->bindValue(':iq9', $_POST['q9']);
                $s->bindValue(':iq10', $_POST['q10']);
                $s->bindValue(':teacherid', $_POST['teacherid']);
                $s->bindValue(':subjectid', $_POST['subjectid']);
                $s->bindValue(':totalitem', $_POST['total']);
                $s->bindValue(':ps', $_POST['ps']);
                $s->bindValue(':ws', $_POST['ws']);
                $s->bindValue(':schoolyear', $_POST['schoolyear']);
                $s->bindValue(':quarter', $_POST['setquarter']);
                $s->execute();
        }
        catch(PDOException $e)
        {
            echo '<script>alert("Error set Performance Tasks Data");</script>';
        }
    }
    header('Location: .');
    exit();
}

if(isset($_POST['setwwitems']) and $_POST['setwwitems'] == 'Set')
{
    $quarter = $_POST['quarter'];
    $schoolyear = $_SESSION['schoolyear'];
    $teacherid = $_SESSION['teacherid'];
    $subjectid = $_SESSION['subjectid'];
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT * FROM table_writtenworks WHERE teacherid = :teacherid AND subjectid = :subjectid AND quarter = :quarter AND schoolyear = :schoolyear';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_SESSION['teacherid']);
        $s->bindValue(':subjectid', $_SESSION['subjectid']);
        $s->bindValue(':quarter', $quarter);
        $s->bindValue(':schoolyear', $schoolyear);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Written Works Data");</script>';
    }

    $row = $s->fetch();
    if($row[0] > 0)
    {
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
    }
    else
    {
        $q1 = 0;
        $q2 = 0;
        $q3 = 0;
        $q4 = 0;
        $q5 = 0;
        $q6 = 0;
        $q7 = 0;
        $q8 = 0;
        $q9 = 0;
        $q10 = 0;
        $percentage = 0;
        $totalitem = 0;
        $ps = 0;
        $ws = 0;
    }

    $title = 'Written Works';

    include 'setItems.html.php';
    exit();

}

if(isset($_POST['setptitems']) and $_POST['setptitems'] == 'Set')
{
    $quarter = $_POST['quarter'];
    $schoolyear = $_SESSION['schoolyear'];
    $teacherid = $_SESSION['teacherid'];
    $subjectid = $_SESSION['subjectid'];
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT * FROM table_performancetasks WHERE teacherid = :teacherid AND subjectid = :subjectid AND quarter = :quarter AND schoolyear = :schoolyear';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_SESSION['teacherid']);
        $s->bindValue(':subjectid', $_SESSION['subjectid']);
        $s->bindValue(':quarter', $quarter);
        $s->bindValue(':schoolyear', $schoolyear);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Written Works Data");</script>';
    }

    $row = $s->fetch();
    if($row[0] > 0)
    {
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
    }
    else
    {
        $q1 = 0;
        $q2 = 0;
        $q3 = 0;
        $q4 = 0;
        $q5 = 0;
        $q6 = 0;
        $q7 = 0;
        $q8 = 0;
        $q9 = 0;
        $q10 = 0;
        $totalitem = 0;
        $ps = 0;
        $ws = 0;
    }

    $title = 'Performance Tasks';

    include 'setItems.html.php';
    exit();
}

if(isset($_POST['setqa']) and $_POST['setqa'] == 'Submit')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT COUNT(*) FROM table_quarterlyassessment WHERE teacherid = :teacherid AND subjectid = :subjectid AND quarter = :quarter AND schoolyear = :schoolyear';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':subjectid', $_POST['subjectid']);
        $s->bindValue(':quarter', $_POST['setquarter']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
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
            $sql = 'UPDATE table_quarterlyassessment SET
                iq1 = :iq1,
                ps = :ps,
                ws = :ws
                WHERE teacherid = :teacherid 
                AND subjectid = :subjectid 
                AND quarter = :quarter 
                AND schoolyear = :schoolyear';
                $s = $pdo->prepare($sql);
                $s->bindValue(':iq1', $_POST['t1']);
                $s->bindValue(':teacherid', $_POST['teacherid']);
                $s->bindValue(':subjectid', $_POST['subjectid']);
                $s->bindValue(':ps', $_POST['qps']);
                $s->bindValue(':ws', $_POST['qws']);
                $s->bindValue(':schoolyear', $_POST['schoolyear']);
                $s->bindValue(':quarter', $_POST['setquarter']);
                $s->execute();
        }
        catch(PDOException $e)
        {
            echo '<script>alert("Error set Written Works Data");</script>';
        }
    }
    else
    {
        try
        {
            $sql = 'INSERT INTO table_quarterlyassessment SET
                teacherid = :teacherid,
                subjectid = :subjectid,
                iq1 = :iq1,
                ps = :ps,
                ws = :ws,
                schoolyear = :schoolyear,
                quarter = :quarter';
                $s = $pdo->prepare($sql);
                $s->bindValue(':iq1', $_POST['t1']);
                $s->bindValue(':teacherid', $_POST['teacherid']);
                $s->bindValue(':subjectid', $_POST['subjectid']);
                $s->bindValue(':ps', $_POST['qps']);
                $s->bindValue(':ws', $_POST['qws']);
                $s->bindValue(':schoolyear', $_POST['schoolyear']);
                $s->bindValue(':quarter', $_POST['setquarter']);
                $s->execute();
        }
        catch(PDOException $e)
        {
            echo '<script>alert("Error set Performance Tasks Data");</script>';
        }
    }
    header('Location: .');
    exit();
}


if(isset($_POST['setqaitems']) and $_POST['setqaitems'] == 'Set')
{
    $quarter = $_POST['quarter'];
    $schoolyear = $_SESSION['schoolyear'];
    $teacherid = $_SESSION['teacherid'];
    $subjectid = $_SESSION['subjectid'];
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT * FROM table_quarterlyassessment WHERE teacherid = :teacherid AND subjectid = :subjectid AND quarter = :quarter AND schoolyear = :schoolyear';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_SESSION['teacherid']);
        $s->bindValue(':subjectid', $_SESSION['subjectid']);
        $s->bindValue(':quarter', $quarter);
        $s->bindValue(':schoolyear', $schoolyear);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Written Works Data");</script>';
    }

    $row = $s->fetch();
    if($row[0] > 0)
    {
        $q1 = $row['iq1'];
        $ps = $row['ps'];
        $ws = $row['ws'];
    }
    else
    {
        $q1 = 0;
        $ps = 0;
        $ws = 0;
    }

    $title = 'Quarterly Assessment';

    include 'setItems.html.php';
    exit();
}

if(isset($_GET['quarterlyassessment']))
{

    $title = 'Quarterly Assessment';
    include 'quarterGrade.html.php';
    exit();
}

if(isset($_GET['performancetask']))
{


    $title = 'Performance Tasks';
    include 'quarterGrade.html.php';
    exit();
}

if(isset($_GET['writtenworks']))
{

    $title = 'Written Works';
    include 'quarterGrade.html.php';
    exit();
    
}




include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
try
{
    $sql = 'SELECT *, subject_code, subject_title FROM table_writtenworks
    INNER JOIN table_subject ON table_subject.id = table_writtenworks.subjectid
    WHERE teacherid = :teacherid AND subjectid = :subjectid AND schoolyear = :schoolyear';
    $s = $pdo->prepare($sql);
    $s->bindValue(':teacherid', $_SESSION['teacherid']);
    $s->bindValue(':subjectid', $_SESSION['subjectid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();

}
catch(PDOException $e)
{
    echo '<script>alert("Error Fetching Written Works Data");</script>';
}
foreach($s as $row)
{
    $writtenworks[] = array(
                            'subject_code' => $row['subject_code'],
                            'subject_title' => $row['subject_title'],
                            'iq1' => $row['iq1'],
                            'iq2' => $row['iq2'],
                            'iq3' => $row['iq3'],
                            'iq4' => $row['iq4'],
                            'iq5' => $row['iq5'],
                            'iq6' => $row['iq6'],
                            'iq7' => $row['iq7'],
                            'iq8' => $row['iq8'],
                            'iq9' => $row['iq9'],
                            'iq10' => $row['iq10'],
                            'totalitem' => $row['totalitem'],
                            'ps' => $row['ps'],
                            'ws' => $row['ws'],
                            'schoolyear' => $row['schoolyear'],
                            'quarter' => $row['quarter']
    );
}

try
{
    $sql = 'SELECT *, subject_code, subject_title FROM table_performancetasks
    INNER JOIN table_subject ON table_subject.id = table_performancetasks.subjectid
    WHERE teacherid = :teacherid AND subjectid = :subjectid AND schoolyear = :schoolyear';
    $s = $pdo->prepare($sql);
    $s->bindValue(':teacherid', $_SESSION['teacherid']);
    $s->bindValue(':subjectid', $_SESSION['subjectid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();

}
catch(PDOException $e)
{
    echo '<script>alert("Error Fetching Written Works Data");</script>';
}
foreach($s as $row)
{
    $performancetasks[] = array(
                            'subject_code' => $row['subject_code'],
                            'subject_title' => $row['subject_title'],
                            'iq1' => $row['iq1'],
                            'iq2' => $row['iq2'],
                            'iq3' => $row['iq3'],
                            'iq4' => $row['iq4'],
                            'iq5' => $row['iq5'],
                            'iq6' => $row['iq6'],
                            'iq7' => $row['iq7'],
                            'iq8' => $row['iq8'],
                            'iq9' => $row['iq9'],
                            'iq10' => $row['iq10'],
                            'totalitem' => $row['totalitem'],
                            'ps' => $row['ps'],
                            'ws' => $row['ws'],
                            'schoolyear' => $row['schoolyear'],
                            'quarter' => $row['quarter']
    );
}
try
{
    $sql = 'SELECT *, subject_code, subject_title FROM table_quarterlyassessment
    INNER JOIN table_subject ON table_subject.id = table_quarterlyassessment.subjectid
    WHERE teacherid = :teacherid AND subjectid = :subjectid AND schoolyear = :schoolyear';
    $s = $pdo->prepare($sql);
    $s->bindValue(':teacherid', $_SESSION['teacherid']);
    $s->bindValue(':subjectid', $_SESSION['subjectid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();

}
catch(PDOException $e)
{
    echo '<script>alert("Error Fetching Written Works Data");</script>';
}
foreach($s as $row)
{
    $quarterlyassessments[] = array(
                            'subject_code' => $row['subject_code'],
                            'subject_title' => $row['subject_title'],
                            'iq1' => $row['iq1'],
                            'ps' => $row['ps'],
                            'ws' => $row['ws'],
                            'schoolyear' => $row['schoolyear'],
                            'quarter' => $row['quarter']
    );
}

include 'Grade.html.php';