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



//ADD STUDENT
if(isset($_GET['addstudent']))
{
    $title = 'Add Student Details';
    $action = 'addform';
    $student_firstname = '';
    $student_middlename = '';
    $student_lastname = '';
    $student_number = '';
    $student_sex = '';
    $student_birthdate = '';
    $student_contact = '';
    $student_address = '';
    $student_guardian_name = '';
    $student_guardian_contact = '';
    $student_guardian_address = '';
    $student_image = '';
    $student_id = '';
    $buttoncolor = 'info';
    $button = 'Add Student';
    $headercardcolor = 'blue';
    $backform = '.';

    include 'form.html.php';
    exit();
}

if(isset($_GET['addform']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    //FETCHING student_number
    try
    {
        $sql = 'SELECT student_number FROM table_student WHERE student_number = :student_number';
        $s = $pdo->prepare($sql);
        $s->bindValue(':student_number', $_POST['student_number']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Fetching Student Details");</script>';
        exit();
    }

    $selectStudent_number = $s->rowCount();

    if($selectStudent_number > 0)
    {
        $title = 'Add Student Details';
        $action = 'addform';
        $student_firstname = '';
        $student_middlename = '';
        $student_lastname = '';
        $student_number = '';
        $student_sex = '';
        $student_birthdate = '';
        $student_contact = '';
        $student_address = '';
        $student_guardian_name = '';
        $student_guardian_contact = '';
        $student_guardian_address = '';
        $student_image = '';
        $student_id = '';
        $buttoncolor = 'info';
        $button = 'Add Student';
        $headercardcolor = 'blue';
        $backform = '.';

        include 'form.html.php';
        echo "<script>
                swal({
                title: 'Student Number Already Exists!', 
                text: 'Invalid input', 
                type: 'error', 
                confirmButtonText: 'Close'});
              </script>";
        exit();
    }
     //ELSE, IF STUDENT NUMBER IS NOT YET EXISTS THEN INPUT TO THE DATABASE
    else
    {
        //the path to store the uploaded image
        $imgFile = $_FILES['student_image']['name'];
        $tmp_dir = $_FILES['student_image']['tmp_name'];
        $imgSize = $_FILES['student_image']['size'];

        $upload_dir = 'student_images/'; //upload directory

        $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); //get image extension

        //rename uploading image
        $userpic = rand(1000,100000).".".$imgExt;

        move_uploaded_file($tmp_dir, $upload_dir.$userpic);

        try
        {
            $sql = 'INSERT INTO table_student SET student_firstname = :student_firstname,
                                                  student_middlename = :student_middlename,
                                                  student_lastname = :student_lastname,
                                                  student_number = :student_number,
                                                  student_sex = :student_sex,
                                                  student_birthdate = :student_birthdate,
                                                  student_contact = :student_contact,
                                                  student_address = :student_address,
                                                  student_guardian_name = :student_guardian_name,
                                                  student_guardian_contact = :student_guardian_contact,
                                                  student_guardian_address = :student_guardian_address,
                                                  student_type = "STUDENT",
                                                  student_image = :student_image,
                                                  student_status = "ACTIVE"';
            $s = $pdo->prepare($sql);
            $s->bindValue(':student_firstname', $_POST['student_firstname']);
            $s->bindValue(':student_middlename', $_POST['student_middlename']);
            $s->bindValue(':student_lastname', $_POST['student_lastname']);
            $s->bindValue(':student_number', $_POST['student_number']);
            $s->bindValue(':student_sex', $_POST['student_sex']);
            $s->bindValue(':student_birthdate', $_POST['student_birthdate']);
            $s->bindValue(':student_contact', $_POST['student_contact']);
            $s->bindValue(':student_address', $_POST['student_address']);
            $s->bindValue(':student_guardian_name', $_POST['student_guardian_name']);
            $s->bindValue(':student_guardian_contact', $_POST['student_guardian_contact']);
            $s->bindValue(':student_guardian_address', $_POST['student_guardian_address']);
            $s->bindValue(':student_image', $userpic);
            $s->execute();
                                                
        }
        catch (PDOException $e)
        {
            echo '<script>alert("Error Fetching Student Details");</script>';
            exit();
        }

        $userPassword = md5('studentOGMS');
        $userid = $pdo->lastInsertId();
        try
        {
            $sql = 'INSERT INTO table_user_account SET userid = :userid, userPassword = :userPassword, userLevel = "Student", actualPassword = "studentOGMS", user_status = "Activated"';
            $s = $pdo->prepare($sql);
            $s->bindValue(':userid', $userid);
            $s->bindValue(':userPassword', $userPassword);
            $s->execute();
        }
        catch (PDOException $e)
        {
            echo '<script>alert("Error Inserting User Account in Table User Account");</script>';
        }




        header('Location: .');
        exit();

    }

}




//************************************************************************** */
//EDIT STUDENT
if(isset($_GET['editstudent']))
{

    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $result = $pdo->query('SELECT
                                        id,
                                        student_number,
                                        student_firstname,
                                        student_middlename,
                                        student_lastname,
                                        student_image FROM
                                        table_student WHERE
                                        student_status = "ACTIVE"');
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Fetching Student Details");</script>';
        exit();
    }

    foreach($result as $row)
    {
        $student_details[] = array(
                                    'id' => $row['id'],
                                    'student_number' => $row['student_number'],
                                    'student_firstname' => $row['student_firstname'],
                                    'student_middlename' => $row['student_middlename'],
                                    'student_lastname' => $row['student_lastname'],
                                    'student_image' => $row['student_image']);
    }

    include 'edit.html.php';
    exit();
}

if(isset($_GET['editstudentdetails']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT  id,
                        student_firstname,
                        student_middlename,
                        student_lastname,
                        student_number,
                        student_sex,
                        student_birthdate,
                        student_contact,
                        student_address,
                        student_guardian_name,
                        student_guardian_contact,
                        student_guardian_address,
                        student_image FROM
                        table_student WHERE
                        id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['editid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Fetching Student Details at Edit Form");</script>';
    }

    $row = $s->fetch();

    $title = 'Edit Student Details';
    $action = 'editform';
    $student_firstname = $row['student_firstname'];
    $student_middlename = $row['student_middlename'];
    $student_lastname = $row['student_lastname'];
    $student_number = $row['student_number'];
    $student_sex = $row['student_sex'];
    $student_birthdate = $row['student_birthdate'];
    $student_contact = $row['student_contact'];
    $student_address = $row['student_address'];
    $student_guardian_name = $row['student_guardian_name'];
    $student_guardian_contact = $row['student_guardian_contact'];
    $student_guardian_address = $row['student_guardian_address'];
    $student_image = $row['student_image'];
    $student_id = $row['id'];
    $buttoncolor = 'success';
    $button = 'Edit Student';
    $headercardcolor = 'green';
    $backform = '.';

    include 'form.html.php';
    exit();

}

//EDIT THAT WILL TRIGGER THE UPDATE TO THE DATABASe
if(isset($_GET['editform']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php'; 
    $imgFile = $_FILES['student_image']['name'];
    $tmp_dir = $_FILES['student_image']['tmp_name'];
    $imgSize = $_FILES['student_image']['size'];

    if($imgFile)
    {
        $upload_dir = 'student_images/'; //upload directory

        $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); //get image extension
        //rename uploading image
        
        $userpic = rand(1000,100000).".".$imgExt;

        //the path to store the uploaded image
        unlink($upload_dir.$_POST['image1']);
        move_uploaded_file($tmp_dir, $upload_dir.$userpic);
    }
    else
    {
        $userpic = $_POST['image1'];
    }

    try
    {
        $sql = 'UPDATE table_student SET    student_firstname = :student_firstname,
                                            student_middlename = :student_middlename,
                                            student_lastname = :student_lastname,
                                            student_number = :student_number,
                                            student_sex = :student_sex,
                                            student_birthdate = :student_birthdate,
                                            student_contact = :student_contact,
                                            student_address = :student_address,
                                            student_guardian_name = :student_guardian_name,
                                            student_guardian_contact = :student_guardian_contact,
                                            student_guardian_address = :student_guardian_address,
                                            student_image = :student_image
                                            WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':student_firstname', $_POST['student_firstname']);
        $s->bindValue(':student_middlename', $_POST['student_middlename']);
        $s->bindValue(':student_lastname', $_POST['student_lastname']);
        $s->bindValue(':student_number', $_POST['student_number']);
        $s->bindValue(':student_sex', $_POST['student_sex']);
        $s->bindValue(':student_birthdate', $_POST['student_birthdate']);
        $s->bindValue(':student_contact', $_POST['student_contact']);
        $s->bindValue(':student_address', $_POST['student_address']);
        $s->bindValue(':student_guardian_name', $_POST['student_guardian_name']);
        $s->bindValue(':student_guardian_contact', $_POST['student_guardian_contact']);
        $s->bindValue(':student_guardian_address', $_POST['student_guardian_address']);
        $s->bindValue(':student_image', $userpic);
        $s->bindValue(':id', $_POST['student_id']);
        $s->execute();

    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Updating");</script>';
        include 'index.php';
        exit();
    }

    header('Location: .');
    exit();
}
//************************************************************************** */



//************************************************************************** */

//DELETE STUDENT
if(isset($_GET['deletestudent']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php'; 
    try
    {
        $result = $pdo->query('SELECT
                                        id,
                                        student_number,
                                        student_firstname,
                                        student_middlename,
                                        student_lastname,
                                        student_image FROM
                                        table_student WHERE
                                        student_status = "ACTIVE"');
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Fetching Student Details");</script>';
        exit();
    }

    foreach($result as $row)
    {
        $student_details[] = array(
                                    'id' => $row['id'],
                                    'student_number' => $row['student_number'],
                                    'student_firstname' => $row['student_firstname'],
                                    'student_middlename' => $row['student_middlename'],
                                    'student_lastname' => $row['student_lastname'],
                                    'student_image' => $row['student_image']);
    }


    include 'delete.html.php';
    exit();
}

if(isset($_GET['deletestudentdetails']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php'; 
    try
    {
        $sql = 'UPDATE table_student SET student_status = "DELETED" WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['deleteid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Deleting Student Details");</script>';
    }
    
    header('Location: .');
    exit();

}
//************************************************************************** */



//VIEW STUDENT
if(isset($_POST['viewaction']) and $_POST['viewaction'] == 'View')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT  id,
                        student_firstname,
                        student_lastname,
                        student_middlename,
                        student_number,
                        student_sex,
                        student_birthdate,
                        student_contact,
                        student_address,
                        student_guardian_name,
                        student_guardian_contact,
                        student_guardian_address,
                        student_type,
                        student_image FROM
                        table_student WHERE
                        id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['viewid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Fetching Data at View Form");</script>';
    }

    $row = $s->fetch();
    $student_firstname = $row['student_firstname'];
    $student_middlename = $row['student_middlename'];
    $student_lastname = $row['student_lastname'];
    $student_number = $row['student_number'];
    $student_sex = $row['student_sex'];
    $student_birthdate = $row['student_birthdate'];
    $student_contact = $row['student_contact'];
    $student_address = $row['student_address'];
    $student_guardian_name = $row['student_guardian_name'];
    $student_guardian_contact = $row['student_guardian_contact'];
    $student_guardian_address = $row['student_guardian_address'];
    $student_type = $row['student_type'];
    $student_image = $row['student_image'];
    $student_id = $row['id'];

    include 'view.html.php';
    exit();
}

//************************************************************************** */
//RETRIEVING 
include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
try
{
    $result = $pdo->query('SELECT
                                    id,
                                    student_number,
                                    student_firstname,
                                    student_middlename,
                                    student_lastname,
                                    student_image FROM
                                    table_student WHERE
                                    student_status = "ACTIVE"');
}
catch (PDOException $e)
{
    echo '<script>alert("Error Fetching Student Details");</script>';
    exit();
}

foreach($result as $row)
{
    $student_details[] = array(
                                'id' => $row['id'],
                                'student_number' => $row['student_number'],
                                'student_firstname' => $row['student_firstname'],
                                'student_middlename' => $row['student_middlename'],
                                'student_lastname' => $row['student_lastname'],
                                'student_image' => $row['student_image']);
}

include 'student.html.php';