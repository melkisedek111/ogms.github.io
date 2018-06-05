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


// RETRIEIVIN DATA FROM TABLE_TEACHER
try
{
    $teacher_detail = $pdo->query('SELECT   id,
                                            teacher_number,
                                            teacher_firstname,
                                            teacher_lastname,
                                            teacher_image FROM
                                            table_teacher WHERE
                                            teacher_status = "Active"');
}
catch (PDOException $e)
{
    echo '<script>
            alert("Error Retrieving data from Table Teacher");
          </script>';
    include 'user.html.php';
    exit();
}
foreach ($teacher_detail as $row)
{
    $teacher_details[] = array(
                                'id' => $row['id'],
                                'teacher_number' => $row['teacher_number'],
                                'teacher_firstname' => $row['teacher_firstname'],
                                'teacher_lastname' => $row['teacher_lastname'],
                                'teacher_image' => $row['teacher_image']
                            );
}




//RETRIEVING DATA FROM TABLE_STUDENT
 try
{
    $student_detail = $pdo->query('SELECT 
                            id, 
                            student_firstname,
                            student_lastname,
                            student_number,
                            student_image FROM 
                            table_student WHERE 
                            student_status="ACTIVE"');
}
catch (PDOException $e)
{
    echo '<script>
            alert("Error Retrieving data from TABLE_ADMIN");
          </script>';
    include 'user.html.php';
    exit();
}
foreach ($student_detail as $row)
{
    $student_details[] = array(
                            'id' => $row['id'], 
                            'student_firstname' => $row['student_firstname'], 
                            'student_lastname' => $row['student_lastname'], 
                            'student_number' => $row['student_number'],  
                            'student_image' => $row['student_image']);
}


//RETRIEVING DATA FROM TABLE_SUBJECT

try
{
    $subject_detail = $pdo->query('SELECT   id,
                                    subject_code,
                                    subject_title,
                                    subject_description FROM
                                    table_subject WHERE
                                    subject_status = "Active"');
}
catch (PDOException $e)
{
    echo '<script>alert("Erro fetching subject data");</script>';
}

foreach($subject_detail as $row)
{
    $subject_details[] = array(
                                'id' => $row['id'],
                                'subject_code' => $row['subject_code'],
                                'subject_title' => $row['subject_title'],
                                'subject_description' => $row['subject_description']);
}

//RETRIEVING DATA FROM TABLE_SECTION
try
{
    $section_detail = $pdo->query('SELECT   id,
                                    section_year,
                                    section_name FROM
                                    table_section WHERE
                                    section_status = "Active"');
}
catch (PDOException $e)
{
    echo '<script>alert("Erro fetching Section data");</script>';
}

foreach($section_detail as $row)
{
    $section_details[] = array(
                                'id' => $row['id'],
                                'section_year' => $row['section_year'],
                                'section_name' => $row['section_name']
                                );
}


include 'dashboard.html.php';