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





// DATA RETRIEVING
include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
try
{
    $assignSubject = $pdo->query('SELECT subject_code, subject_title, teacher_firstname, teacher_middlename, teacher_lastname, schoolyear FROM table_teacher_subject
                                    INNER JOIN table_subject ON table_teacher_subject.subjectid = table_subject.id
                                    INNER JOIN table_teacher ON table_teacher_subject.teacherid = table_teacher.id
                                    WHERE subject_status = "Active" AND teacher_status = "Active"');
    
}
catch (PDOException $e)
{
    echo '<script>alert("Error Fetching Teacher Subject data at Assign Subject");</script>';
}

foreach($assignSubject as $row)
{
    $assignSubjects[] = array(
                                'subject_code' => $row['subject_code'],
                                'subject_title' => $row['subject_title'],
                                'teacher_firstname' => $row['teacher_firstname'],
                                'teacher_middlename' => $row['teacher_middlename'],
                                'teacher_lastname' => $row['teacher_lastname'],
                                'schoolyear' => $row['schoolyear']);
}


try
{
    $assignTeacher = $pdo->query('SELECT section_year, section_name, teacher_firstname, teacher_middlename, teacher_lastname, schoolyear FROM table_teacher_section
                                    INNER JOIN table_section ON table_section.id = table_teacher_section.sectionid
                                    INNER JOIN table_teacher ON table_teacher.id = table_teacher_section.teacherid
                                    WHERE section_status = "Active" AND teacher_status = "Active"');

}
catch (PDOException $e)
{
    echo '<script>alert("Error Fetching Teacher Section data at Assign Teacher");</script>';
}
foreach($assignTeacher as $row)
{
    $assignTeachers[] = array(
                                'section_year' => $row['section_year'],
                                'section_name' => $row['section_name'],
                                'teacher_firstname' => $row['teacher_firstname'],
                                'teacher_middlename' => $row['teacher_middlename'],
                                'teacher_lastname' => $row['teacher_lastname'],
                                'schoolyear' => $row['schoolyear']
    );
}

try
{
    $assignStudent = $pdo->query('SELECT section_year, section_name, student_firstname, student_middlename, student_lastname, schoolyear FROM table_student_section
                                    INNER JOIN table_section ON table_section.id = table_student_section.sectionid
                                    INNER JOIN table_student ON table_student.id = table_student_section.studentid
                                    WHERE student_status = "ACTIVE" AND section_status = "ACTIVE"');
}
catch (PDOException $e)
{
    echo '<script>alert("Error Fetching Teacher Section data at Assign Teacher");</script>';
}
foreach($assignStudent as $row)
{
    $assignStudents[] = array(
                                'section_year' => $row['section_year'],
                                'section_name' => $row['section_name'],
                                'student_firstname' => $row['student_firstname'],
                                'student_middlename' => $row['student_middlename'],
                                'student_lastname' => $row['student_lastname'],
                                'schoolyear' => $row['schoolyear']
    );
}

include 'assign.html.php';