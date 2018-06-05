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



include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';

try
{
    $sql = 'SELECT table_teacher_post.id as postid, table_section.id as sectionid, section_name, section_year, post_title, post_category, post_message,datecreated FROM table_teacher_post INNER JOIN table_section ON table_section.id = table_teacher_post.sectionid INNER JOIN table_teacher ON table_teacher.id = table_teacher_post.teacherid WHERE schoolyear = :schoolyear AND teacherid = :teacherid';
    $s = $pdo->prepare($sql);
    $s->bindValue(':teacherid', $_SESSION['teacherid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();

}
catch(PDOException $e)
{
    echo '<script>alert("Error Fetching Teacher Post Section Data");</script>';
}
foreach($s as $row)
{
    $posts[] = array(
        'postid' => $row['postid'],
        'section_name' => $row['section_name'],
        'section_year' => $row['section_year'],
        'post_title' => $row['post_title'],
        'post_category' => $row['post_category'],
        'post_message' => $row['post_message'],
        'datecreated' => $row['datecreated'],
        'sectionid' => $row['sectionid']
    );
}

try
{
    $sql = 'SELECT student_firstname, student_middlename, student_lastname, finalgrade FROM table_student_finalgrade
    INNER JOIN table_student ON table_student.id = table_student_finalgrade.studentid
    WHERE teacherid = :teacherid AND schoolyear = :schoolyear AND student_status = "Active" AND quarter = "First Quarter"';
    $s = $pdo->prepare($sql);
    $s->bindValue(':teacherid', $_SESSION['teacherid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();
}
catch(PDOException $e)
{
    echo '<script>alert("Error Fetching First Quarter Data");</script>';
}

foreach($s as $row)
{
    $firstquarters[] = array(
                            'student_firstname' => $row['student_firstname'],
                            'student_middlename' => $row['student_middlename'],
                            'student_lastname' => $row['student_lastname'],
                            'finalgrade' => $row['finalgrade']
                        );
}

try
{
    $sql = 'SELECT student_firstname, student_middlename, student_lastname, finalgrade FROM table_student_finalgrade
    INNER JOIN table_student ON table_student.id = table_student_finalgrade.studentid
    WHERE teacherid = :teacherid AND schoolyear = :schoolyear AND student_status = "Active" AND quarter = "Second Quarter"';
    $s = $pdo->prepare($sql);
    $s->bindValue(':teacherid', $_SESSION['teacherid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();
}
catch(PDOException $e)
{
    echo '<script>alert("Error Fetching First Quarter Data");</script>';
}

foreach($s as $row)
{
    $secondquarters[] = array(
                            'student_firstname' => $row['student_firstname'],
                            'student_middlename' => $row['student_middlename'],
                            'student_lastname' => $row['student_lastname'],
                            'finalgrade' => $row['finalgrade']
                        );
}

try
{
    $sql = 'SELECT student_firstname, student_middlename, student_lastname, finalgrade FROM table_student_finalgrade
    INNER JOIN table_student ON table_student.id = table_student_finalgrade.studentid
    WHERE teacherid = :teacherid AND schoolyear = :schoolyear AND student_status = "Active" AND quarter = "Third Quarter"';
    $s = $pdo->prepare($sql);
    $s->bindValue(':teacherid', $_SESSION['teacherid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();
}
catch(PDOException $e)
{
    echo '<script>alert("Error Fetching First Quarter Data");</script>';
}

foreach($s as $row)
{
    $thirdquarters[] = array(
                            'student_firstname' => $row['student_firstname'],
                            'student_middlename' => $row['student_middlename'],
                            'student_lastname' => $row['student_lastname'],
                            'finalgrade' => $row['finalgrade']
                        );
}

try
{
    $sql = 'SELECT student_firstname, student_middlename, student_lastname, finalgrade FROM table_student_finalgrade
    INNER JOIN table_student ON table_student.id = table_student_finalgrade.studentid
    WHERE teacherid = :teacherid AND schoolyear = :schoolyear AND student_status = "Active" AND quarter = "Fourth Quarter"';
    $s = $pdo->prepare($sql);
    $s->bindValue(':teacherid', $_SESSION['teacherid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();
}
catch(PDOException $e)
{
    echo '<script>alert("Error Fetching First Quarter Data");</script>';
}

foreach($s as $row)
{
    $fourthquarters[] = array(
                            'student_firstname' => $row['student_firstname'],
                            'student_middlename' => $row['student_middlename'],
                            'student_lastname' => $row['student_lastname'],
                            'finalgrade' => $row['finalgrade']
                        );
}

include 'teacherMain.html.php';