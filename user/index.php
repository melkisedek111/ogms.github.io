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

//EDIT USER
if(isset($_GET['edituser']))
{
    $sidebardcolor = 'green';
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php'; 
    try
    {
        $result = $pdo->query('SELECT 
                                id, 
                                admin_username,
                                admin_userlevel,
                                admin_firstname,
                                admin_middlename,   
                                admin_lastname,
                                admin_address,
                                admin_contact,
                                admin_image,
                                admin_created FROM 
                                table_admin WHERE 
                                admin_status="ACTIVE"');
    }
    catch (PDOException $e)
    {
        echo '<script>
                alert("Error Retrieving data from TABLE_ADMIN");
            </script>';
        include 'user.html.php';
        exit();
    }
    foreach ($result as $row)
    {
        $admin_details[] = array(
                                'id' => $row['id'], 
                                'admin_username' => $row['admin_username'], 
                                'admin_userlevel' => $row['admin_userlevel'], 
                                'admin_firstname' => $row['admin_firstname'], 
                                'admin_middlename' => $row['admin_middlename'], 
                                'admin_lastname' => $row['admin_lastname'], 
                                'admin_address' => $row['admin_address'], 
                                'admin_contact' => $row['admin_contact'] , 
                                'admin_image' => $row['admin_image'], 
                                'admin_created' => $row['admin_created']);
    }

    include 'edit.html.php';
    exit();
}

if (isset($_GET['edituserdetails']))
{
    
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php'; 
    try
    {
        $sql = 'SELECT
                id, 
                admin_username,
                admin_userlevel,
                admin_firstname,
                admin_middlename,
                admin_lastname,
                admin_address,
                admin_contact,
                admin_image,
                admin_email,
                admin_created FROM 
                table_admin WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['editid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error = 'Error Fetching User Details' . $e->getMessage();
        include 'error.html.php';
        exit();
    }
    
    $row = $s->fetch();

    $backform = '?edituser';
    $title = 'Edit User Details';
    $action = 'editform';
    $admin_id = $row['id'];
    $admin_username = $row['admin_username'];
    $admin_firstname = $row['admin_firstname'];
    $admin_middlename = $row['admin_middlename'];
    $admin_lastname = $row['admin_lastname'];
    $amdin_address = $row['admin_address'];
    $admin_contact = $row['admin_contact'];
    $admin_email = $row['admin_email'];
    $admin_image = $row['admin_image'];
    $button = "Edit User";
    $buttoncolor = 'success';
    $sidebardcolor = 'green';
    include 'form.html.php';
    exit();
}

if(isset($_GET['editform']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php'; 
    $imgFile = $_FILES['image']['name'];
    $tmp_dir = $_FILES['image']['tmp_name'];
    $imgSize = $_FILES['image']['size'];
        

    if($imgFile)
    {
        $upload_dir = 'images/'; //upload directory

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
            $sql = 'UPDATE table_admin SET      admin_username = :admin_username, 
                                                admin_firstname = :admin_firstname,
                                                admin_middlename = :admin_middlename, 
                                                admin_lastname = :admin_lastname,  
                                                admin_address = :admin_address, 
                                                admin_contact = :admin_contact, 
                                                admin_image = :admin_image,
                                                admin_email = :admin_email
                                                WHERE id = :id';
            $s = $pdo->prepare($sql);
            $s->bindValue(':admin_firstname', $_POST['admin_firstname']);
            $s->bindValue(':admin_middlename', $_POST['admin_middlename']);
            $s->bindValue(':admin_lastname', $_POST['admin_lastname']);
            $s->bindValue(':admin_username', $_POST['admin_username']);
            $s->bindValue(':admin_address', $_POST['admin_address']);
            $s->bindValue(':admin_contact', $_POST['admin_contact']);
            $s->bindValue(':admin_image', $userpic);
            $s->bindValue(':admin_email', $_POST['admin_email']);
            $s->bindValue(':id', $_POST['id']);
            $s->execute();
                        
        }
        catch (PDOException $e)
        {
                $error = 'Error inserting Data' . $e->getMessage();
                include 'error.html.php';
                exit();
        }

        //PASSWORD ENCRYPTION
        if($_POST['admin_password'] != '')
        {
            $password = md5($_POST['admin_password'] . 'oggvs');
            try
            {
                $sql = 'UPDATE table_admin SET admin_password = :admin_password WHERE id = :id';
                $s = $pdo->prepare($sql);
                $s->bindValue(':admin_password', $password);
                $s->bindValue(':id', $_POST['id']);
                $s->execute();
            }
            catch (PDOException $e)
            {
                $error = 'Error password Setup';
                include 'error.html.php';
                exit();
            }
        }

        header('Location: .');
        exit();
}





//ADD USER
if(isset($_GET['adduser']))
{
    $sidebardcolor = 'blue';
    $backform = '.';
    $title = 'Add User Details';
    $action = 'addform';
    $admin_id = '';
    $admin_firstname = '';
    $admin_middlename = '';
    $admin_lastname = '';
    $admin_username = '';
    $amdin_address = '';
    $admin_contact = '';
    $admin_email = '';
    $admin_image = '';
    $button = 'Add User';
    $buttoncolor = 'info';
    
    include 'form.html.php';
    exit();
}

//ONSUBMIT USER
if(isset($_GET['addform']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';

    //SELECTING FIRSTNAME
    try
    {
        $sql = 'SELECT admin_firstname FROM table_admin WHERE admin_firstname = :admin_firstname';
        $s = $pdo->prepare($sql);
        $s->bindValue(':admin_firstname', $_POST['admin_firstname']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error = 'Error Fetching Firstame' . $e->getMessage();
        include 'error.html.php';
        exit();
    }

    $selectAdminName = $s->rowCount();


    //SELECTING USERNAME
    try
    {
        $sql = 'SELECT admin_username FROM table_admin WHERE admin_username = :admin_username';
        $s = $pdo->prepare($sql);
        $s->bindValue(':admin_username', $_POST['admin_username']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error = 'Error Fetching Username' . $e->getMessage();
        include 'error.html.php';
        exit();
    }

    $selectAdminUsername = $s->rowCount();


    //IF STATEMENT, IF FIRSTNAME ALREADY EXISTS THEN ERROR OCCURED
    if($selectAdminName > 0)
    {
        $sidebardcolor = 'blue';
        $backform = '.';
        $title = 'Add User Details';
        $action = 'addform';
        $admin_id = '';
        $admin_firstname = '';
        $admin_middlename = '';
        $admin_lastname = '';
        $admin_username = '';
        $amdin_address = '';
        $admin_contact = '';
        $admin_email = '';
        $admin_image = '';
        $button = 'Add User';
        $buttoncolor = 'info';

        
        include 'form.html.php';
        echo "<script>
                swal({
                title: 'Name Already Exists!', 
                text: 'Invalid input', 
                type: 'error', 
                confirmButtonText: 'Close'});
              </script>";
        exit();
    }
    //IF STATEMENT, IF USERNAME ALREADY EXISTS THEN ERROR OCCURED
    elseif($selectAdminUsername > 0)
    {
        
        $sidebardcolor = 'blue';
        $backform = '.';
        $title = 'Add User Details';
        $action = 'addform';
        $admin_id = '';
        $admin_firstname = '';
        $admin_middlename = '';
        $admin_lastname = '';
        $admin_username = '';
        $amdin_address = '';
        $admin_contact = '';
        $admin_email = '';
        $admin_image = '';
        $button = 'Add User';
        $buttoncolor = 'info';

        
        include 'form.html.php';
        echo "<script>
                swal({
                title: 'Username Already Exists!', 
                text: 'Invalid input', 
                type: 'error', 
                confirmButtonText: 'Close'});
               </script>";
        exit();
    }

    //ELSE, IF FIRSTNAME AND USERNAME IS NOT YET EXISTS THEN INPUT TO THE DATABASE
    else
    {
        error_reporting( ~E_NOTICE );

        //the path to store the uploaded image
        $imgFile = $_FILES['image']['name'];
        $tmp_dir = $_FILES['image']['tmp_name'];
        $imgSize = $_FILES['image']['size'];
        
        $upload_dir = 'images/'; //upload directory

        $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); //get image extension


        //rename uploading image
        $userpic = rand(1000,100000).".".$imgExt;


        move_uploaded_file($tmp_dir, $upload_dir.$userpic);

        try
        {
                $sql = 'INSERT INTO table_admin SET admin_username = :admin_username, 
                                                    admin_userlevel = "ADMIN",
                                                    admin_firstname = :admin_firstname,
                                                    admin_middlename = :admin_middlename, 
                                                    admin_lastname = :admin_lastname,  
                                                    admin_address = :admin_address, 
                                                    admin_contact = :admin_contact, 
                                                    admin_image = :admin_image,
                                                    admin_email = :admin_email,
                                                    admin_created = CURDATE(),
                                                    admin_status = "ACTIVE"';
                $s = $pdo->prepare($sql);
                $s->bindValue(':admin_firstname', $_POST['admin_firstname']);
                $s->bindValue(':admin_middlename', $_POST['admin_middlename']);
                $s->bindValue(':admin_lastname', $_POST['admin_lastname']);
                $s->bindValue(':admin_username', $_POST['admin_username']);
                $s->bindValue(':admin_address', $_POST['admin_address']);
                $s->bindValue(':admin_contact', $_POST['admin_contact']);
                $s->bindValue(':admin_image', $userpic);
                $s->bindValue(':admin_email', $_POST['admin_email']);
                $s->execute();
                        
        }
        catch (PDOException $e)
        {
                $error = 'Error inserting Data' . $e->getMessage();
                include 'error.html.php';
                exit();
        }

        $admin_id = $pdo->lastInsertId();

        //PASSWORD ENCRYPTION
        if($_POST['admin_password'] != '')
        {
            $password = md5($_POST['admin_password'] . 'oggvs');
            try
            {
                $sql = 'UPDATE table_admin SET admin_password = :admin_password WHERE id = :id';
                $s = $pdo->prepare($sql);
                $s->bindValue(':admin_password', $password);
                $s->bindValue(':id', $admin_id);
                $s->execute();
            }
            catch (PDOException $e)
            {
                $error = 'Error password Setup';
                include 'error.html.php';
                exit();
            }
        }

        header('Location: .');
        exit();
        echo "<script>
                swal({
                title: 'Name Already Exists!', 
                text: 'Invalid input', 
                type: 'error', 
                confirmButtonText: 'Close'});
              </script>";
    }

    
}


//DELETE USER
if(isset($_GET['deleteuser']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php'; 
    $sidebardcolor = 'red';
    try
    {
        $result = $pdo->query('SELECT 
                                id, 
                                admin_username,
                                admin_userlevel,
                                admin_firstname,
                                admin_middlename,
                                admin_lastname,
                                admin_address,
                                admin_contact,
                                admin_image,
                                admin_created FROM 
                                table_admin WHERE 
                                admin_status="ACTIVE"');
    }
    catch (PDOException $e)
    {
        echo '<script>
                alert("Error Retrieving data from TABLE_ADMIN");
            </script>';
        include 'user.html.php';
        exit();
    }
    foreach ($result as $row)
    {
        $admin_details[] = array(
                                'id' => $row['id'], 
                                'admin_username' => $row['admin_username'], 
                                'admin_userlevel' => $row['admin_userlevel'], 
                                'admin_firstname' => $row['admin_firstname'], 
                                'admin_middlename' => $row['admin_middlename'], 
                                'admin_lastname' => $row['admin_lastname'], 
                                'admin_address' => $row['admin_address'], 
                                'admin_contact' => $row['admin_contact'] , 
                                'admin_image' => $row['admin_image'], 
                                'admin_created' => $row['admin_created']);
    }

    include 'delete.html.php';
    exit();

}

if(isset($_GET['deleteuserdetails']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'UPDATE table_admin SET
                                        admin_status = "DELETED"
                                        WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['deleteid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error = 'Error Deleting User Details';
        include 'error.html.php';
        exit();
    }
    
    header('Location: .');
    exit();
}


//VIEW USER
if(isset($_POST['viewaction']) and $_POST['viewaction'] = 'View')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT  id,
                        admin_username,
                        admin_userlevel,
                        admin_firstname,
                        admin_middlename,
                        admin_lastname,
                        admin_address,
                        admin_contact,
                        admin_image,
                        admin_email FROM
                        table_admin WHERE
                        id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['viewid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Fetching User Detail at Viewing");</script>';
        exit();
    }

    $row = $s->fetch();

    $sidebardcolor = 'blue';
    $admin_username = $row['admin_username'];
    $admin_userlevel = $row['admin_userlevel'];
    $admin_firstname = $row['admin_firstname'];
    $admin_middlename = $row['admin_middlename'];
    $admin_lastname = $row['admin_lastname'];
    $admin_address = $row['admin_address'];
    $admin_contact = $row['admin_contact'];
    $admin_image = $row['admin_image'];
    $admin_email = $row['admin_email'];

    include 'view.html.php';
    exit();
}



//RETRIEVING DATA FROM TABLE_ADMIN
include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php'; 

try
{
    $result = $pdo->query('SELECT 
                            id, 
                            admin_username,
                            admin_userlevel,
                            admin_firstname,
                            admin_middlename,
                            admin_lastname,
                            admin_address,
                            admin_contact,
                            admin_image,
                            admin_created FROM 
                            table_admin WHERE 
                            admin_status="ACTIVE"');
}
catch (PDOException $e)
{
    echo '<script>
            alert("Error Retrieving data from TABLE_ADMIN");
          </script>';
    include 'user.html.php';
    exit();
}
foreach ($result as $row)
{
    $admin_details[] = array(
                            'id' => $row['id'], 
                            'admin_username' => $row['admin_username'], 
                            'admin_userlevel' => $row['admin_userlevel'], 
                            'admin_firstname' => $row['admin_firstname'], 
                            'admin_middlename' => $row['admin_middlename'], 
                            'admin_lastname' => $row['admin_lastname'], 
                            'admin_address' => $row['admin_address'], 
                            'admin_contact' => $row['admin_contact'] , 
                            'admin_image' => $row['admin_image'], 
                            'admin_created' => $row['admin_created']);
}

include 'user.html.php';