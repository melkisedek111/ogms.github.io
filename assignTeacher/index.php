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
//********************************************************************************************************************* */
// SELECT TEACHER
if(isset($_POST['selectTeacher']) and $_POST['selectTeacher'] == 'Select Teacher')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT section_year, section_name FROM table_section WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['sectionid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error fetching Section data at Select Teacher");</script>';
    }

    $row = $s->fetch();
    $sectionYear = $row['section_year'];
    $sectionName = $row['section_name'];
    $sectionid = $_POST['sectionid'];
    $schoolyear = $_POST['schoolyear'];

    try
    {
        $sql = 'SELECT id, teacher_number, teacher_firstname, teacher_middlename, teacher_lastname FROM table_teacher
                WHERE NOT EXISTS (
                SELECT teacherid FROM table_teacher_section
                WHERE teacherid = table_teacher.id AND sectionid = :sectionid AND schoolyear = :schoolyear)';
        $s = $pdo->prepare($sql);
        $s->bindValue(':sectionid', $_POST['sectionid']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error fetching Teacher data at Select Teacher");</script>';
    }
    foreach($s as $row)
    {
        $teacher_details[] = array(
                                'id' => $row['id'],
                                'teacher_number' => $row['teacher_number'],
                                'teacher_firstname' => $row['teacher_firstname'],
                                'teacher_middlename' => $row['teacher_middlename'],
                                'teacher_lastname' => $row['teacher_lastname']);
    }

    $title = 'Available Teachers for ';
    $actionName = 'teacherSelected';
    $buttonColor = 'success';
    $alert = '';
    $actionValue = 'Assign';
    include 'assignForm.html.php';
    exit();

}
// TEACHER SELECTED
if(isset($_POST['teacherSelected']) and $_POST['teacherSelected'] == 'Assign')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'INSERT INTO table_teacher_section SET 
                                                        teacherid = :teacherid,
                                                        sectionid = :sectionid,
                                                        schoolyear = :schoolyear';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':sectionid', $_POST['sectionid']);
        $s->bindValue(':schoolyear',$_POST['schoolyear']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Inserting Data in Teacher Section table");</script>';
    }
    header('Location: ../assigning/');
    exit();
}

//********************************************************************************************************************* */

//********************************************************************************************************************* */
// DESELECT TEACHER
if(isset($_POST['deselectTeacher']) and $_POST['deselectTeacher'] == 'Deselect Teacher')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT section_year, section_name FROM table_section WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['sectionid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error fetching Section data at Select Teacher");</script>';
    }

    $row = $s->fetch();
    $sectionYear = $row['section_year'];
    $sectionName = $row['section_name'];
    $sectionid = $_POST['sectionid'];
    $schoolyear = $_POST['schoolyear'];
    
    try
    {
        $sql = 'SELECT id, teacher_number, teacher_firstname, teacher_middlename, teacher_lastname FROM table_teacher
                WHERE EXISTS (
                SELECT teacherid FROM table_teacher_section
                WHERE teacherid = table_teacher.id AND sectionid = :sectionid AND schoolyear = :schoolyear)';
        $s = $pdo->prepare($sql);
        $s->bindValue(':sectionid', $_POST['sectionid']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error fetching Teacher data at Select Teacher");</script>';
    }
    foreach($s as $row)
    {
        $teacher_details[] = array(
                                'id' => $row['id'],
                                'teacher_number' => $row['teacher_number'],
                                'teacher_firstname' => $row['teacher_firstname'],
                                'teacher_middlename' => $row['teacher_middlename'],
                                'teacher_lastname' => $row['teacher_lastname']);
    }

    $title = 'Assigned Teachers in ';
    $actionName = 'teacherDeselected';
    $buttonColor = 'danger';
    $alert = 'return confirm("Are you sure to delete this record!");';
    $actionValue = 'Deselect';
    include 'assignForm.html.php';
    exit();
}

// TEACHER DESELECTED
if(isset($_POST['teacherDeselected']) and $_POST['teacherDeselected'] == 'Deselect')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'DELETE FROM table_teacher_section WHERE teacherid = :teacherid AND sectionid = :sectionid AND schoolyear = :schoolyear';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':sectionid', $_POST['sectionid']);
        $s->bindValue(':schoolyear',$_POST['schoolyear']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Deleting Teacher data at Select Teacher");</script>';
    }
    header('Location: ../assigning/');
    exit();
}

//********************************************************************************************************************* */







//********************************************************************************************************************* */
include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';

try
{
    $Schoolyear = $pdo->query('SELECT id, schoolyear FROM table_school_year  ORDER BY schoolyear ASC');
}
catch (PDOException $e)
{
    echo '<script>alert("Error Fetching School Year");</script>';
}

foreach($Schoolyear as $row)
{
                $Schoolyears[] = array(
                                        'id' => $row['id'],
                                        'schoolyear' => $row['schoolyear']
                                    );
}

try
{
    $result = $pdo->query('SELECT id, section_year, section_name FROM table_section WHERE section_status = "Active"');
}
catch (PDOException $e)
{
    echo '<script>alert("Error fetching Section data at Assign Teacher");</script>';
}

foreach ($result as $row)
{
    $section_details[] = array(
                                'id' => $row['id'],
                                'section_year' => $row['section_year'],
                                'section_name' => $row['section_name']);
}

include 'assignTeacher.html.php';