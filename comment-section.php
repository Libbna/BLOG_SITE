<?php
require_once("includes/config.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/main.css">

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 bg-light rounded mt-2">
                <h4 class="text-center p-2">Write your comment.</h4>
                <form action="" method="POST" class="p-2">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control rounder-0" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <textarea name="comment" class="form-control rounded-0" placeholder="Write your comment here." required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary rounded-0" value="Comment">
                        <h5 class="float-right text-success p-2"><?= $msg; ?></h5>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-5 rounded bg-light p-3">
                <?php
                $stmt = $db->query('SELECT * FROM comments ORDER BY cid DESC');
                // $result = $stmt->fetch();
                while ($row = $stmt->fetch()) {
                ?>
                    <div class="card mb-2 border-secondary">
                        <div class="card-header bg-secondary py-1 text-light">
                            <span class="font-italc">Posted By : <?= $row['name']; ?></span>
                            <span class="float-right font-italic"><?= $row['date'] ?></span>
                        </div>
                        <div class="card-body py-2">
                            <p class="card-text"><?= $row['comment'] ?></p>
                        </div>
                        <!-- <div class="card-footer float-right"></div> -->
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>











    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>