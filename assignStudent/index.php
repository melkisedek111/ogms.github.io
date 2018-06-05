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

//*********************************************************************************** */
// SELECT STUDENT
if(isset($_POST['selectStudent']) and $_POST['selectStudent'] == 'Select Student')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT id, section_year, section_name FROM table_section WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['sectionid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error fetching Section data at Assign Student");</script>';
    }

    $row = $s->fetch();
    $sectionYear = $row['section_year'];
    $sectionName = $row['section_name'];
    $sectionid = $_POST['sectionid'];
    $schoolyear = $_POST['schoolyear'];

    try
    {
        $sql = 'SELECT id, student_number, student_firstname, student_middlename, student_lastname FROM table_student
            WHERE NOT EXISTS(
            SELECT studentid FROM table_student_section
            WHERE table_student.id = studentid AND schoolyear = :schoolyear)';
        $s = $pdo->prepare($sql);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error fetching Student data at Assign Student");</script>';
    }
    foreach($s as $row)
    {
        $student_details[] = array(
                                    'id' => $row['id'],
                                    'student_number' => $row['student_number'],
                                    'student_firstname' => $row['student_firstname'],
                                    'student_middlename' => $row['student_middlename'],
                                    'student_lastname' => $row['student_lastname'],
                                    'selected' => false
        );
    }

    $title = 'Available Students for ';
    $actionName = 'studentSelected';
    $actionValue = 'Assign';
    $buttonColor = 'success';
    $alert = '';

    include 'assignForm.html.php';
    exit();

}

if(isset($_POST['studentSelected']) and $_POST['studentSelected'] == 'Assign')
{
    
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'INSERT INTO table_student_section SET   studentid = :studentid, sectionid = :sectionid, schoolyear = :schoolyear';
        $s = $pdo->prepare($sql);
        if(!isset($_POST['students']))
        {
            header('Location: .');
            exit();
        }
        else
        {
            foreach($_POST['students'] as $studentid)
            {
                $s->bindValue(':studentid', $studentid);
                $s->bindValue(':sectionid', $_POST['sectionid']);
                $s->bindValue(':schoolyear', $_POST['schoolyear']);
                $s->execute();
                
            }
            header('Location: ../assigning/');
            exit();
        }
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Inserting Student data at Assign Student");</script>';
    }

    

}

//*********************************************************************************** */


//*********************************************************************************** */
// DESELECT STUDENT
if(isset($_POST['deselectStudent']) and $_POST['deselectStudent'] == 'Deselect Student')
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
        echo '<script>alert("Error fetching Section data at Assign Student");</script>';
    }

    $row = $s->fetch();
    $sectionYear = $row['section_year'];
    $sectionName = $row['section_name'];
    $sectionid = $_POST['sectionid'];   
    $schoolyear = $_POST['schoolyear'];

    try
    {
        $sql = 'SELECT id, student_number, student_firstname, student_middlename, student_lastname FROM table_student
            WHERE EXISTS(
            SELECT studentid FROM table_student_section
            WHERE table_student.id = studentid and sectionid = :sectionid AND schoolyear = :schoolyear)';
        $s = $pdo->prepare($sql);
        $s->bindValue(':sectionid', $_POST['sectionid']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error fetching Student data at Assign Student");</script>';
    }
    foreach($s as $row)
    {
        $student_details[] = array(
                                    'id' => $row['id'],
                                    'student_number' => $row['student_number'],
                                    'student_firstname' => $row['student_firstname'],
                                    'student_middlename' => $row['student_middlename'],
                                    'student_lastname' => $row['student_lastname'],
                                    'selected' => false
        );
    }

    $title = 'All Students in ';
    $actionName = 'studentDeselected';
    $actionValue = 'Delete';
    $buttonColor = 'danger';
    $alert = 'return confirm("Are you sure to delete this record!");';

    include 'assignForm.html.php';
    exit();
	
}

if(isset($_POST['studentDeselected']) and $_POST['studentDeselected'] == 'Delete')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'DELETE FROM table_student_section WHERE studentid = :studentid AND sectionid = :sectionid AND schoolyear = :schoolyear';
        $s = $pdo->prepare($sql);
        if(!isset($_POST['students']))
        {
            header('Location: .');
            exit();
        }
        else
        {
            foreach($_POST['students'] as $studentid)
            {
                $s->bindValue(':studentid', $studentid);
                $s->bindValue(':sectionid', $_POST['sectionid']);
                $s->bindValue(':schoolyear', $_POST['schoolyear']);
                $s->execute();
            }
            header('Location: ../assigning/');
            exit();
        }
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error deleting student and Section data at Assign Teacher");</script>';
    }

}


//*********************************************************************************** */
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



include 'assignStudent.html.php';
exit();