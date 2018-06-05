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
//*********************************************************************************************/
// Change password
if(isset($_POST['passwordChange']) and $_POST['passwordChange'] == 'Change')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    $userPassword = md5($_POST['userPassword']);
    try
    {
        $sql = 'UPDATE table_user_account SET userPassword = :userPassword, actualPassword = :actualPassword WHERE userid = :userid and userLevel = "Student"';
        $s = $pdo->prepare($sql);
        $s->bindValue(':userPassword', $userPassword);
        $s->bindValue(':actualPassword', $_POST['userPassword']);
        $s->bindValue(':userid', $_POST['userid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Updating Password for Teacher User");<script>';
    }
    header('Location: ../studentAccount');
    exit();
}

if(isset($_POST['changePassword']) and $_POST['changePassword'] == 'Change Password')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT student_firstname, student_middlename, student_lastname, student_type FROM table_student
        INNER JOIN table_user_account ON table_user_account.userid = table_student.id AND table_user_account.userLevel = table_student.student_type
        WHERE table_user_account.userid = :userid';
        $s = $pdo->prepare($sql);
        $s->bindValue(':userid', $_POST['userid']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Fetching Teacher Details ' . $e->getMessage() . '");</script>';
    }
    $row = $s->fetch();
    $studentFirstname = $row['student_firstname'];
    $studentMiddlename = $row['student_middlename'];
    $studentLastname = $row['student_lastname'];
    $studentType = $row['student_type'];
    $userid = $_POST['userid'];

    include 'accountForm.html.php';
    exit();
}


//*************************************************************************************************************************** */
// DEACTIVATE
if(isset($_POST['Deactivated']) and $_POST['Deactivated'] == 'Deactivate')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'UPDATE table_user_account SET user_status = "Deactivated" WHERE userid = :userid AND userLevel = "Student"';
        $s = $pdo->prepare($sql);
        $s->bindValue(':userid', $_POST['userid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Deactivating Teacher Details ' . $e->getMessage() . '");</script>';
    }

    header('Location: ../accounts');
    exit();

}

if(isset($_POST['Activated']) and $_POST['Activated'] == 'Activate')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'UPDATE table_user_account SET user_status = "Activated" WHERE userid = :userid AND userLevel = "Student"';
        $s = $pdo->prepare($sql);
        $s->bindValue(':userid', $_POST['userid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Deactivating Teacher Details ' . $e->getMessage() . '");</script>';
    }

    header('Location: ../accounts');
    exit();

}






include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';

try
{
    $results = $pdo->query('SELECT id, student_number, student_firstname, student_middlename, student_lastname, actualPassword, user_status FROM table_student
    INNER JOIN table_user_account ON table_user_account.userid = table_student.id AND table_user_account.userLevel = table_student.student_type
    WHERE student_status = "Active"');
}
catch (PDOException $e)
{   
    echo '<script>alert("Error fetching Student User");<script>';
}
foreach($results as $row)
{
    $userStudents[] = array(
                            'id' => $row['id'],
                            'student_number' => $row['student_number'],
                            'student_firstname' => $row['student_firstname'],
                            'student_middlename' => $row['student_middlename'],
                            'student_lastname' => $row['student_lastname'],
                            'actualPassword' => $row['actualPassword'],
                            'user_status' => $row['user_status']
    );
}

include 'studentAccount.html.php';