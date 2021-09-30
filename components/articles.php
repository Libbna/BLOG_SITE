<?php
require_once("../includes/config.php");
include("../language.php");

// if ($user->is_logged_in()) {
//     header('location: add-blog.php');
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Articles</title>
    
    <!-- font awesome icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="/assets/sass/utilities/main.css">

</head>

<body>
    <?php include("../layouts/header.php"); ?>

    <!-- breadcrumb -->
    <section class="w3l-breadcrumb py-5">
        <div class="container">
            <h6 class="sub-title">Sub title</h6>
            <div class="header-section">
                <h3>Articles</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime optio nam id quibusdam laborum sunt?</p>
                <a href="../add-blog-article" class="btn btn-primary theme-button">Add Article</a>
            </div>
        </div>
    </section>
    <div style="margin: 8px auto; display: block; text-align:center;">
    </div>
    <!-- article section -->
    <section class="w3l-articles">
        <div class="container py-lg-3">
            <?php
            try {
                if (isset($language) && ($language == "en")) {
                    $stmt = $db->query('SELECT articleID, articleTitle, articleDesc, articleAuthor, profile_img FROM article ORDER BY articleID DESC');
                    while ($row = $stmt->fetch()) {
            ?>
                        <article class="mt-5">
                            <div class="row align-items-center pt-md-0 pt-4">
                                <div class="col-md-12">
                                    <div class="slider-info">
                                        <div class="img-circle">
                                            <a href="blog-single.html"><img src="<?php echo $row['profile_img']; ?>" class="img-fluid" alt="article image"></a>
                                        </div>
                                        <div class="message">
                                            <ul class="blog-single-author-date d-flex align-items-center">
                                                <li><a href="blog-single.html"><?php echo $row['articleAuthor'] ?></a></li>
                                                <li><span class="fa fa-clock-o" aria-hidden="true"></span> Apr 04, 2020</li>
                                            </ul>
                                            <a class="author-book-title" href="blog-single.html"><?php echo $row['articleTitle']; ?></a>
                                            <div class="row">
                                                <div class="col-md-9 pr-md-5 order-md-1 order-2">
                                                    <p><?php echo $row['articleDesc']; ?></p>
                                                    <?php
                                                    ?>
                                                    <?php echo '<a href="../blog-single/' . $row['articleID'] . '" class="read-button mt-4 d-inline-block">Read more <span class="fa fa-long-arrow-right" aria-hidden="true"></span></a>'; ?>

                                                </div>
                                                <div class="col-md-3 article-right order-md-2 order-1 pl-md-0">
                                                    <p><span class="fa fa-clock-o" aria-hidden="true"></span> 4 min read</p>
                                                    <a href="./comment.php"><span class="fa fa-commenting-o" aria-hidden="true"></span> Leave comment</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php
                    }
                } else {
                    $stmt = $db->query('SELECT articleID, articleTitle_hi, articleDesc_hi, articleAuthor, profile_img FROM article ORDER BY articleID DESC');
                    while ($row = $stmt->fetch()) {
                    ?>
                        <article class="mt-5">
                            <div class="row align-items-center pt-md-0 pt-4">
                                <div class="col-md-12">
                                    <div class="slider-info">
                                        <div class="img-circle">
                                            <a href="blog-single.html"><img src="<?php echo $row['profile_img']; ?>" class="img-fluid" alt="article image"></a>
                                        </div>
                                        <div class="message">
                                            <ul class="blog-single-author-date d-flex align-items-center">
                                                <li><a href="blog-single.html"><?php echo $row['articleAuthor'] ?></a></li>
                                                <li><span class="fa fa-clock-o" aria-hidden="true"></span> Apr 04, 2020</li>
                                            </ul>
                                            <a class="author-book-title" href="blog-single.html"><?php echo $row['articleTitle_hi']; ?></a>
                                            <div class="row">
                                                <div class="col-md-9 pr-md-5 order-md-1 order-2">
                                                    <p><?php echo $row['articleDesc_hi']; ?></p>
                                                    <?php
                                                    ?>
                                                    <?php echo '<a href="../blog-single/' . $row['articleID'] . '" class="read-button mt-4 d-inline-block">Read more <span class="fa fa-long-arrow-right" aria-hidden="true"></span></a>'; ?>

                                                </div>
                                                <div class="col-md-3 article-right order-md-2 order-1 pl-md-0">
                                                    <p><span class="fa fa-clock-o" aria-hidden="true"></span> 4 min read</p>
                                                    <a href="./comment.php"><span class="fa fa-commenting-o" aria-hidden="true"></span> Leave comment</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
            <?php
                    }
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            ?>

        </div>
    </section>


    <?php
    include("../layouts/footer.php");
    ?>
</body>

</html>