<?php
require_once("includes/config.php");
?>
<?php
// add comments in db

$msg = "";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $date = date("Y-m-d");

    $stmt = $db->query("INSERT INTO comments (cname, comment, cdate) VALUES ('$name', '$comment', '$date')");


    if ($stmt) {
        $msg = "Posted Successfully!";
    } else {
        $msg = "Failed to post comment!";
    }

    header('Location: index.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/main.css">

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 bg-light rounded mt-2">
                <h4 class="text-center p-2">Write your comment.</h4>
                <form action="" method="POST" class="p-2">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control rounder-0" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <textarea name="comment" class="form-control rounded-0" placeholder="Write your comment here." required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Post Comment">
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
                            <span class="font-italc"><?= $row['cname']; ?></span>
                            <span class="float-right font-italic"><?= $row['cdate'] ?></span>
                        </div>
                        <div class="card-body py-2">
                            <p class="card-text"><?= $row['comment'] ?></p>
                            <a href="javascript:void(0)" class="btn btn-info btn-sm float-right">
                                <span class="fa fa-thumbs-up" onclick="like_update('<?php echo $row['cid']; ?>')"> (<span id="like_loop_<?php echo $row['cid']; ?>"><?php echo $row['like_count'] ?></span>)</span>
                            </a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        function like_update(cid) {
            var curr_count = jQuery('#like_loop_' + cid).html();
            curr_count++;
            jQuery('#like_loop_' + cid).html(curr_count);
            jQuery.ajax({
                url: 'update_count.php',
                type: 'POST',
                data: 'type=like&cid=' + cid,
                success: function(result) {

                }
            })


        }
    </script>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>