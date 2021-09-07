<?php
require_once("../includes/config.php");
include("./header.php");


// $stmt = $db->prepare('SELECT * FROM article WHERE articleID = :articleID');
// $stmt->execute(array(':articleID' => $_GET['id']));
// $row = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- font awesome icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="/assets/sass/utilities/main.css">

</head>

<body>
    <!-- breadcrumn -->
    <section class="w3l-breadcrumb py-5">
        <div class="container">
            <h6 class="sub-title">Sub title</h6>
            <div class="header-section">
                <h3>Articles</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime optio nam id quibusdam laborum sunt?</p>
            </div>
        </div>
    </section>
    <div style="margin: 8px auto; display: block; text-align:center;">
        <!---728x90--->
    </div>
    <!-- article section -->
    <section class="w3l-articles">
        <div class="container py-lg-3">
            <?php
            try {
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
                                                <a href="blog-single.html" class="read-button mt-4 d-inline-block">Read more <span class="fa fa-long-arrow-right" aria-hidden="true"></span></a>
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
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            ?>

        </div>
    </section>


    <?php
    include("./footer.php");
    ?>
</body>

</html>