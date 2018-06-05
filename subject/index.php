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

// **********************************************************************************

// ADD SUBJECT
if(isset($_GET['addsubject']))
{

    $headercardcolor = 'blue';
    $backform = '.';
    $title = 'Add Subject Details';
    $action = 'addform';
    $buttoncolor = 'info';
    $button = 'Add Subject';
    $subject_id = '';
    $subject_code = '';
    $subject_title = '';
    $subject_description = '';

    include 'form.html.php';
    exit();
}

if(isset($_GET['addform']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT subject_code FROM table_subject WHERE subject_code = :subject_code';
        $s = $pdo->prepare($sql);
        $s->bindValue(':subject_code', $_POST['subject_code']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Selecting Subject Code");</script>';
    }

    $subjectCode = $s->fetch();

    try
    {
        $sql = 'SELECT subject_title FROM table_subject WHERE subject_title = :subject_title';
        $s = $pdo->prepare($sql);
        $s->bindValue(':subject_title', $_POST['subject_title']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Selecting Subject Title");</script>';
    }

    $subjectTitle = $s->fetch();

    if($subjectCode > 0)
    {
        $headercardcolor = 'blue';
        $backform = '.';
        $title = 'Add Subject Details';
        $action = 'addform';
        $buttoncolor = 'info';
        $button = 'Add Subject';
        $subject_id = '';
        $subject_code = '';
        $subject_title = '';
        $subject_description = '';

        include 'form.html.php';
        echo "<script>
                swal({
                title: 'Subject Code Already Exists!', 
                text: 'Invalid input', 
                type: 'error', 
                confirmButtonText: 'Close'});
              </script>";
        exit();
    }
    elseif($subjectTitle > 0)
    {
        $headercardcolor = 'blue';
        $backform = '.';
        $title = 'Add Subject Details';
        $action = 'addform';
        $buttoncolor = 'info';
        $button = 'Add Subject';
        $subject_id = '';
        $subject_code = '';
        $subject_title = '';
        $subject_description = '';

        include 'form.html.php';
        echo "<script>
                swal({
                title: 'Subject Title Already Exists!', 
                text: 'Invalid input', 
                type: 'error', 
                confirmButtonText: 'Close'});
              </script>";
        exit();
    }
    else
    {
        try
        {
            $sql = 'INSERT INTO table_subject SET   subject_code = :subject_code,
                                                    subject_title = :subject_title,
                                                    subject_description = :subject_description,
                                                    subject_status = "Active"';
            $s = $pdo->prepare($sql);
            $s->bindValue(':subject_code', $_POST['subject_code']);
            $s->bindValue(':subject_title', $_POST['subject_title']);
            $s->bindValue(':subject_description', $_POST['subject_description']);
            $s->execute();
        }
        catch (PDOException $e)
        {
            echo '<script>alert("Error Inserting Subject Data");</script>';
        }
    }
    header('Location: .');
    exit();
}
// *********************************************************************************



//******************************************************************************* */

// EDIT SUBJECT
if(isset($_POST['edithtml']) and $_POST['edithtml'] == 'Edit')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT  id,
                        subject_code,
                        subject_title,
                        subject_description FROM
                        table_subject WHERE
                        id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['subjectid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        //echo '<script>alert("Error Fetching Subject Data");<script>';
        $error = 'Error';
        include 'error.html.php';
        exit();
    }
    
    $row = $s->fetch();

    $headercardcolor = 'green';
    $backform = '?editsubject';
    $title = 'Edit Subject Details';
    $action = 'editform';
    $buttoncolor = 'success';
    $button = 'Edit Subject';
    $subject_id = $row['id'];
    $subject_code = $row['subject_code'];
    $subject_title = $row['subject_title'];
    $subject_description = $row['subject_description'];

    include 'form.html.php';
    exit();

}


if(isset($_GET['editsubject']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    // RETRIEVING SUBJECT DETAILS

    try
    {
        $result = $pdo->query('SELECT   id,
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

    foreach($result as $row)
    {
        $subject_details[] = array(
                                    'id' => $row['id'],
                                    'subject_code' => $row['subject_code'],
                                    'subject_title' => $row['subject_title'],
                                    'subject_description' => $row['subject_description']);
    }
    include 'edit.html.php';
    exit();
}


if(isset($_GET['editform']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'UPDATE table_subject SET    subject_code = :subject_code,
                                            subject_title = :subject_title,
                                            subject_description = :subject_description 
                                            WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':subject_code', $_POST['subject_code']);
        $s->bindValue(':subject_title', $_POST['subject_title']);
        $s->bindValue(':subject_description', $_POST['subject_description']);
        $s->bindValue(':id', $_POST['subjectid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Update Subject Data");</script>';
    }

    header('Location: .');
    exit();
}
//***************************************************************************** */


//***************************************************************************** */

//DELETE SUBJECT DATA

if(isset($_POST['deletedata']) and $_POST['deletedata'] == 'Delete')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'UPDATE table_subject SET    subject_status = "Deleted"
                                            WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['subjectid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Deleting Subject Data");</script>';
    }
    header('Location: .');
    exit();
}

if(isset($_GET['deletesubject']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    // RETRIEVING SUBJECT DETAILS

    try
    {
        $result = $pdo->query('SELECT   id,
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

    foreach($result as $row)
    {
        $subject_details[] = array(
                                    'id' => $row['id'],
                                    'subject_code' => $row['subject_code'],
                                    'subject_title' => $row['subject_title'],
                                    'subject_description' => $row['subject_description']);
    }
    include 'delete.html.php';
    exit();
}


include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
// RETRIEVING SUBJECT DETAILS

try
{
    $result = $pdo->query('SELECT   id,
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

foreach($result as $row)
{
    $subject_details[] = array(
                                'id' => $row['id'],
                                'subject_code' => $row['subject_code'],
                                'subject_title' => $row['subject_title'],
                                'subject_description' => $row['subject_description']);
}


include 'subject.html.php';