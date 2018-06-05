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

//********************************************************************************* */

// ADD SECTION

if(isset($_GET['addform']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT section_year, section_name FROM table_section WHERE section_status = "Active" AND section_year = :section_year AND section_name = :section_name';
        $s = $pdo->prepare($sql);
        $s->bindValue(':section_year', $_POST['section_year']);
        $s->bindValue(':section_name', $_POST['section_name']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Selecting Section data");</script>';
    }
    
    $sectionData = $s->fetch();


    if($sectionData > 0)
    {
        $backform = '.';
        $headercardcolor = 'blue';
        $title = 'Add Section Details';
        $action = 'addform';
        $section_year = '';
        $section_name = '';
        $section_id = '';
        $buttoncolor = 'info';
        $button = 'Add Section';

        include 'form.html.php';
        echo "<script>
                swal({
                title: 'Section Already Exists!', 
                text: 'Invalid input', 
                type: 'error', 
                confirmButtonText: 'Close'});
              </script>";
        exit();
    }
    else
    {
        try
        {
            $sql = 'INSERT INTO table_section SET   section_year = :section_year,
                                                    section_name = :section_name,
                                                    section_status = "Active"';
            $s = $pdo->prepare($sql);
            $s->bindValue(':section_year', $_POST['section_year']);
            $s->bindValue(':section_name', $_POST['section_name']);
            $s->execute();
        }
        catch (PDOException $e)
        {
            echo '<script>alert("Error Inserting Section data");</script>';
        }
    }
    
    header('Location: .');
    exit();
}

if(isset($_GET['addsection']))
{
    $backform = '.';
    $headercardcolor = 'blue';
    $title = 'Add Section Details';
    $action = 'addform';
    $section_year = '';
    $section_name = '';
    $section_id = '';
    $buttoncolor = 'info';
    $button = 'Add Section';

    include 'form.html.php';
    exit();
}

//********************************************************************************* */


//********************************************************************************* */

//EDIT SECTION
if(isset($_POST['editdata']) and $_POST['editdata'] == 'Edit')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT id, section_year, section_name FROM table_section WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['sectionid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Erro fetching Section data");</script>';
    }
    $row = $s->fetch();

    $backform = '?editsection';
    $headercardcolor = 'green';
    $title = 'Edit Section Details';
    $action = 'editform';
    $section_year = $row['section_year'];
    $section_name = $row['section_name'];
    $section_id = $row['id'];
    $buttoncolor = 'success';
    $button = 'Edit Section';

    include 'form.html.php';
    exit();

}

if(isset($_GET['editform']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT section_year, section_name FROM table_section WHERE section_status = "Active" AND section_year = :section_year AND section_name = :section_name';
        $s = $pdo->prepare($sql);
        $s->bindValue(':section_year', $_POST['section_year']);
        $s->bindValue(':section_name', $_POST['section_name']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Error Selecting Section data");</script>';
    }
    
    $sectionData = $s->fetch();


    if($sectionData > 0)
    {
        try
        {
            $sql = 'SELECT id, section_year, section_name FROM table_section WHERE id = :id';
            $s = $pdo->prepare($sql);
            $s->bindValue(':id', $_POST['sectionid']);
            $s->execute();
        }
        catch (PDOException $e)
        {
            echo '<script>alert("Erro fetching Section data");</script>';
        }
        $row = $s->fetch();

        $backform = '?editsection';
        $headercardcolor = 'green';
        $title = 'Edit Section Details';
        $action = 'editform';
        $section_year = $row['section_year'];
        $section_name = $row['section_name'];
        $section_id = $row['id'];
        $buttoncolor = 'success';
        $button = 'Edit Section';

        include 'form.html.php';
        echo "<script>
                swal({
                title: 'Section Already Exists!', 
                text: 'Invalid input', 
                type: 'error', 
                confirmButtonText: 'Close'});
              </script>";
        exit();
    }
    else
    {
        try
        {
            $sql = 'UPDATE table_section SET    section_year = :section_year,
                                                section_name = :section_name WHERE
                                                id = :id';
            $s = $pdo->prepare($sql);
            $s->bindValue(':section_year', $_POST['section_year']);
            $s->bindValue(':section_name', $_POST['section_name']);
            $s->bindValue(':id', $_POST['sectionid']);
            $s->execute();
        }
        catch (PDOException $e)
        {
            echo '<script>alert("Erro Updating Section data");</script>';
        }
        
    }
    
    header('Location: .');
    exit();
}



if(isset($_GET['editsection']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
// RETRIEVING SUBJECT DETAILS

    try
    {
        $result = $pdo->query('SELECT   id,
                                        section_year,
                                        section_name FROM
                                        table_section WHERE
                                        section_status = "Active"');
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Erro fetching Section data");</script>';
    }

    foreach($result as $row)
    {
        $section_details[] = array(
                                    'id' => $row['id'],
                                    'section_year' => $row['section_year'],
                                    'section_name' => $row['section_name']
                                    );
    }

    include 'edit.html.php';
    exit();
}

//********************************************************************************** */

//********************************************************************************** */

// DELETE DATA

if(isset($_POST['deletedata']) and $_POST['deletedata'] == 'Delete')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';

    try
    {
        $sql = 'UPDATE table_section SET    section_status = "Delete" WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['sectionid']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Erro Deleting Section data' . $e->getMessage();'");</script>';
    }
    
    header('Location: .');
    exit();

}




if(isset($_GET['deletesection']))
{

    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $result = $pdo->query('SELECT   id,
                                        section_year,
                                        section_name FROM
                                        table_section WHERE
                                        section_status = "Active"');
    }
    catch (PDOException $e)
    {
        echo '<script>alert("Erro fetching Section data");</script>';
    }

    foreach($result as $row)
    {
        $section_details[] = array(
                                    'id' => $row['id'],
                                    'section_year' => $row['section_year'],
                                    'section_name' => $row['section_name']
                                    );
    }

    include 'delete.html.php';
    exit();

}


















//********************************************************************************* */
include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
// RETRIEVING SECTION DETAILS

try
{
    $result = $pdo->query('SELECT   id,
                                    section_year,
                                    section_name FROM
                                    table_section WHERE
                                    section_status = "Active"');
}
catch (PDOException $e)
{
    echo '<script>alert("Erro fetching Section data");</script>';
}

foreach($result as $row)
{
    $section_details[] = array(
                                'id' => $row['id'],
                                'section_year' => $row['section_year'],
                                'section_name' => $row['section_name']
                                );
}


include 'section.html.php';