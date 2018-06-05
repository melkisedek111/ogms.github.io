<?php

function dateSetting($adminid, $adminlevel)
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT COUNT(*) FROM table_admin
        WHERE admin_username =:admin_username AND admin_userlevel =:admin_userlevel AND admin_status = "Active"';
        $s = $pdo->prepare($sql);
        $s->bindValue(':admin_username', $adminid);
        $s->bindValue(':admin_userlevel', $adminlevel);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Fetching Admin Data at Settings");</script>';
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