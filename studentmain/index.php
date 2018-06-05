<?php
include $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/magicquotes.inc.php';

include $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/classes/access.php';
if(!user1())
{
    $headerColor = 'info';
    $title = 'STUDENT LOGIN';
    $bg = 'studentbg';
    include '../login/index.php';
    exit();
}

if(!level1('Student'))
{
    $headerColor = 'info';
    $title = 'STUDENT LOGIN';
    $bg = 'studentbg';
    include '../login/index.php';
    exit();
}


include 'studentmain.html.php';