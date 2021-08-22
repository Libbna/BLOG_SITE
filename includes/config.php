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



// upload resize image
if (isset($_POST['upload'])) {
    // getting file name
    $filename = $_FILES['image']['name'];

    // valid extension
    $valid_ext = array('png', 'jpeg', 'jpg');

    $photoExt1 = @end(explode('.', $filename));
    $phototest1 = strtolower($photoExt1);

    // creating new image name of numbers
    $new_img = time() . '.' . $phototest1;
    // location
    $location = '../assets/images/' . $new_img;

    // file extension
    $file_extension = pathinfo($location, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);

    // check extension
    if (in_array($file_extension, $valid_ext)) {

        // compress Image function declare
        // compressedImage($_FILES['image']['tmp_name'], $location, 50);
        $stmt = $db->query("INSERT INTO banners (banner_path) VALUES ('$new_img')");
        if ($stmt) {
            echo "<div class='alert alert-info' role='alert'>
            Image has been uploaded successfuly! </div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>
            Image upload failed! </div>";
        }


        resize_image($_FILES['image']['tmp_name'], $location, "500");
        // Insert query
        // $stmt = $db->query("INSERT INTO banners (banner_path) VALUES ':$new_img'");
        // $stmt = $db->query("INSERT INTO banners (banner_path) VALUES ('$new_img')");

        // move_uploaded_file($_FILES['image']['tmp_name'], $location);


    } else {
        echo "File format is not correct!";
    }
}

// compress Image function definition
function resize_image($source, $path, $max_res)
{
    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);
    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);

    //resolution
    $original_width = imagesx($image);
    $original_height = imagesy($image);

    //width
    $ratio = $max_res / $original_width;
    $new_width = $max_res;
    $new_height = $original_height * $ratio;

    // if that didn't work
    if ($new_height > $max_res) {
        $ratio = $max_res / $original_height;
        $new_height = $max_res;
        $new_width = $original_width * $ratio;
    }

    if ($image) {
        $new_image = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);
    }

    imagejpeg($new_image, $path, 90);

    // echo "<img src = '$new_image'>" ;
}





//delete image
if (isset($_GET['delimg'])) {
    $stmt = $db->prepare('DELETE FROM banners WHERE banner_id=:banner_id');
    $stmt->execute(array(':banner_id' => $_GET['delimg']));
    header('location:add_view-banner.php ? action=deleted');

    exit();
}




$user = new User($db);
