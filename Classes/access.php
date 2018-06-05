<?php
//include $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/magicquotes.inc.php';



function user()
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    if(isset($_POST['loggedin']) and $_POST['loggedin'] == 'Login')
    {
        $userPassword = md5($_POST['userPassword']);
        if(account($_POST['accno'], $userPassword))
        {
            try
            {
                $sql = 'SELECT table_teacher.id as teacherid, teacher_number, teacher_firstname, teacher_middlename, teacher_lastname, teacher_type, table_subject.id as subjectid, subject_code, subject_title FROM table_teacher
                INNER JOIN table_teacher_subject ON table_teacher_subject.teacherid = table_teacher.id
                INNER JOIN table_subject ON table_subject.id = table_teacher_subject.subjectid
                INNER JOIN table_user_account ON table_user_account.userid = table_teacher.id
                WHERE teacher_number = :teacher_number AND userPassword = :userPassword and userLevel = "Teacher" AND teacher_status = "Active" AND user_status = "Activated"';
                $s = $pdo->prepare($sql);
                $s->bindValue(':teacher_number', $_POST['accno']);
                $s->bindValue(':userPassword', $userPassword);
                $s->execute();
            }
            catch(PDOException $e)
            {
                echo '<script>alert("Error");</script>';
            }

            $row = $s->fetch();
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['userno'] = $row['teacher_number'];
            $_SESSION['user_name'] = $row['teacher_firstname'] . ' ' . $row['teacher_middlename'] . ' ' . $row['teacher_lastname'];
            $_SESSION['user_type'] = $row['teacher_type'];
            $_SESSION['teacherid'] = $row['teacherid'];
            $_SESSION['userPassword'] = $userPassword;
            $_SESSION['schoolyear'] = $_POST['schoolyear'];
            $_SESSION['subjectid'] = $row['subjectid'];
            $_SESSION['subject_code'] = $row['subject_code'];
            $_SESSION['subject_title'] = $row['subject_title'];
            $_SESSION['fname'] = $row['teacher_firstname'];
            return true;

        }
        else
        {
            session_start();
            unset($_SESSION['loggedin']);
            unset($_SESSION['userno']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_type']);
            unset($_SESSION['teacherid']);
            unset($_SESSION['userPassword']);
            unset($_SESSION['schoolyear']);
            unset($_SESSION['subjectid']);
            unset($_SESSION['subject_code']);
            unset($_SESSION['subject_title']);
            unset($_SESSION['fname']);
            session_destroy();
            echo "<script>
            alert('Incorrect ID Number or Password!');
            </script>";
            return false;
        }
        

    }
    if(isset($_GET['logout']))
    {
        session_start();
        unset($_SESSION['loggedin']);
        unset($_SESSION['userno']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_type']);
        unset($_SESSION['teacherid']);
        unset($_SESSION['userPassword']);
        unset($_SESSION['schoolyear']);
        unset($_SESSION['subjectid']);
        unset($_SESSION['subject_code']);
        unset($_SESSION['subject_title']);
        unset($_SESSION['fname']);
        session_destroy();
        
        header('Location: ../main/');
        exit();
    }

    session_start();
    if(isset($_SESSION['loggedin']))
    {
        return account($_SESSION['userno'],$_SESSION['userPassword']);
    }
}


function account($userid, $userPassword)
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT COUNT(*) FROM table_teacher 
        INNER JOIN table_user_account ON table_user_account.userid = table_teacher.id
        WHERE teacher_number = :userid AND userPassword = :userPassword and userLevel = "Teacher" AND teacher_status = "Active" AND user_status = "Activated"';
        $s = $pdo->prepare($sql);
        $s->bindValue(':userid', $userid);
        $s->bindValue(':userPassword', $userPassword);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error teacher");</script>';
    }
    $row = $s->fetch();
    if($row[0] > 0)
    {
        return true;
    }
    else
    {
        return false;
    }
}


function level($userLevel)
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT COUNT(*) FROM table_teacher 
        INNER JOIN table_user_account ON table_user_account.userid = table_teacher.id
        WHERE teacher_number = :userid and userLevel = :userLevel';
        $s = $pdo->prepare($sql);
        $s->bindValue(':userid', $_SESSION['userno']);
        $s->bindValue(':userLevel', $userLevel);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error teacher level");</script>';
    }
    $row = $s->fetch();
    if($row[0] > 0)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}












function user1()
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    if(isset($_POST['loggedin']) and $_POST['loggedin'] == 'Login')
    {
        $userPassword = md5($_POST['userPassword']);
        if(account1($_POST['accno'], $userPassword))
        {
            try
            {
                $sql = 'SELECT id, student_number, student_firstname, student_middlename, student_lastname, student_type FROM table_student
                INNER JOIN table_user_account ON table_user_account.userid = table_student.id
                WHERE student_number = :student_number AND userPassword = :userPassword and userLevel = "Student" AND student_status = "Active" AND user_status = "Activated"';
                $s = $pdo->prepare($sql);
                $s->bindValue(':student_number', $_POST['accno']);
                $s->bindValue(':userPassword', $userPassword);
                $s->execute();
            }
            catch(PDOException $e)
            {
                echo '<script>alert("Error");</script>';
            }

            $row = $s->fetch();
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['userno'] = $row['student_number'];
            $_SESSION['user_name'] = $row['student_firstname'] . ' ' . $row['student_middlename'] . ' ' . $row['student_lastname'];
            $_SESSION['user_type'] = $row['student_type'];
            $_SESSION['studentid'] = $row['id'];
            $_SESSION['userPassword'] = $userPassword;
            $_SESSION['schoolyear'] = $_POST['schoolyear'];
            $_SESSION['fname'] = $row['student_firstname'];
            return true;
            
        }
        else
        {
            session_start();
            unset($_SESSION['loggedin']);
            unset($_SESSION['userno']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_type']);
            unset($_SESSION['studentid']);
            unset($_SESSION['userPassword']);
            unset($_SESSION['schoolyear']);
            unset($_SESSION['fname']);
            session_destroy();
            echo "<script>
            alert('Incorrect ID Number or Password!');
            </script>";
            return false;
        }
        

    }
    if(isset($_GET['logout']))
    {
        session_start();
        unset($_SESSION['loggedin']);
        unset($_SESSION['userno']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_type']);
        unset($_SESSION['studentid']);
        unset($_SESSION['userPassword']);
        unset($_SESSION['schoolyear']);
        unset($_SESSION['fname']);
        session_destroy();
        
        header('Location: ../main/');
        exit();
    }

    session_start();
    if(isset($_SESSION['loggedin']))
    {
        return account1($_SESSION['userno'],$_SESSION['userPassword']);
    }
}

function account1($userid, $userPassword)
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT COUNT(*) FROM table_student 
        INNER JOIN table_user_account ON table_user_account.userid = table_student.id
        WHERE student_number = :userid AND userPassword = :userPassword and userLevel = "Student" AND student_status = "Active" AND user_status = "Activated"';
        $s = $pdo->prepare($sql);
        $s->bindValue(':userid', $userid);
        $s->bindValue(':userPassword', $userPassword);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error");</script>';
    }
    $row = $s->fetch();
    if($row[0] > 0)
    {
        return true;
    }
    else
    {
        return false;
    }
}


function level1($userLevel)
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT COUNT(*) FROM table_student 
        INNER JOIN table_user_account ON table_user_account.userid = table_student.id
        WHERE student_number = :userid and userLevel = :userLevel';
        $s = $pdo->prepare($sql);
        $s->bindValue(':userid', $_SESSION['userno']);
        $s->bindValue(':userLevel', $userLevel);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error teacher level");</script>';
    }
    $row = $s->fetch();
    if($row[0] > 0)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}








function user2()
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    if(isset($_POST['loggedin']) and $_POST['loggedin'] == 'Login')
    {
        $userPassword = md5($_POST['userPassword']);
        if(account2($_POST['accno'], $userPassword))
        {
            try
            {
                $sql = 'SELECT id, admin_username, admin_firstname, admin_middlename, admin_lastname, admin_userlevel FROM table_admin
                WHERE admin_username = :admin_username AND admin_password = :admin_password and admin_status = "Active"';
                $s = $pdo->prepare($sql);
                $s->bindValue(':admin_username', $_POST['accno']);
                $s->bindValue(':admin_password', $userPassword);
                $s->execute();
            }
            catch(PDOException $e)
            {
                echo '<script>alert("Error Fetching Admin Data at Admin Login");</script>';
            }

            $row = $s->fetch();

            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['userno'] = $_POST['accno'];
            $_SESSION['user_name'] = $row['admin_firstname'] . ' ' . $row['admin_middlename'] . ' ' . $row['admin_lastname'];
            $_SESSION['user_type'] = $row['admin_userlevel'];
            $_SESSION['fname'] = $row['admin_firstname'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['userPassword'] = $userPassword;
            return true;
            
        }
        
        else
        {
            session_start();
            unset($_SESSION['loggedin']);
            unset($_SESSION['userno']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_type']);
            unset($_SESSION['id']);
            unset($_SESSION['userPassword']);
            unset($_SESSION['fname']);
            session_destroy();
            echo "<script>
            alert('Incorrect ID Number or Password!');
            </script>";
            return false;
        }
        
    }
    if(isset($_GET['logout']))
    {
        session_start();
        unset($_SESSION['loggedin']);
        unset($_SESSION['userno']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_type']);
        unset($_SESSION['id']);
        unset($_SESSION['userPassword']);
        unset($_SESSION['fname']);
        session_destroy();
        
        header('Location: ../main/');
        exit();
    }
    session_start();
    if(isset($_SESSION['loggedin']))
    {
        return account2($_SESSION['userno'],$_SESSION['userPassword']);
    }
}

function account2($userid, $userPassword)
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT COUNT(*) FROM table_admin 
        WHERE admin_username = :admin_username AND admin_password = :admin_password AND admin_status = "Active"';
        $s = $pdo->prepare($sql);
        $s->bindValue(':admin_username', $userid);
        $s->bindValue(':admin_password', $userPassword);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Errorqwqw");</script>';
    }
    $row = $s->fetch();
    if($row[0] > 0)
    {
        return true;
    }
    else
    {
        return false;
    }
}