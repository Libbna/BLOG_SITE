<?php
require_once('../includes/config.php');

if (!$user->is_logged_in()) {
    $_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
    header('location: ../components/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-View Banner</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../assets/sass/utilities/main.css">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
</head>

<script type="text/javascript">
    function delimg(id, path) {
        if (confirm("Are you sure you want to delete an image?")) {
            window.location.href = 'add_view-banner.php ? delimg=' + id;
        }
    }
</script>

<body>
    <?php
    include("../layouts/header.php");
    ?>
    <!-- to delete image -->
    <?php if (isset($_REQUEST['action'])) { ?>
        <?php if ($_REQUEST['action'] == "deleted") { ?>
            <div class="alert alert-danger" role="alert">
                Image has been deleted successfuly!
            </div>
        <?php } ?>
    <?php } ?>

    <!-- Add new banner form -->
    <div class="container-fluid banner-form mt-4">
        <div class="banner-row row justify-content-center">
            <div class="banner-col col-lg-4 bg-light rounded px-4">
                <h4 class="text-center text-light p-1">Select Image to Upload!</h4>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" name="image" class="form-control p-1" required>
                    </div>

                    <!-- Button to upload image -->
                    <div class="form-group">
                        <input type="submit" name="upload" class="btn btn-primary btn-block" value="Upload Image">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- fetching from databse -->
    <div class="conatiner-fluid banner-gallery">
        <div class="row mt-5 gallery">
            <div class="col recorder-gallery">
                <?php
                $result = $db->query("SELECT banner_id, banner_path FROM banners ORDER BY banner_id DESC");
                while ($row = $result->fetch()) {
                    $img = "../assets/images/resized_" . $row['banner_path'];
                ?>
                    <img class="draggable-item img-fluid" src="<?= $img; ?>" alt="image">

                    <a id="trash" type="button" class="btn btn-danger" role="button" href="javascript:delimg('<?php echo $row['banner_id']; ?>','<?php echo $img; ?>')">
                        <i class="fa fa-trash"></i>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    include("../layouts/footer.php");
    ?>










    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>