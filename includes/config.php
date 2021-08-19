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
// $msg = '';
// if (isset($_POST['upload'])) {
//     //getiing file name
//     $image = $_FILES['image']['name'];

//     // valid extension
//     $valid_ext = array('png', 'jpeg', 'jpg');
//     $photoExt = @end(explode('.', $image));
//     $photoExt1 = strtolower($photoExt);

//     $new_img = time() . '.' . $photoExt1;

//     //location where image will be stored
//     $location = '../assets/images/' . $new_img;

//     // file extension
//     $file_extension = pathinfo($location, PATHINFO_EXTENSION);
//     $file_extension = strtolower($file_extension);

//     // check extension
//     if (in_array($file_extension, $valid_ext)) {

//         // compress image function call
//         compressedImage($_FILES['image']['tmp_name'], $location, 30);
//     } else {
//         echo "File format is not correct!";
//     }
// }
// // Compress Image function
// function compressedImage($source, $path, $quality)
// {
//     $info = getimagesize($source);

//     if ($info['mime'] == 'image/jpeg')
//         $image = imagecreatefromjpeg($source);
//     elseif ($info['mime'] == 'image/gif')
//         $image = imagecreatefromgif($source);
//     elseif ($info['mime'] == 'image/png')
//         $image = imagecreatefrompng($source);

//     imagejpeg($image, $path, $quality);
// }

// $stmt = $db->query("INSERT INTO banners (banner_path) VALUES ("$new_img")");
// if ($stmt) {
//     // move_uploaded_file($_FILES['image']['tmp_name'], $location);
//     $msg = 'Image uploaded Successfully!';
// } else {
//     $msg = 'Image Uplaod Failed!';
// }






//delete image
if (isset($_GET['delimg'])) {
    $stmt = $db->prepare('DELETE FROM banners WHERE banner_id=:banner_id');
    $stmt->execute(array(':banner_id' => $_GET['delimg']));
    header('location:add_view-banner.php ? action=deleted');

    exit();
}




$user = new User($db);
