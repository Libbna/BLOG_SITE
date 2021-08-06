<?php
require_once("includes/config.php");

?>

<title>Blog Site</title>
<?php
include("header.php");
?>
<div class="container">
    <div class="content">
        <?php
        try {
            //selecting data through ID
            $stmt = $db->query('SELECT articleID, articleTitle, articleDesc, articleAuthor
            FROM article ORDER BY articleID DESC');

            while ($row = $stmt->fetch()) {
                echo '<h1?><a href="show.php?id=' . $row['articleID'] . '">' . $row['articleTitle'] . '</a></h1>';
                // display the data
                echo '<p>' . $row['articleDesc'] . '</p>';
                echo '<p>' . $row['articleAuthor'] . '</p>';
                echo '<p><button class="readbtn"><a href="show.php?id=' . $row['articleID'] . '">Read More </a></button></p>';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        ?>
    </div>
</div>