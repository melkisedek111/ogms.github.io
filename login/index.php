<?php
include $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/magicquotes.inc.php';



include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
try
{
    $setSchoolYear = $pdo->query('SELECT * FROM table_school_year WHERE schoolyear_status = "Set"');
}
catch (PDOException $e)
 {
    echo '<script>alert("Error Fetching School Year");</script>';
}

$row = $setSchoolYear->fetch();

$schoolyear = $row['schoolyear'];


include 'login.php';