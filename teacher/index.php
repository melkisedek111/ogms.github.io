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


// ADD TEACHER DETAILS TO THE DATABASE
// ***********************************************************************************
if(isset($_GET['addteacher']))
{
    $headercardcolor = 'blue';
    $action = 'addform';
    $title = 'Add Teacher Details';
    $teacher_firstname = '';
    $teacher_middlename = '';
    $teacher_lastname = '';
    $teacher_number = '';
    $teacher_sex = '';
    $teacher_birthdate = '';
    $teacher_contact = '';
    $teacher_address = '';
    $teacher_image = '';
    $buttoncolor = 'info';
    $button = 'Add Teacher';
    $backform = '.';


    include 'form.html.php';
    exit();
}

if(isset($_GET['addform']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    // SELECTING TEACHER NUMBER
    try
    {
        $sql = 'SELECT teacher_number FROM table_teacher WHERE teacher_number = :teacher_number';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacher_number', $_POST['teacher_number']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error = 'Error Selecting Teacher Number';
        include 'error.html.php';
        exit();
    }

    $selectTeacherNumber = $s->fetch();

    if($selectTeacherNumber > 0)
    {
        $headercardcolor = 'blue';
        $action = 'addform';
        $title = 'Add Teacher Details';
        $teacher_firstname = '';
        $teacher_middlename = '';
        $teacher_lastname = '';
        $teacher_number = '';
        $teacher_sex = '';
        $teacher_birthdate = '';
        $teacher_contact = '';
        $teacher_address = '';
        $teacher_image = '';
        $buttoncolor = 'info';
        $button = 'Add Teacher';
        $backform = '.';


        include 'form.html.php';
        echo "<script>
                swal({
                title: 'Teacher Number Already Exists!', 
                text: 'Invalid input', 
                type: 'error', 
                confirmButtonText: 'Close'});
              </script>";
        exit();
    }
    else
    {
        error_reporting( ~E_NOTICE );

        //the path to store the uploaded image
        $imgFile = $_FILES['teacher_image']['name'];
        $tmp_dir = $_FILES['teacher_image']['tmp_name'];
        $imgSize = $_FILES['teacher_image']['size'];
        
        $upload_dir = 'teacher_images/'; //upload directory

        $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); //get image extension


        //rename uploading image
        $userpic = rand(1000,100000).".".$imgExt;


        move_uploaded_file($tmp_dir, $upload_dir.$userpic);
        try
        {
            $sql = 'INSERT INTO table_teacher SET   teacher_number = :teacher_number,
                                                    teacher_firstname = :teacher_firstname,
                                                    teacher_middlename = :teacher_middlename,
                                                    teacher_lastname = :teacher_lastname,
                                                    teacher_sex = :teacher_sex,
                                                    teacher_birthdate = :teacher_birthdate,
                                                    teacher_address = :teacher_address,
                                                    teacher_contact = :teacher_contact,
                                                    teacher_type = "Teacher",
                                                    teacher_status = "Active",
                                                    teacher_image = :teacher_image';
            $s = $pdo->prepare($sql);
            $s->bindValue(':teacher_number', $_POST['teacher_number']);
            $s->bindValue(':teacher_firstname', $_POST['teacher_firstname']);
            $s->bindValue(':teacher_middlename', $_POST['teacher_middlename']);
            $s->bindValue(':teacher_lastname', $_POST['teacher_lastname']);
            $s->bindValue(':teacher_sex', $_POST['teacher_sex']);
            $s->bindValue(':teacher_birthdate', $_POST['teacher_birthdate']);
            $s->bindValue(':teacher_address', $_POST['teacher_address']);
            $s->bindValue(':teacher_contact', $_POST['teacher_contact']);
            $s->bindValue(':teacher_image', $userpic);
            $s->execute();
            
        }
        catch (PDOException $e)
        {
            $error = 'Error inserting Teacher Data to the Database' . $e->getMessage();
            include 'error.html.php';
            exit();
        }

        $userPassword = md5('teacherUser');
        $userid = $pdo->lastInsertId();
        try
        {
            $sql = 'INSERT INTO table_user_account SET userid = :userid, userPassword = :userPassword, userLevel = "Teacher", actualPassword = "teacherUser", user_status = "Activated"';
            $s = $pdo->prepare($sql);
            $s->bindValue(':userid', $userid);
            $s->bindValue(':userPassword', $userPassword);
            $s->execute();
        }
        catch (PDOException $e)
        {
            echo '<script>alert("Error Inserting User Account in Table User Account");</script>';
        }

        header('Location: .?status=Success');
        exit();
    }
}


// ***********************************************************************************


// ***********************************************************************************

// EDIT TEACHER

if(isset($_GET['editform']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php'; 
    $imgFile = $_FILES['teacher_image']['name'];
    $tmp_dir = $_FILES['teacher_image']['tmp_name'];
    $imgSize = $_FILES['teacher_image']['size'];

    if($imgFile)
    {
        $upload_dir = 'teacher_images/'; //upload directory

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
        $sql = 'UPDATE table_teacher SET    teacher_number = :teacher_number,
                                            teacher_firstname = :teacher_firstname,
                                            teacher_middlename = :teacher_middlename,
                                            teacher_lastname = :teacher_lastname,
                                            teacher_sex = :teacher_sex,
                                            teacher_birthdate = :teacher_birthdate,
                                            teacher_address = :teacher_address,
                                            teacher_contact = :teacher_contact,
                                            teacher_image = :teacher_image
                                            WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacher_number', $_POST['teacher_number']);
        $s->bindValue(':teacher_firstname', $_POST['teacher_firstname']);
        $s->bindValue(':teacher_middlename', $_POST['teacher_middlename']);
        $s->bindValue(':teacher_lastname', $_POST['teacher_lastname']);
        $s->bindValue(':teacher_sex', $_POST['teacher_sex']);
        $s->bindValue(':teacher_birthdate', $_POST['teacher_birthdate']);
        $s->bindValue(':teacher_address', $_POST['teacher_address']);
        $s->bindValue(':teacher_contact', $_POST['teacher_contact']);
        $s->bindValue(':teacher_image', $userpic);
        $s->bindValue(':id', $_POST['teacher_id']);
        $s->execute();
    }   
    catch (PDOException $e)
    {
        echo '<script>alert("Error Update at Edit Form");<script>';
    }
    header('Location: .');
    exit();
}

if(isset($_POST['edithtml']) and $_POST['edithtml'] == 'Edit')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT  id,
                        teacher_number,
                        teacher_firstname,
                        teacher_middlename,
                        teacher_lastname,
                        teacher_sex,
                        teacher_birthdate,
                        teacher_address,
                        teacher_contact,
                        teacher_image FROM
                        table_teacher WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['editid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error in Edit Form");<script>';
    }

    $row = $s->fetch();

    $backform = '?editteacher';
    $headercardcolor = 'green';
    $title = 'Edit Teacher Profile';
    $action = 'editform';
    $teacher_firstname = $row['teacher_firstname'];
    $teacher_middlename = $row['teacher_middlename'];
    $teacher_lastname = $row['teacher_lastname'];
    $teacher_number = $row['teacher_number'];
    $teacher_sex = $row['teacher_sex'];
    $teacher_birthdate = $row['teacher_birthdate'];
    $teacher_contact = $row['teacher_contact'];
    $teacher_address = $row['teacher_address'];
    $teacher_image = $row['teacher_image'];
    $teacher_id = $row['id'];
    $buttoncolor = 'success';
    $button = 'Edit Teacher';

    include 'form.html.php';
    exit();
}

// WILL BE DIRECT TO EDIT FORM
if(isset($_GET['editteacher']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $result = $pdo->query('SELECT   id,
                                        teacher_number,
                                        teacher_firstname,
                                        teacher_middlename,
                                        teacher_lastname,
                                        teacher_image FROM
                                        table_teacher WHERE
                                        teacher_status = "Active"');
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Fetching Data at Edit Form");</script>';
    }

    foreach($result as $row)
    {
        $teacher_details[] = array(
                                    'id' => $row['id'],
                                    'teacher_number' => $row['teacher_number'],
                                    'teacher_firstname' => $row['teacher_firstname'],
                                    'teacher_middlename' => $row['teacher_middlename'],
                                    'teacher_lastname' => $row['teacher_lastname'],
                                    'teacher_image' => $row['teacher_image']);
    }

    include 'edit.html.php';
    exit();
}


// ***********************************************************************************

// ***********************************************************************************

// DELETE TEACHER
if(isset($_GET['deleteteacher']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $result = $pdo->query('SELECT   id,
                                        teacher_number,
                                        teacher_firstname,
                                        teacher_middlename,
                                        teacher_lastname,
                                        teacher_image FROM
                                        table_teacher WHERE
                                        teacher_status = "Active"');
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Fetching Data at Edit Form");</script>';
    }

    foreach($result as $row)
    {
        $teacher_details[] = array(
                                    'id' => $row['id'],
                                    'teacher_number' => $row['teacher_number'],
                                    'teacher_firstname' => $row['teacher_firstname'],
                                    'teacher_middlename' => $row['teacher_middlename'],
                                    'teacher_lastname' => $row['teacher_lastname'],
                                    'teacher_image' => $row['teacher_image']);
    }

    include 'delete.html.php';
    exit();
    
}

if(isset($_GET['deletestudentdetails']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'UPDATE table_teacher SET   teacher_status = "Deleted"
                                            WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['deleteid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error = 'Error Deleting at Delete Form';
        include 'error.htnl.php';
        exit();
    }

    header('Location: .');
    exit();
}




// ***********************************************************************************

// ***********************************************************************************
// MAIN PAGE OF TEACHER
include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
try
{
    $result = $pdo->query('SELECT   id,
                                    teacher_number,
                                    teacher_firstname,
                                    teacher_middlename,
                                    teacher_image,
                                    teacher_lastname FROM
                                    table_teacher WHERE
                                    teacher_status = "Active" ORDER BY id DESC');
}
catch (PDOException $e)
{
    echo '<script>alert("Error fetching Teacher Data");</script>';
}

foreach ($result as $row)
{
    $teacher_details[] = array(
                                'id' => $row['id'],
                                'teacher_number' => $row['teacher_number'],
                                'teacher_firstname' => $row['teacher_firstname'],
                                'teacher_middlename' => $row['teacher_middlename'],
                                'teacher_lastname' => $row['teacher_lastname'],
                                'teacher_image' => $row['teacher_image']
    );
}
include 'teacher.html.php';