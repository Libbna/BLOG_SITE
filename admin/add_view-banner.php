<?php
require_once('../includes/config.php');

if (!$user->is_logged_in()) {
    header('location: login.php');
}

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

        resize_image($_FILES['image']['tmp_name'], $location, "500");

        // Insert query
        // $stmt = $db->query("INSERT INTO banners (banner_path) VALUES ':$new_img'");
        $stmt = $db->query("INSERT INTO banners (banner_path) VALUES ('$new_img')");

        // move_uploaded_file($_FILES['image']['tmp_name'], $location);
        if ($stmt) {
            echo "Image uploaded successfully";
        } else {
            echo "Image Uplaod Failed!";
        }
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




?>
<?php include("./header.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./assets/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<script type="text/javascript">
    function delimg(id, path) {
        if (confirm("Are you sure you want to delete an image?")) {
            window.location.href = 'add_view-banner.php ? delimg=' + id;
        }
    }
</script>

<style>
    body {
        overflow-y: auto;
    }
</style>

<body>



    <!-- to delete image -->
    <?php if (isset($_REQUEST['action'])) { ?>
        <?php if ($_REQUEST['action'] == "deleted") { ?>
            <div class="alert alert-danger" role="alert">
                Image has been deleted successfuly!
            </div>
        <?php } ?>
    <?php } ?>

    <!-- Add new banner form -->
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-4 bg-dark rounded px-4">
                <h4 class="text-center text-light p-1">Select Image to Upload!</h4>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" name="image" class="form-control p-1" required>
                    </div>

                    <!-- Button to upload image -->
                    <div class="form-group">
                        <input type="submit" name="upload" class="btn btn-warning btn-block" value="Upload Image">
                    </div>
                    <!-- <div class="form-group">
                        <h5 class="text-center text-white"><?php echo $msg; ?></h5>
                    </div> -->
                </form>
            </div>
        </div>
    </div>

    <form class="ml-5 mt-3" action="" method="POST" enctype="multipart/form-data">
        <table>
            <thead>
                <tr>
                    <th>IMAGE</th>
                </tr>
            </thead>
            <?php
            $result = $db->query("SELECT banner_id, banner_path FROM banners ORDER BY banner_id DESC");
            while ($row = $result->fetch()) {
                $img = $row['banner_path'];
            ?>
                <tr>
                    <td>
                        <img src="<?= $img; ?>" alt="image">
                        <a id="trash" type="button" class="btn btn-danger ml-5" role="button" href="javascript:delimg('<?php echo $row['banner_id']; ?>','<?php echo $img; ?>')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>

                </tr>

            <?php
            }
            ?>
        </table>
    </form>




    <!-- <div class="card" style="width: 22rem;">
        <img style="height: 150px;" class="card-img-top" src="/assets/images/samosa.png" alt="Card image cap">
    </div>
    <div class="card" style="width: 22rem;">
        <img style="height: 150px;" class="card-img-top" src="/assets/images/samosa.png" alt="Card image cap">
    </div> -->





    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>