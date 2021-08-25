<?php
require_once("includes/config.php");
$stmt = $db->query('SELECT * FROM article ORDER BY articleID DESC');


?>

<title>Blog Site</title>
<?php
include("./header.php");

?>
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
include('comment-section.php')
?>