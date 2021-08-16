<?php
$msg = '';
if (isset($_POST['upload'])) {
    $image = $_FILES['image']['name'];
    $path = 'assets/images/' . $image;

    $stmt = $db->query("INSERT INTO banners (banner_path) VALUES ('$path')");
    if ($stmt) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
        $msg = 'Image uploaded Successfully!';
    } else {
        $msg = 'Image Uplaod Failed!';
    }
}

$result = $db->query("SELECT banner_path FROM banners");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> -->


</head>

<body>

    <div class="carousel">
        <!-- Carousel Images -->
        <?php
        $i = 0;
        foreach ($result as $row) {
            $active = '';
            if ($i == 0) {
                $active = 'carousel__item--visible';
            }
        ?>
            <div class="carousel__item <?= $active; ?>">
                <img src="<?= $row['banner_path']; ?>" width="100%">
            </div>

        <?php $i++;
        } ?>
        <!-- <div class="carousel__item">
            <img src="./assets/images/banner2.png" alt="">
        </div>
        <div class="carousel__item">
            <img src="./assets/images/banner3.png" alt="">
        </div> -->

        <!-- Next and Previous Buttons -->
        <div class="carousel__actions">
            <a id="carousel__button--prev" class="slide-out" aria-label="previous-slide">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a id="carousel__button--next" aria-label="next-slide">
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <!-- Add new banner form -->
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="file" name="image" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="submit" name="upload" class="btn btn-block" value="Add Banner">
        </div>
        <div class="form-group">
            <h5 style="color: black;"><?php echo $msg; ?></h5>
        </div>
    </form>



    <script src="./assets/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>

</html>