<?php
include $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/magicquotes.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/classes/access.php';
if(!user2())
{
    $headerColor = 'warning';
    $title = 'ADMIN LOGIN';
    $bg = 'adminbg';
    include '../login/index.php';
    exit();
}




include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
try
{
    $results = $pdo->query('SELECT teacher_number, teacher_firstname, teacher_lastname, user_status FROM table_teacher
    INNER JOIN table_user_account ON table_user_account.userid = table_teacher.id
    WHERE teacher_status = "Active"');
}
catch (PDOException $e)
{   
    echo '<script>alert("Error fetching Teacher User");<script>';
}
foreach($results as $row)
{
    $userTeachers[] = array(
                            'teacher_number' => $row['teacher_number'],
                            'teacher_firstname' => $row['teacher_firstname'],
                            'teacher_lastname' => $row['teacher_lastname'],
                            'user_status' => $row['user_status']
    );
}

try
{
    $results = $pdo->query('SELECT student_number, student_firstname, student_lastname, user_status FROM table_student
    INNER JOIN table_user_account ON table_user_account.userid = table_student.id AND table_user_account.userLevel = table_student.student_type
    WHERE student_status = "Active"');
}
catch (PDOException $e)
{   
    echo '<script>alert("Error fetching Teacher User");<script>';
}
foreach($results as $row)
{
    $userStudents[] = array(
                            'student_number' => $row['student_number'],
                            'student_firstname' => $row['student_firstname'],
                            'student_lastname' => $row['student_lastname'],
                            'user_status' => $row['user_status']
    );
}

include 'accounts.html.php';