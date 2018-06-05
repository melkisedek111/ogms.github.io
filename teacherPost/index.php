<?php
include $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/includes/magicquotes.inc.php';


include $_SERVER['DOCUMENT_ROOT'] . '/OGGVSv3/classes/access.php';
if(!user())
{
    $headerColor = 'danger';
    $title = 'TEACHER LOGIN';
    $bg = 'teacherbg';
    include '../login/index.php';
    exit();
}

if(!level('Teacher'))
{
    $headerColor = 'danger';
    $title = 'TEACHER LOGIN';
    $bg = 'teacherbg';
    include '../login/index.php';
    exit();
}

if(isset($_POST['postUpdate']) and $_POST['postUpdate'] == 'Update Post')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT * FROM table_teacher_post WHERE teacherid = :teacherid AND id = :postid AND sectionid = :sectionid';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_SESSION['teacherid']);
        $s->bindValue(':postid', $_POST['postid']);
        $s->bindValue(':sectionid', $_POST['sectionid']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Fetching Post Data for updating");</script>';
    }
    $row = $s->fetch();
    $postid = $_POST['postid'];
    $postTitle = $row['post_title'];
    $postCategory = $row['post_category'];
    $postMessage = $row['post_message'];
    $name='updatepost';
    $value='Update Post';
    include 'addpost.html.php';
    exit();
}

if(isset($_POST['updatepost']) and $_POST['updatepost'] == 'Update Post')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'UPDATE table_teacher_post SET
        post_title = :post_title,
        post_category = :post_category,
        post_message = :post_message
        WHERE id = :postid';
        $s = $pdo->prepare($sql);
        $s->bindValue(':post_title', $_POST['post_title']);
        $s->bindValue(':post_category', $_POST['post_category']);
        $s->bindValue(':post_message', $_POST['post_message']);
        $s->bindValue(':postid', $_POST['postid']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Updating Post Data");</script>';
    }
    header('Location: ../teacherPost/');
    exit();
}

if(isset($_POST['addpost']) and $_POST['addpost'] == 'Submit Post')
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'INSERT INTO table_teacher_post SET
        teacherid = :teacherid,
        sectionid = :sectionid,
        post_title = :post_title,
        post_category = :post_category,
        post_message = :post_message,
        schoolyear = :schoolyear,
        datecreated = CURRENT_TIMESTAMP()';  
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_SESSION['teacherid']);
        $s->bindValue(':sectionid', $_POST['sectionid']);
        $s->bindValue(':post_title', $_POST['post_title']);
        $s->bindValue(':post_category', $_POST['post_category']);
        $s->bindValue(':post_message', $_POST['post_message']);
        $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error Inserting Teacher Post Section Data");</script>';
    }
    header('Location: ../teacherPost');
    exit();
}


if(Isset($_POST['section']) and $_POST['section'] == 'Add Post')
{

    $sectionid = $_POST['sectionid'];
    $postTitle = '';
    $postCategory = '';
    $postMessage = '';
    $name='addpost';
    $value='Submit Post';
    include 'addpost.html.php';
    exit();
}


if(isset($_GET['addpost']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';
    try
    {
        $sql = 'SELECT table_section.id as sectionid, section_name, section_year FROM table_section
        INNER JOIN table_teacher_section ON table_teacher_section.sectionid = table_section.id
        WHERE teacherid = :teacherid AND section_status = "Active" AND schoolyear = :schoolyear';
        $s = $pdo->prepare($sql);
        $s->bindValue(':teacherid', $_SESSION['teacherid']);
        $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        echo '<script>alert("Error fetching Section Data");</script>';
    }
    foreach($s as $row)
    {
        $sections[] = array(
                            'sectionid' => $row['sectionid'],
                            'section_name' => $row['section_name'],
                            'section_year' => $row['section_year']
                        );
    }
    include 'setsection.html.php';
    exit();
}

include $_SERVER['DOCUMENT_ROOT'] . '/oggvsv3/includes/db.inc.php';

try
{
    $sql = 'SELECT table_teacher_post.id as postid, table_section.id as sectionid, section_name, section_year, post_title, post_category, post_message,datecreated FROM table_teacher_post INNER JOIN table_section ON table_section.id = table_teacher_post.sectionid INNER JOIN table_teacher ON table_teacher.id = table_teacher_post.teacherid WHERE schoolyear = :schoolyear AND teacherid = :teacherid';
    $s = $pdo->prepare($sql);
    $s->bindValue(':teacherid', $_SESSION['teacherid']);
    $s->bindValue(':schoolyear', $_SESSION['schoolyear']);
    $s->execute();

}
catch(PDOException $e)
{
    echo '<script>alert("Error Fetching Teacher Post Section Data");</script>';
}
foreach($s as $row)
{
    $posts[] = array(
        'postid' => $row['postid'],
        'section_name' => $row['section_name'],
        'section_year' => $row['section_year'],
        'post_title' => $row['post_title'],
        'post_category' => $row['post_category'],
        'post_message' => $row['post_message'],
        'datecreated' => $row['datecreated'],
        'sectionid' => $row['sectionid']
    );
}

include 'post.html.php';