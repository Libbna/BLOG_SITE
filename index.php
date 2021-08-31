<?php
require_once("includes/config.php");
$stmt = $db->query('SELECT * FROM article ORDER BY articleID DESC');


?>

<title>Blog Site</title>
<?php
include("./header.php");

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<link href="./assets/main.css" rel="stylesheet" type="text/css">

<!-- Banner Section -->
<?php include('banner.php') ?>

<!--Main Section  -->

<div class="container mt-5">

    <?php
    try {
        //selecting data through ID
        while ($row = $stmt->fetch()) { ?>
            <div class="card">
                <div class="card-header">
                    <?php echo $row['articleTitle']; ?>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p><?php echo $row['articleDesc']; ?></p>
                        <footer class="footer">
                            <?php echo $row['articleAuthor']; ?>
                        </footer>

                        <?php
                        echo '<a href="http://blogsite.com//admin/view-article.php?id=' . $row['articleID'] . '">Read More </a>';
                        ?>
                        <a href="javascript:void(0)" class="btn btn-info btn-sm float-right">
                            <span class="fa fa-thumbs-up" onclick="likes_update('<?php echo $row['articleID']; ?>')"> (<span id="like_count<?php echo $row['articleID']; ?>"><?php echo $row['likes'] ?></span>)</span>
                        </a>
                    </blockquote>
                </div>
            </div>
    <?php
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    ?>
</div>

<?php
// include('comment-section.php');
include('footer.php');
?>

<script>
    function likes_update(articleID) {
        var curr_count = jQuery('#like_count' + articleID).html();
        curr_count++;
        jQuery('#like_count' + articleID).html(curr_count);
        jQuery.ajax({
            url: 'update_count_post.php',
            type: 'POST',
            data: 'type=like&articleID=' + articleID,
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