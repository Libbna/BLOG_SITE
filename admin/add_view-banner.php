<?php include("./header.php"); ?>
<?php
require_once('../includes/config.php');

if (!$user->is_logged_in()) {
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="/assets/main.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

    .container {
        width: 600px;
        margin: 20px auto;
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



    <!-- fetching from databse -->
    <!-- <div class="rg_btn w3-button w3-indigo" data-rg="btnsr">Shuffle</div> -->
    <div class="row mt-5">
        <div class="col droppable-area1 connected-sortable">
            <?php
            $result = $db->query("SELECT banner_id, banner_path FROM banners ORDER BY banner_id DESC");
            while ($row = $result->fetch()) {

                $img = "../assets/images/resized_" . $row['banner_path'];
                // $img = $row['banner_path'];
                // echo $img;
            ?>

                <img class="draggable-item" src="<?= $img; ?>" alt="image">
                <a id="trash" type="button" class="btn btn-danger ml-5" role="button" href="javascript:delimg('<?php echo $row['banner_id']; ?>','<?php echo $img; ?>')">
                    <i class="fa fa-trash"></i>
                </a>



            <?php
            }
            ?>
        </div>
    </div>

    <script>
        $(init);

        function init() {
            $(".droppable-area1").sortable({
                connectWith: ".connected-sortable",
                stack: '.connected-sortable .col'
            }).disableSelection();
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>










    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>