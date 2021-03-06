<?php
include("../language.php");
require_once("../includes/config.php");

$stmt = $db->query('SELECT * FROM article');

?>

<title>Blog Site</title>
<?php
include("../layouts/header.php");
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="../assets/sass/utilities/main.css">
<script src="../assets/js/app.js"></script>

<div id="self-space"></div>
<section class="auhtors1 py-5">
    <div class="container py-lg-3">
        <div class="row">
            <?php
            if (isset($_GET['submit-search'])) {
                http_response_code(301);
                $search = $_GET['search'];
                $result = $db->query("SELECT * FROM article WHERE articleTitle LIKE '" . $search . "'  OR soundex(articleTitle) = soundex('$search') OR articleDesc LIKE '%" . $search . "%' OR articleContent LIKE '%" . $search . "%' 
                OR articleAuthor LIKE '%" . $search . "%'");
                if ($result) {
                    while ($row = $result->fetch()) { ?>
                        <article class="mt-5 col-lg-6 pr-lg-5">

                            <div class="slider-info">
                                <div class="img-circle">
                                    <a href="#">
                                        <img src="<?php echo $row['profile_img']; ?>" alt="profile-picture">
                                    </a>
                                </div>
                                <div class="message">
                                    <ul class="blog-single-author-date d-flex align-items-center flex-wrap">
                                        <li>
                                            <span class="fa fa-clock-o" aria-hidden="true"> Mar 16, 2021</span>
                                        </li>
                                        <li>
                                            <span class="fa fa-commenting-o" aria-hidden="true">
                                                <a href="../components/comment.php">Comment</a>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="fa fa-clock-o" aria-hidden="true"> 8 min read</span>
                                        </li>
                                    </ul>
                                    <a class="author-book-title" href="#">
                                        <?php echo $row['articleTitle']; ?>
                                    </a>
                                    <p>
                                        <?php echo $row['articleDesc']; ?>
                                    </p>
                                    <?php echo '<a href="../blog-single/' . $row['articleID'] . '" class="read-button mt-4 d-inline-block">Read more <span class="fa fa-long-arrow-right" aria-hidden="true"></span></a>'; ?>

                                </div>
                            </div>
                        </article>
            <?php }
                }
            } ?>
        </div>

    </div>
</section>

<?php include('../layouts/footer.php'); ?>