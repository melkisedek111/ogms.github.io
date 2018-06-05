<?php
include $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/magicquotes.inc.php';
if(isset($_POST['taecherlogin']) AND $_POST['taecherlogin'] == 'Teacher Login')
{
    
    header('Location: ../teacherPage/');
    exit();
}

if(isset($_POST['studentlogin']) AND $_POST['studentlogin'] == 'Student Login')
{
    
    header('Location: ../studentPage/');
    exit();
}

if(isset($_GET['admin']))
{
    header('Location: ../dashboard/');
    exit();
}

include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';

include 'main.php';