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

if(isset($_POST['viewStudent']) and $_POST['viewStudent'] == 'View')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT table_student.id as idStudent, student_firstname, student_middlename, student_lastname, student_number, student_address, student_contact, student_birthdate, student_sex, student_image, student_guardian_name, student_guardian_contact, student_guardian_address FROM table_student
        WHERE table_student.id = :studentid and student_status = "Active"';
        $s = $pdo->prepare($sql);
        $s->bindValue(':studentid', $_POST['studentid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Fetching Student Data View");</script>';
    }
    $row = $s->fetch();
    $studentid = $row['idStudent'];
    $studentFirstName = $row['student_firstname'];
    $studentMiddleName  = $row['student_middlename'];
    $studentLastName  = $row['student_lastname'];
    $studentNumber  = $row['student_number'];
    $studentAddress  = $row['student_address'];
    $studentContact  = $row['student_contact'];
    $studentBirthdate  = $row['student_birthdate'];
    $studentSex  = $row['student_sex'];
    $studentImage  = $row['student_image'];
    $studentGuardianName  = $row['student_guardian_name'];
    $studentGuardianContact  = $row['student_guardian_contact'];
    $studentGuardianAddress  = $row['student_guardian_address'];
    $sidebardcolor = 'blue';
    include 'view.html.php';
    exit();
}


if(isset($_POST['viewStudent']) and $_POST['viewStudent'] == 'View Students')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    $sectionyear = $_POST['sectionyear'];
    $sectionname = $_POST['sectionname'];
    try
    {
        $sql = 'SELECT table_student.id as idStudent, student_firstname, student_middlename, student_lastname, student_number FROM table_student
        INNER JOIN table_student_section ON table_student_section.studentid = table_student.id
        INNER JOIN table_teacher_section ON table_teacher_section.sectionid = table_student_section.sectionid
        WHERE table_teacher_section.teacherid = :teacherid AND table_student_section.sectionid = :sectionid AND table_student_section.schoolyear = :schoolyear AND table_teacher_section.schoolyear = :schoolyear AND student_status = "Active"';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_SESSION['teacherid']);
        $s->bindValue(':sectionid', $_POST['sectionid']);
        $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Fetching Student Data Per Section");</script>';
    }


    foreach($s as $row)
    {
        $studentDetails[] = array(
                                'idStudent' => $row['idStudent'],
                                'student_firstname' => $row['student_firstname'],
                                'student_middlename' => $row['student_middlename'],
                                'student_lastname' => $row['student_lastname'],
                                'student_number' => $row['student_number']
                                );
    }

    include 'studentSection.html.php';
    exit();

}





include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';

try
{
    $sql = 'SELECT table_section.id as idSection, section_year, section_name FROM table_section
    INNER JOIN table_teacher_section ON sectionid = table_section.id
    INNER JOIN table_teacher ON table_teacher.id = teacherid
    WHERE teacherid = :teacherid AND schoolyear = :schoolyear AND teacher_type = :teacher_type AND teacher_status = "Active"';
    $s = $pdo->prepare($sql);
    $s->bindValue(':teacherid', $_SESSION['teacherid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->bindValue(':teacher_type', $_SESSION['user_type']);
    $s->execute();

}
catch(PDOException $e)
{
    echo '<script>alert("Error Fetching data at Teacher Section Page");</script>';
}


foreach($s as $row)
{
    $teacherSection[] = array(
                                'idSection' => $row['idSection'],
                                'secion_year' => $row['section_year'],
                                'section_name' => $row['section_name']
                            );
    
                            
}


include 'pageSection.html.php';