<?php
    try
    {
        $pdo = new PDO('mysql:host=localhost;dbname=dboggvs','root','admin1234');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES "utf8"');
    }
    catch(PDOException $e)
    {
        $error = 'Unable to connect to the database: ' . $e->getMessage();
        echo '<script>alert("$error");</script>';
        exit();

    }

