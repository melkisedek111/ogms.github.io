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


//******************************************************************************************************************** */
//SELECT SUBJECT
if(isset($_POST['selectSubject']) and $_POST['selectSubject'] == 'Select Subject')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT teacher_firstname, teacher_middlename, teacher_lastname FROM table_teacher WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['teacherid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error fetching teacher data at Teacher Name");</script>';
    }

    $row = $s->fetch();
    $teacher_firstname = $row['teacher_firstname'];
    $teacher_middlename = $row['teacher_middlename'];
    $teacher_lastname = $row['teacher_lastname'];
    $teacher_id = $_POST['teacherid'];
    $schoolyear = $_POST['schoolyear'];

    try
    {
        $sql = 'SELECT id, subject_code, subject_title, subject_description FROM table_subject
                WHERE NOT EXISTS (
                    SELECT subjectid FROM table_teacher_subject
                    WHERE subjectid = table_subject.id AND teacherid = :id AND schoolyear = :schoolyear AND subject_status = "Active")';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['teacherid']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error fetching teacher data at Available Subject");</script>';
    }
    foreach($s as $row)
    {
        $subject_details[] = array(
                                    'id' => $row['id'],
                                    'subject_code' => $row['subject_code'],
                                    'subject_title' => $row['subject_title'],
                                    'subject_description' => $row['subject_description']);
    }

    $actionName = 'subjectSelected';
    $actionValue = 'Assign';
    $title = 'Available Subjects for';
    $buttonColor = 'success';
    $alert = '';
    include 'assignForm.html.php';
    exit();
}

if(isset($_POST['subjectSelected']) and $_POST['subjectSelected'] == 'Assign')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'INSERT INTO table_teacher_subject SET
                                                        teacherid = :teacherid,
                                                        subjectid = :subjectid,
                                                        schoolyear = :schoolyear';
        $s = $pdo->prepare($sql);
        $s->bindValue(':subjectid', $_POST['subjectid']);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Inserting Teacher Subject data at Available Subject");</script>';
    }
    header('Location: ../assigning/');
    exit();
}

//******************************************************************************************************************** */



//******************************************************************************************************************** */
// DESELECT SUBJECT
if(isset($_POST['deselectSubject']) and $_POST['deselectSubject'] == 'Deselect Subject')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT teacher_firstname, teacher_middlename, teacher_lastname FROM table_teacher WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['teacherid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error fetching teacher data at Teacher Name");</script>';
    }

    $row = $s->fetch();
    $teacher_firstname = $row['teacher_firstname'];
    $teacher_middlename = $row['teacher_middlename'];
    $teacher_lastname = $row['teacher_lastname'];
    $teacher_id = $_POST['teacherid'];
    $schoolyear = $_POST['schoolyear'];
    
    try
    {
        $sql = 'SELECT id, subject_code, subject_title, subject_description FROM table_subject
                WHERE EXISTS (
                    SELECT subjectid FROM table_teacher_subject
                    WHERE subjectid = table_subject.id AND teacherid = :id AND schoolyear = :schoolyear AND subject_status = "Active")';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['teacherid']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error fetching teacher data at Available Subject");</script>';
    }
    foreach($s as $row)
    {
        $subject_details[] = array(
                                    'id' => $row['id'],
                                    'subject_code' => $row['subject_code'],
                                    'subject_title' => $row['subject_title'],
                                    'subject_description' => $row['subject_description']);
    }

    $actionName = 'subjectDeselected';
    $actionValue = 'Deselect';
    $title = 'All Subject Acquired by';
    $buttonColor = 'danger';
    $alert = 'return confirm("Are you sure to delete this record!");';
    include 'assignForm.html.php';
    exit();

}

if(isset($_POST['subjectDeselected']) and $_POST['subjectDeselected'] == 'Deselect')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'DELETE FROM table_teacher_subject WHERE teacherid = :teacherid AND subjectid = :subjectid AND schoolyear = :schoolyear';
        $s = $pdo->prepare($sql);
        $s->bindValue(':subjectid', $_POST['subjectid']);
        $s->bindValue(':teacherid', $_POST['teacherid']);
        $s->bindValue(':schoolyear', $_POST['schoolyear']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Deleting Teacher Subject data at Available Subject");</script>';
    }
    header('Location: ../assigning/');
    exit();
}






//******************************************************************************************************************** */


// FETCHINH TEACHER DATA
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
    $result = $pdo->query('SELECT id, teacher_number, teacher_firstname, teacher_middlename, teacher_lastname FROM table_teacher WHERE teacher_status = "Active"');
}
catch (PDOException $e)
{
    echo '<script>alert("Error fetching teacher data");</script>';
}
foreach($result as $row)
{
    $teacher_details[] = array(
                                'id' => $row['id'],
                                'teacher_number' => $row['teacher_number'],
                                'teacher_firstname' => $row['teacher_firstname'],
                                'teacher_middlename' => $row['teacher_middlename'],
                                'teacher_lastname' => $row['teacher_lastname']);
}

include 'assignSubject.html.php';