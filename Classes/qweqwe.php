<?php

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
                WHERE student_number = :student_number AND userPassword = :userPassword and userLevel = "Student" AND user_status = "Activated"';
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
            $_SESSION['id'] = $row['id'];
            $_SESSION['userPassword'] = $userPassword;
            $_SESSION['schoolyear'] = $_POST['schoolyear'];
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
            unset($_SESSION['schoolyear']);
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
        unset($_SESSION['schoolyear']);
        session_destroy();
        
        header('Location: ../main/');
        exit();
    }

    session_start();
    if(isset($_SESSION['loggedin']))
    {
        return account1($_SESSION['user_name'],$_SESSION['userPassword']);
    }
}

function account1($userid, $userPassword)
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT COUNT(*) FROM table_student 
        INNER JOIN table_user_account ON table_user_account.userid = table_student.id
        WHERE student_number = :userid AND userPassword = :userPassword';
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