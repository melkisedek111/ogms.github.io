<?php
include $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/magicquotes.inc.php';

include $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/classes/access.php';
if(!user1())
{
    $headerColor = 'info';
    $title = 'STUDENT LOGIN';
    $bg = 'studentbg';
    include '../login/index.php';
    exit();
}

if(!level1('Student'))
{
    $headerColor = 'info';
    $title = 'STUDENT LOGIN';
    $bg = 'studentbg';
    include '../login/index.php';
    exit();
}

if(isset($_GET['firstQuarterGrade']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT finalgrade, initialgrade, 
        ptps, ptq1, ptq2, ptq3, ptq4, ptq5, ptq6, ptq7, ptq8, ptq9, ptq10, ptqtotal, ptws, 
        qa1, qaps, qaws, 
        qps, qs1, qs2, qs3, qs4, qs5, qs6, qs7, qs8, qs9, qs10, qtotal, qws,
        table_writtenworks.iq1 as wwiq1, table_writtenworks.iq2 as wwiq2, table_writtenworks.iq3 as wwiq3, table_writtenworks.iq4 as wwiq4, table_writtenworks.iq5 as wwiq5, table_writtenworks.iq6 as wwiq6, table_writtenworks.iq7 as wwiq7, table_writtenworks.iq8 as wwiq8, table_writtenworks.iq9 as wwiq9, table_writtenworks.iq10 as wwiq10, table_writtenworks.totalitem as wwtotal,
        table_performancetasks.iq1 as ptiq1, table_performancetasks.iq2 as ptiq2, table_performancetasks.iq3 as ptiq3, table_performancetasks.iq4 as ptiq4, table_performancetasks.iq5 as ptiq5, table_performancetasks.iq6 as ptiq6, table_performancetasks.iq7 as ptiq7, table_performancetasks.iq8 as ptiq8, table_performancetasks.iq9 as ptiq9, table_performancetasks.iq10 as ptiq10, table_performancetasks.totalitem as pttotalitem,
        table_student_finalgrade.quarter as quarter, table_student_finalgrade.schoolyear as schoolyear, student_firstname, student_middlename, student_lastname, subject_code, subject_title, table_subject.id as subjectid,
        table_quarterlyassessment.iq1 as qaitem
        FROM table_student_finalgrade 
        
        INNER JOIN table_student_writtenworks ON 
        table_student_writtenworks.studentid = table_student_finalgrade.studentid AND 
        
        table_student_writtenworks.subjectid = table_student_finalgrade.subjectid AND 
        table_student_writtenworks.quarter = table_student_finalgrade.quarter AND 
        table_student_writtenworks.schoolyear = table_student_finalgrade.schoolyear
        
        INNER JOIN table_student_performancetasks ON 
        table_student_performancetasks.studentid = table_student_finalgrade.studentid AND 
       
        table_student_performancetasks.subjectid = table_student_finalgrade.subjectid AND 
        table_student_performancetasks.quarter = table_student_finalgrade.quarter AND 
        table_student_performancetasks.schoolyear = table_student_finalgrade.schoolyear
        
        INNER JOIN table_student_quarterlyassessment ON 
        table_student_quarterlyassessment.studentid = table_student_finalgrade.studentid AND 
         
        table_student_quarterlyassessment.subjectid = table_student_finalgrade.subjectid AND 
        table_student_quarterlyassessment.quarter = table_student_finalgrade.quarter AND 
        table_student_quarterlyassessment.schoolyear = table_student_finalgrade.schoolyear
        
        INNER JOIN table_student ON table_student.id = table_student_finalgrade.studentid
        INNER JOIN table_student_section ON table_student_section.studentid = table_student_finalgrade.studentid
        INNER JOIN table_subject ON 
        table_subject.id = table_student_writtenworks.subjectid AND 
        table_subject.id = table_student_performancetasks.subjectid AND
        table_subject.id = table_student_quarterlyassessment.subjectid AND 
        table_subject.id = table_student_finalgrade.subjectid

        INNER JOIN table_writtenworks ON
        table_writtenworks.teacherid = table_student_writtenworks.teacherid AND
        table_writtenworks.subjectid = table_student_writtenworks.subjectid AND
        table_writtenworks.schoolyear = table_student_writtenworks.schoolyear

        INNER JOIN table_performancetasks ON
        table_performancetasks.teacherid = table_student_performancetasks.teacherid AND
        table_performancetasks.subjectid = table_student_performancetasks.subjectid AND
        table_performancetasks.schoolyear = table_student_performancetasks.schoolyear

        INNER JOIN table_quarterlyassessment ON
        table_quarterlyassessment.teacherid = table_student_quarterlyassessment.teacherid AND
        table_quarterlyassessment.subjectid = table_student_quarterlyassessment.subjectid AND
        table_quarterlyassessment.schoolyear = table_student_quarterlyassessment.schoolyear

        WHERE 
        
        table_student_finalgrade.studentid = :studentid AND table_student_finalgrade.schoolyear = :schoolyear AND 
        table_student_finalgrade.quarter = :quarter AND table_student_finalgrade.teacherid = :teacherid AND
        table_student_finalgrade.subjectid = :subjectid AND 

        
        table_student_writtenworks.studentid = :studentid AND table_student_writtenworks.schoolyear = :schoolyear AND 
        table_student_writtenworks.quarter = :quarter AND table_student_writtenworks.teacherid = :teacherid AND
        table_student_writtenworks.subjectid = :subjectid AND

         
        table_student_performancetasks.studentid = :studentid AND table_student_performancetasks.schoolyear = :schoolyear AND 
        table_student_performancetasks.quarter = :quarter AND table_student_performancetasks.teacherid = :teacherid AND
        table_student_performancetasks.subjectid = :subjectid AND

        table_writtenworks.schoolyear = :schoolyear AND table_writtenworks.quarter = :quarter AND
        
        table_performancetasks.schoolyear = :schoolyear AND table_performancetasks.quarter = :quarter AND

        table_quarterlyassessment.schoolyear = :schoolyear AND table_quarterlyassessment.quarter = :quarter AND

        table_student_quarterlyassessment.studentid = :studentid AND table_student_quarterlyassessment.schoolyear = :schoolyear AND
        table_student_quarterlyassessment.quarter = :quarter AND table_student_quarterlyassessment.teacherid = :teacherid AND
        table_student_quarterlyassessment.subjectid = :subjectid';

        $s = $pdo->prepare($sql);
        $s->bindValue(':studentid', $_POST['studentid']);
        $s->bindValue(':quarter', $_POST['quarter']);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':subjectid', $_POST['subjectid']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->execute();

    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Fetching First Quarter Grade"'. $e->getMessage().');</script>';
    }
    foreach($s as $row)
    {
        $QuarterGrades[] = array(
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
                        'subject_code' => $row['subject_code'],
                        'subject_title' => $row['subject_title'],
                        'subjectid' => $row['subjectid'],
                        'student_firstname' => $row['student_firstname'],
                        'student_middlename' => $row['student_middlename'],
                        'student_lastname' => $row['student_lastname'],
                        'iq1' => $row['wwiq1'],
                        'iq2' => $row['wwiq2'],
                        'iq3' => $row['wwiq3'],
                        'iq4' => $row['wwiq4'],
                        'iq5' => $row['wwiq5'],
                        'iq6' => $row['wwiq6'],
                        'iq7' => $row['wwiq7'],
                        'iq8' => $row['wwiq8'],
                        'iq9' => $row['wwiq9'],
                        'iq10' => $row['wwiq10'],
                        'totalitem' => $row['wwtotal'],
                        'ptiq1' => $row['ptiq1'],
                        'ptiq2' => $row['ptiq2'],
                        'ptiq3' => $row['ptiq3'],
                        'ptiq4' => $row['ptiq4'],
                        'ptiq5' => $row['ptiq5'],
                        'ptiq6' => $row['ptiq6'],
                        'ptiq7' => $row['ptiq7'],
                        'ptiq8' => $row['ptiq8'],
                        'ptiq9' => $row['ptiq9'],
                        'ptiq10' => $row['ptiq10'],
                        'pttotalitem' => $row['pttotalitem'],
                        'qaitem' => $row['qaitem']

        );
    }
    include 'quartergrades.html.php';
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
        table_writtenworks.iq1 as wwiq1, table_writtenworks.iq2 as wwiq2, table_writtenworks.iq3 as wwiq3, table_writtenworks.iq4 as wwiq4, table_writtenworks.iq5 as wwiq5, table_writtenworks.iq6 as wwiq6, table_writtenworks.iq7 as wwiq7, table_writtenworks.iq8 as wwiq8, table_writtenworks.iq9 as wwiq9, table_writtenworks.iq10 as wwiq10, table_writtenworks.totalitem as wwtotal,
        table_performancetasks.iq1 as ptiq1, table_performancetasks.iq2 as ptiq2, table_performancetasks.iq3 as ptiq3, table_performancetasks.iq4 as ptiq4, table_performancetasks.iq5 as ptiq5, table_performancetasks.iq6 as ptiq6, table_performancetasks.iq7 as ptiq7, table_performancetasks.iq8 as ptiq8, table_performancetasks.iq9 as ptiq9, table_performancetasks.iq10 as ptiq10, table_performancetasks.totalitem as pttotalitem,
        table_student_finalgrade.quarter as quarter, table_student_finalgrade.schoolyear as schoolyear, student_firstname, student_middlename, student_lastname, subject_code, subject_title, table_subject.id as subjectid,
        table_quarterlyassessment.iq1 as qaitem
        FROM table_student_finalgrade 
        
        INNER JOIN table_student_writtenworks ON 
        table_student_writtenworks.studentid = table_student_finalgrade.studentid AND 
        
        table_student_writtenworks.subjectid = table_student_finalgrade.subjectid AND 
        table_student_writtenworks.quarter = table_student_finalgrade.quarter AND 
        table_student_writtenworks.schoolyear = table_student_finalgrade.schoolyear
        
        INNER JOIN table_student_performancetasks ON 
        table_student_performancetasks.studentid = table_student_finalgrade.studentid AND 
       
        table_student_performancetasks.subjectid = table_student_finalgrade.subjectid AND 
        table_student_performancetasks.quarter = table_student_finalgrade.quarter AND 
        table_student_performancetasks.schoolyear = table_student_finalgrade.schoolyear
        
        INNER JOIN table_student_quarterlyassessment ON 
        table_student_quarterlyassessment.studentid = table_student_finalgrade.studentid AND 
         
        table_student_quarterlyassessment.subjectid = table_student_finalgrade.subjectid AND 
        table_student_quarterlyassessment.quarter = table_student_finalgrade.quarter AND 
        table_student_quarterlyassessment.schoolyear = table_student_finalgrade.schoolyear
        
        INNER JOIN table_student ON table_student.id = table_student_finalgrade.studentid
        INNER JOIN table_student_section ON table_student_section.studentid = table_student_finalgrade.studentid
        INNER JOIN table_subject ON 
        table_subject.id = table_student_writtenworks.subjectid AND 
        table_subject.id = table_student_performancetasks.subjectid AND
        table_subject.id = table_student_quarterlyassessment.subjectid AND 
        table_subject.id = table_student_finalgrade.subjectid

        INNER JOIN table_writtenworks ON
        table_writtenworks.teacherid = table_student_writtenworks.teacherid AND
        table_writtenworks.subjectid = table_student_writtenworks.subjectid AND
        table_writtenworks.schoolyear = table_student_writtenworks.schoolyear

        INNER JOIN table_performancetasks ON
        table_performancetasks.teacherid = table_student_performancetasks.teacherid AND
        table_performancetasks.subjectid = table_student_performancetasks.subjectid AND
        table_performancetasks.schoolyear = table_student_performancetasks.schoolyear

        INNER JOIN table_quarterlyassessment ON
        table_quarterlyassessment.teacherid = table_student_quarterlyassessment.teacherid AND
        table_quarterlyassessment.subjectid = table_student_quarterlyassessment.subjectid AND
        table_quarterlyassessment.schoolyear = table_student_quarterlyassessment.schoolyear

        WHERE 
        
        table_student_finalgrade.studentid = :studentid AND table_student_finalgrade.schoolyear = :schoolyear AND 
        table_student_finalgrade.quarter = :quarter AND table_student_finalgrade.teacherid = :teacherid AND
        table_student_finalgrade.subjectid = :subjectid AND 

        
        table_student_writtenworks.studentid = :studentid AND table_student_writtenworks.schoolyear = :schoolyear AND 
        table_student_writtenworks.quarter = :quarter AND table_student_writtenworks.teacherid = :teacherid AND
        table_student_writtenworks.subjectid = :subjectid AND

         
        table_student_performancetasks.studentid = :studentid AND table_student_performancetasks.schoolyear = :schoolyear AND 
        table_student_performancetasks.quarter = :quarter AND table_student_performancetasks.teacherid = :teacherid AND
        table_student_performancetasks.subjectid = :subjectid AND

        table_writtenworks.schoolyear = :schoolyear AND table_writtenworks.quarter = :quarter AND
        
        table_performancetasks.schoolyear = :schoolyear AND table_performancetasks.quarter = :quarter AND

        table_quarterlyassessment.schoolyear = :schoolyear AND table_quarterlyassessment.quarter = :quarter AND

        table_student_quarterlyassessment.studentid = :studentid AND table_student_quarterlyassessment.schoolyear = :schoolyear AND
        table_student_quarterlyassessment.quarter = :quarter AND table_student_quarterlyassessment.teacherid = :teacherid AND
        table_student_quarterlyassessment.subjectid = :subjectid';

        $s = $pdo->prepare($sql);
        $s->bindValue(':studentid', $_POST['studentid']);
        $s->bindValue(':quarter', $_POST['quarter']);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':subjectid', $_POST['subjectid']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->execute();

    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Fetching First Quarter Grade"'. $e->getMessage().');</script>';
    }
    foreach($s as $row)
    {
        $QuarterGrades[] = array(
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
                        'subject_code' => $row['subject_code'],
                        'subject_title' => $row['subject_title'],
                        'subjectid' => $row['subjectid'],
                        'student_firstname' => $row['student_firstname'],
                        'student_middlename' => $row['student_middlename'],
                        'student_lastname' => $row['student_lastname'],
                        'iq1' => $row['wwiq1'],
                        'iq2' => $row['wwiq2'],
                        'iq3' => $row['wwiq3'],
                        'iq4' => $row['wwiq4'],
                        'iq5' => $row['wwiq5'],
                        'iq6' => $row['wwiq6'],
                        'iq7' => $row['wwiq7'],
                        'iq8' => $row['wwiq8'],
                        'iq9' => $row['wwiq9'],
                        'iq10' => $row['wwiq10'],
                        'totalitem' => $row['wwtotal'],
                        'ptiq1' => $row['ptiq1'],
                        'ptiq2' => $row['ptiq2'],
                        'ptiq3' => $row['ptiq3'],
                        'ptiq4' => $row['ptiq4'],
                        'ptiq5' => $row['ptiq5'],
                        'ptiq6' => $row['ptiq6'],
                        'ptiq7' => $row['ptiq7'],
                        'ptiq8' => $row['ptiq8'],
                        'ptiq9' => $row['ptiq9'],
                        'ptiq10' => $row['ptiq10'],
                        'pttotalitem' => $row['pttotalitem'],
                        'qaitem' => $row['qaitem']

        );
    }
    include 'quartergrades.html.php';
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
        table_writtenworks.iq1 as wwiq1, table_writtenworks.iq2 as wwiq2, table_writtenworks.iq3 as wwiq3, table_writtenworks.iq4 as wwiq4, table_writtenworks.iq5 as wwiq5, table_writtenworks.iq6 as wwiq6, table_writtenworks.iq7 as wwiq7, table_writtenworks.iq8 as wwiq8, table_writtenworks.iq9 as wwiq9, table_writtenworks.iq10 as wwiq10, table_writtenworks.totalitem as wwtotal,
        table_performancetasks.iq1 as ptiq1, table_performancetasks.iq2 as ptiq2, table_performancetasks.iq3 as ptiq3, table_performancetasks.iq4 as ptiq4, table_performancetasks.iq5 as ptiq5, table_performancetasks.iq6 as ptiq6, table_performancetasks.iq7 as ptiq7, table_performancetasks.iq8 as ptiq8, table_performancetasks.iq9 as ptiq9, table_performancetasks.iq10 as ptiq10, table_performancetasks.totalitem as pttotalitem,
        table_student_finalgrade.quarter as quarter, table_student_finalgrade.schoolyear as schoolyear, student_firstname, student_middlename, student_lastname, subject_code, subject_title, table_subject.id as subjectid,
        table_quarterlyassessment.iq1 as qaitem
        FROM table_student_finalgrade 
        
        INNER JOIN table_student_writtenworks ON 
        table_student_writtenworks.studentid = table_student_finalgrade.studentid AND 
        
        table_student_writtenworks.subjectid = table_student_finalgrade.subjectid AND 
        table_student_writtenworks.quarter = table_student_finalgrade.quarter AND 
        table_student_writtenworks.schoolyear = table_student_finalgrade.schoolyear
        
        INNER JOIN table_student_performancetasks ON 
        table_student_performancetasks.studentid = table_student_finalgrade.studentid AND 
       
        table_student_performancetasks.subjectid = table_student_finalgrade.subjectid AND 
        table_student_performancetasks.quarter = table_student_finalgrade.quarter AND 
        table_student_performancetasks.schoolyear = table_student_finalgrade.schoolyear
        
        INNER JOIN table_student_quarterlyassessment ON 
        table_student_quarterlyassessment.studentid = table_student_finalgrade.studentid AND 
         
        table_student_quarterlyassessment.subjectid = table_student_finalgrade.subjectid AND 
        table_student_quarterlyassessment.quarter = table_student_finalgrade.quarter AND 
        table_student_quarterlyassessment.schoolyear = table_student_finalgrade.schoolyear
        
        INNER JOIN table_student ON table_student.id = table_student_finalgrade.studentid
        INNER JOIN table_student_section ON table_student_section.studentid = table_student_finalgrade.studentid
        INNER JOIN table_subject ON 
        table_subject.id = table_student_writtenworks.subjectid AND 
        table_subject.id = table_student_performancetasks.subjectid AND
        table_subject.id = table_student_quarterlyassessment.subjectid AND 
        table_subject.id = table_student_finalgrade.subjectid

        INNER JOIN table_writtenworks ON
        table_writtenworks.teacherid = table_student_writtenworks.teacherid AND
        table_writtenworks.subjectid = table_student_writtenworks.subjectid AND
        table_writtenworks.schoolyear = table_student_writtenworks.schoolyear

        INNER JOIN table_performancetasks ON
        table_performancetasks.teacherid = table_student_performancetasks.teacherid AND
        table_performancetasks.subjectid = table_student_performancetasks.subjectid AND
        table_performancetasks.schoolyear = table_student_performancetasks.schoolyear

        INNER JOIN table_quarterlyassessment ON
        table_quarterlyassessment.teacherid = table_student_quarterlyassessment.teacherid AND
        table_quarterlyassessment.subjectid = table_student_quarterlyassessment.subjectid AND
        table_quarterlyassessment.schoolyear = table_student_quarterlyassessment.schoolyear

        WHERE 
        
        table_student_finalgrade.studentid = :studentid AND table_student_finalgrade.schoolyear = :schoolyear AND 
        table_student_finalgrade.quarter = :quarter AND table_student_finalgrade.teacherid = :teacherid AND
        table_student_finalgrade.subjectid = :subjectid AND 

        
        table_student_writtenworks.studentid = :studentid AND table_student_writtenworks.schoolyear = :schoolyear AND 
        table_student_writtenworks.quarter = :quarter AND table_student_writtenworks.teacherid = :teacherid AND
        table_student_writtenworks.subjectid = :subjectid AND

         
        table_student_performancetasks.studentid = :studentid AND table_student_performancetasks.schoolyear = :schoolyear AND 
        table_student_performancetasks.quarter = :quarter AND table_student_performancetasks.teacherid = :teacherid AND
        table_student_performancetasks.subjectid = :subjectid AND

        table_writtenworks.schoolyear = :schoolyear AND table_writtenworks.quarter = :quarter AND
        
        table_performancetasks.schoolyear = :schoolyear AND table_performancetasks.quarter = :quarter AND

        table_quarterlyassessment.schoolyear = :schoolyear AND table_quarterlyassessment.quarter = :quarter AND

        table_student_quarterlyassessment.studentid = :studentid AND table_student_quarterlyassessment.schoolyear = :schoolyear AND
        table_student_quarterlyassessment.quarter = :quarter AND table_student_quarterlyassessment.teacherid = :teacherid AND
        table_student_quarterlyassessment.subjectid = :subjectid';

        $s = $pdo->prepare($sql);
        $s->bindValue(':studentid', $_POST['studentid']);
        $s->bindValue(':quarter', $_POST['quarter']);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':subjectid', $_POST['subjectid']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->execute();

    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Fetching First Quarter Grade"'. $e->getMessage().');</script>';
    }
    foreach($s as $row)
    {
        $QuarterGrades[] = array(
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
                        'subject_code' => $row['subject_code'],
                        'subject_title' => $row['subject_title'],
                        'subjectid' => $row['subjectid'],
                        'student_firstname' => $row['student_firstname'],
                        'student_middlename' => $row['student_middlename'],
                        'student_lastname' => $row['student_lastname'],
                        'iq1' => $row['wwiq1'],
                        'iq2' => $row['wwiq2'],
                        'iq3' => $row['wwiq3'],
                        'iq4' => $row['wwiq4'],
                        'iq5' => $row['wwiq5'],
                        'iq6' => $row['wwiq6'],
                        'iq7' => $row['wwiq7'],
                        'iq8' => $row['wwiq8'],
                        'iq9' => $row['wwiq9'],
                        'iq10' => $row['wwiq10'],
                        'totalitem' => $row['wwtotal'],
                        'ptiq1' => $row['ptiq1'],
                        'ptiq2' => $row['ptiq2'],
                        'ptiq3' => $row['ptiq3'],
                        'ptiq4' => $row['ptiq4'],
                        'ptiq5' => $row['ptiq5'],
                        'ptiq6' => $row['ptiq6'],
                        'ptiq7' => $row['ptiq7'],
                        'ptiq8' => $row['ptiq8'],
                        'ptiq9' => $row['ptiq9'],
                        'ptiq10' => $row['ptiq10'],
                        'pttotalitem' => $row['pttotalitem'],
                        'qaitem' => $row['qaitem']

        );
    }
    include 'quartergrades.html.php';
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
        table_writtenworks.iq1 as wwiq1, table_writtenworks.iq2 as wwiq2, table_writtenworks.iq3 as wwiq3, table_writtenworks.iq4 as wwiq4, table_writtenworks.iq5 as wwiq5, table_writtenworks.iq6 as wwiq6, table_writtenworks.iq7 as wwiq7, table_writtenworks.iq8 as wwiq8, table_writtenworks.iq9 as wwiq9, table_writtenworks.iq10 as wwiq10, table_writtenworks.totalitem as wwtotal,
        table_performancetasks.iq1 as ptiq1, table_performancetasks.iq2 as ptiq2, table_performancetasks.iq3 as ptiq3, table_performancetasks.iq4 as ptiq4, table_performancetasks.iq5 as ptiq5, table_performancetasks.iq6 as ptiq6, table_performancetasks.iq7 as ptiq7, table_performancetasks.iq8 as ptiq8, table_performancetasks.iq9 as ptiq9, table_performancetasks.iq10 as ptiq10, table_performancetasks.totalitem as pttotalitem,
        table_student_finalgrade.quarter as quarter, table_student_finalgrade.schoolyear as schoolyear, student_firstname, student_middlename, student_lastname, subject_code, subject_title, table_subject.id as subjectid,
        table_quarterlyassessment.iq1 as qaitem
        FROM table_student_finalgrade 
        
        INNER JOIN table_student_writtenworks ON 
        table_student_writtenworks.studentid = table_student_finalgrade.studentid AND 
        
        table_student_writtenworks.subjectid = table_student_finalgrade.subjectid AND 
        table_student_writtenworks.quarter = table_student_finalgrade.quarter AND 
        table_student_writtenworks.schoolyear = table_student_finalgrade.schoolyear
        
        INNER JOIN table_student_performancetasks ON 
        table_student_performancetasks.studentid = table_student_finalgrade.studentid AND 
       
        table_student_performancetasks.subjectid = table_student_finalgrade.subjectid AND 
        table_student_performancetasks.quarter = table_student_finalgrade.quarter AND 
        table_student_performancetasks.schoolyear = table_student_finalgrade.schoolyear
        
        INNER JOIN table_student_quarterlyassessment ON 
        table_student_quarterlyassessment.studentid = table_student_finalgrade.studentid AND 
         
        table_student_quarterlyassessment.subjectid = table_student_finalgrade.subjectid AND 
        table_student_quarterlyassessment.quarter = table_student_finalgrade.quarter AND 
        table_student_quarterlyassessment.schoolyear = table_student_finalgrade.schoolyear
        
        INNER JOIN table_student ON table_student.id = table_student_finalgrade.studentid
        INNER JOIN table_student_section ON table_student_section.studentid = table_student_finalgrade.studentid
        INNER JOIN table_subject ON 
        table_subject.id = table_student_writtenworks.subjectid AND 
        table_subject.id = table_student_performancetasks.subjectid AND
        table_subject.id = table_student_quarterlyassessment.subjectid AND 
        table_subject.id = table_student_finalgrade.subjectid

        INNER JOIN table_writtenworks ON
        table_writtenworks.teacherid = table_student_writtenworks.teacherid AND
        table_writtenworks.subjectid = table_student_writtenworks.subjectid AND
        table_writtenworks.schoolyear = table_student_writtenworks.schoolyear

        INNER JOIN table_performancetasks ON
        table_performancetasks.teacherid = table_student_performancetasks.teacherid AND
        table_performancetasks.subjectid = table_student_performancetasks.subjectid AND
        table_performancetasks.schoolyear = table_student_performancetasks.schoolyear

        INNER JOIN table_quarterlyassessment ON
        table_quarterlyassessment.teacherid = table_student_quarterlyassessment.teacherid AND
        table_quarterlyassessment.subjectid = table_student_quarterlyassessment.subjectid AND
        table_quarterlyassessment.schoolyear = table_student_quarterlyassessment.schoolyear

        WHERE 
        
        table_student_finalgrade.studentid = :studentid AND table_student_finalgrade.schoolyear = :schoolyear AND 
        table_student_finalgrade.quarter = :quarter AND table_student_finalgrade.teacherid = :teacherid AND
        table_student_finalgrade.subjectid = :subjectid AND 

        
        table_student_writtenworks.studentid = :studentid AND table_student_writtenworks.schoolyear = :schoolyear AND 
        table_student_writtenworks.quarter = :quarter AND table_student_writtenworks.teacherid = :teacherid AND
        table_student_writtenworks.subjectid = :subjectid AND

         
        table_student_performancetasks.studentid = :studentid AND table_student_performancetasks.schoolyear = :schoolyear AND 
        table_student_performancetasks.quarter = :quarter AND table_student_performancetasks.teacherid = :teacherid AND
        table_student_performancetasks.subjectid = :subjectid AND

        table_writtenworks.schoolyear = :schoolyear AND table_writtenworks.quarter = :quarter AND
        
        table_performancetasks.schoolyear = :schoolyear AND table_performancetasks.quarter = :quarter AND

        table_quarterlyassessment.schoolyear = :schoolyear AND table_quarterlyassessment.quarter = :quarter AND

        table_student_quarterlyassessment.studentid = :studentid AND table_student_quarterlyassessment.schoolyear = :schoolyear AND
        table_student_quarterlyassessment.quarter = :quarter AND table_student_quarterlyassessment.teacherid = :teacherid AND
        table_student_quarterlyassessment.subjectid = :subjectid';

        $s = $pdo->prepare($sql);
        $s->bindValue(':studentid', $_POST['studentid']);
        $s->bindValue(':quarter', $_POST['quarter']);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':subjectid', $_POST['subjectid']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->execute();

    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Fetching First Quarter Grade"'. $e->getMessage().');</script>';
    }
    foreach($s as $row)
    {
        $QuarterGrades[] = array(
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
                        'subject_code' => $row['subject_code'],
                        'subject_title' => $row['subject_title'],
                        'subjectid' => $row['subjectid'],
                        'student_firstname' => $row['student_firstname'],
                        'student_middlename' => $row['student_middlename'],
                        'student_lastname' => $row['student_lastname'],
                        'iq1' => $row['wwiq1'],
                        'iq2' => $row['wwiq2'],
                        'iq3' => $row['wwiq3'],
                        'iq4' => $row['wwiq4'],
                        'iq5' => $row['wwiq5'],
                        'iq6' => $row['wwiq6'],
                        'iq7' => $row['wwiq7'],
                        'iq8' => $row['wwiq8'],
                        'iq9' => $row['wwiq9'],
                        'iq10' => $row['wwiq10'],
                        'totalitem' => $row['wwtotal'],
                        'ptiq1' => $row['ptiq1'],
                        'ptiq2' => $row['ptiq2'],
                        'ptiq3' => $row['ptiq3'],
                        'ptiq4' => $row['ptiq4'],
                        'ptiq5' => $row['ptiq5'],
                        'ptiq6' => $row['ptiq6'],
                        'ptiq7' => $row['ptiq7'],
                        'ptiq8' => $row['ptiq8'],
                        'ptiq9' => $row['ptiq9'],
                        'ptiq10' => $row['ptiq10'],
                        'pttotalitem' => $row['pttotalitem'],
                        'qaitem' => $row['qaitem']

        );
    }
    include 'quartergrades.html.php';
    exit();
}


// FIRST QUARTER
include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
try
{
    $sql = 'SELECT *, teacher_firstname, teacher_middlename, teacher_lastname, subject_code, subject_title, table_subject.id as subjectid FROM table_student_finalgrade
    INNER JOIN table_teacher ON table_teacher.id = table_student_finalgrade.teacherid
    INNER JOIN table_subject ON table_subject.id = table_student_finalgrade.subjectid
    WHERE studentid = :studentid AND quarter = "First Quarter" AND schoolyear = :schoolyear';
    $s = $pdo->prepare($sql);
    $s->bindValue(':studentid', $_SESSION['studentid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();
}
catch(PDOException $e)
{
    echo '<script>alert("Error Fetching First Quarter Grade");</script>';
}
foreach($s as $row)
{
        $firstQuarters[] = array(
                    'finalgrade' => $row['finalgrade'],
                    'initialgrade' => $row['initialgrade'],
                    'quarter' => $row['quarter'],
                    'schoolyear' => $row['schoolyear'],
                    'studentid' => $row['studentid'],
                    'teacherid' => $row['teacherid'],
                    'teacher_firstname' => $row['teacher_firstname'],
                    'teacher_middlename' => $row['teacher_middlename'],
                    'teacher_lastname' => $row['teacher_lastname'],
                    'subject_code' => $row['subject_code'],
                    'subject_title' => $row['subject_title'],
                    'subjectid' => $row['subjectid']
        );
}

// SECOND QUARTER
try
{
    $sql = 'SELECT *, teacher_firstname, teacher_middlename, teacher_lastname, subject_code, subject_title FROM table_student_finalgrade
    INNER JOIN table_teacher ON table_teacher.id = table_student_finalgrade.teacherid
    INNER JOIN table_subject ON table_subject.id = table_student_finalgrade.subjectid
    WHERE studentid = :studentid AND quarter = "Second Quarter" AND schoolyear = :schoolyear';
    $s = $pdo->prepare($sql);
    $s->bindValue(':studentid', $_SESSION['studentid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();
}
catch(PDOException $e)
{
    echo '<script>alert("Error Fetching First Quarter Grade");</script>';
}
foreach($s as $row)
{
        $secondQuarters[] = array(
                    'finalgrade' => $row['finalgrade'],
                    'initialgrade' => $row['initialgrade'],
                    'quarter' => $row['quarter'],
                    'schoolyear' => $row['schoolyear'],
                    'studentid' => $row['studentid'],
                    'teacherid' => $row['teacherid'],
                    'teacher_firstname' => $row['teacher_firstname'],
                    'teacher_middlename' => $row['teacher_middlename'],
                    'teacher_lastname' => $row['teacher_lastname'],
                    'subject_code' => $row['subject_code'],
                    'subject_title' => $row['subject_title'],
                    'subjectid' => $row['subjectid']
        );
}

// THIRD QUARTER
try
{
    $sql = 'SELECT *, teacher_firstname, teacher_middlename, teacher_lastname, subject_code, subject_title FROM table_student_finalgrade
    INNER JOIN table_teacher ON table_teacher.id = table_student_finalgrade.teacherid
    INNER JOIN table_subject ON table_subject.id = table_student_finalgrade.subjectid
    WHERE studentid = :studentid AND quarter = "Third Quarter" AND schoolyear = :schoolyear';
    $s = $pdo->prepare($sql);
    $s->bindValue(':studentid', $_SESSION['studentid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();
}
catch(PDOException $e)
{
    echo '<script>alert("Error Fetching First Quarter Grade");</script>';
}
foreach($s as $row)
{
        $thirdQuarters[] = array(
                    'finalgrade' => $row['finalgrade'],
                    'initialgrade' => $row['initialgrade'],
                    'quarter' => $row['quarter'],
                    'schoolyear' => $row['schoolyear'],
                    'studentid' => $row['studentid'],
                    'teacherid' => $row['teacherid'],
                    'teacher_firstname' => $row['teacher_firstname'],
                    'teacher_middlename' => $row['teacher_middlename'],
                    'teacher_lastname' => $row['teacher_lastname'],
                    'subject_code' => $row['subject_code'],
                    'subject_title' => $row['subject_title'],
                    'subjectid' => $row['subjectid']
        );
}

// Fourth Quarter
try
{
    $sql = 'SELECT *, teacher_firstname, teacher_middlename, teacher_lastname, subject_code, subject_title FROM table_student_finalgrade
    INNER JOIN table_teacher ON table_teacher.id = table_student_finalgrade.teacherid
    INNER JOIN table_subject ON table_subject.id = table_student_finalgrade.subjectid
    WHERE studentid = :studentid AND quarter = "Fourth Quarter" AND schoolyear = :schoolyear';
    $s = $pdo->prepare($sql);
    $s->bindValue(':studentid', $_SESSION['studentid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();
}
catch(PDOException $e)
{
    echo '<script>alert("Error Fetching First Quarter Grade");</script>';
}
foreach($s as $row)
{
        $fourthQuarters[] = array(
                    'finalgrade' => $row['finalgrade'],
                    'initialgrade' => $row['initialgrade'],
                    'quarter' => $row['quarter'],
                    'schoolyear' => $row['schoolyear'],
                    'studentid' => $row['studentid'],
                    'teacherid' => $row['teacherid'],
                    'teacher_firstname' => $row['teacher_firstname'],
                    'teacher_middlename' => $row['teacher_middlename'],
                    'teacher_lastname' => $row['teacher_lastname'],
                    'subject_code' => $row['subject_code'],
                    'subject_title' => $row['subject_title'],
                    'subjectid' => $row['subjectid']
        );
}



try
{
    $sql = 'SELECT table_teacher_post.id as postid, post_title, post_category, post_message, datecreated, teacher_firstname, teacher_middlename, teacher_lastname FROM table_teacher_post
    INNER JOIN table_teacher ON table_teacher.id = table_teacher_post.teacherid
    INNER JOIN table_teacher_section ON table_teacher_section.teacherid = table_teacher_post.teacherid AND table_teacher_section.sectionid = table_teacher_post.sectionid
    INNER JOIN table_student_section ON table_student_section.sectionid = table_teacher_post.sectionid
    WHERE table_student_section.studentid = :studentid AND table_student_section.schoolyear = :schoolyear AND table_teacher_post.schoolyear = :schoolyear AND table_teacher_section.schoolyear = :schoolyear AND teacher_status = "Active"';
    $s = $pdo->prepare($sql);
    $s->bindValue(':studentid', $_SESSION['studentid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();
}
catch (PDOException $e)
{
    echo '<script>alert("Error Fetching Post");</script>';
}
foreach($s as $row)
{
        $posts[] = array(
            'postid' => $row['postid'],
            'post_title' => $row['post_title'],
            'post_category' => $row['post_category'],
            'post_message' => $row['post_message'],
            'datecreated' => $row['datecreated'],
            'teacher_firstname' => $row['teacher_firstname'],
            'teacher_middlename' => $row['teacher_middlename'],
            'teacher_lastname' => $row['teacher_lastname']
        );
}

try
{
    $sql = 'SELECT subjectgrade, subject_code FROM table_student_sujectgrade
    INNER JOIN table_subject ON table_subject.id = table_student_sujectgrade.subjectid
    WHERE studentid = :studentid AND schoolyear = :schoolyear AND subject_status = "Active"';
    $s = $pdo->prepare($sql);
    $s->bindValue(':studentid', $_SESSION['studentid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();
}
catch(PDOException $e)
{
    echo '<script>alert("Error Fetching Subject Grade");</script>';
}

foreach($s as $row)
{
    $subjectgrades[] = array(
        'subjectgrade' => $row['subjectgrade'],
        'subject_code' => $row['subject_code']
    );
}



include 'studentMain.html.php';