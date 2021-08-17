<?php
ob_start();
session_start();
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'blogdb');

$db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// date_default_timezone_set('Asia/Kolkata');

function __autoload($class)
{
    $class = strtolower($class);

    $classpath = 'classes/class.' . $class . '.php';
    if (file_exists($classpath)) {
        require_once $classpath;
    }

    $classpath = '../classes/class.' . $class . '.php';
    if (file_exists($classpath)) {
        require_once $classpath;
    }

    $classpath = '../../classes/class.' . $class . '.php';
    if (file_exists($classpath)) {
        require_once $classpath;
    }
}

// add-blog-article ---> create new blog


// admin/index --> dashboard --> to delete a blog
if (isset($_GET['delpost'])) {
    $stmt = $db->prepare('DELETE FROM article WHERE articleID=:articleID');
    $stmt->execute(array(':articleID' => $_GET['delpost']));
    header('location:index.php ? action=deleted');
    exit();
}

//image uplaod
$msg = '';
if (isset($_POST['upload'])) {
    $image = $_FILES['image']['name'];
    $path = '../assets/images/' . $image;

    $stmt = $db->query("INSERT INTO banners (banner_path) VALUES ('$path')");
    if ($stmt) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
        $msg = 'Image uploaded Successfully!';
    } else {
        $msg = 'Image Uplaod Failed!';
    }
}

//delete image
if (isset($_GET['delimg'])) {
    $stmt = $db->prepare('DELETE FROM banners WHERE banner_id=:banner_id');
    $stmt->execute(array(':banner_id' => $_GET['delimg']));
    header('location:add_view-banner.php ? action=deleted');

    exit();
}




$user = new User($db);
