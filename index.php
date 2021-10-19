<?php

// use MyBlog\User;

// require_once realpath("../vendor/autoload.php");
// $user = new User();

// use MyApp\Game\Player\Player;

// require_once realpath("vendor/autoload.php");

// $player = new Player();
// $gameController = new \MyApp\Game\GameController();

include("language.php");

require_once("./includes/config.php");

if (!$user->is_logged_in()) {
    $_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
}


$stmt = $db->query('SELECT * FROM article ORDER BY lang_id DESC');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Site</title>

    <!-- font awesome icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="/assets/sass/utilities/main.css">
</head>

<body>
    <?php
    include("./layouts/header.php");
    include('./layouts/banner-index.php');
    ?>

    <!--Main Slider  -->
    <div style="margin: 8px auto; display: block; text-align:center;"></div>

    <section class="w3l-blog">
        <div class="text-element-9">
            <div class="row no-gutters">
                <a href="blog-single.html" class="col-lg-6 blog-article-posts bg-color-one">
                    <div class="blog-post d-flex flex-wrap align-content-between">
                        <div class="post-content">
                            <ul class="author-date mb-4 d-flex align-items-center">
                                <li class="circle-lg avatar">
                                    <img src="assets/uploads/author4.jpg" alt="author-image">
                                </li>
                                <li class="author-name">by <b>Daniel Roberto</b></li>
                                <li><span class="fa fa-clock-o" aria-hidden="true"></span> Feb 16, 2020</li>
                            </ul>
                            <h4 class="blog_post_title mb-4">That’s what I want to show you how to do here. In this article, I will:</h4>
                            <p class="sub-para">#Market Tips <sup> 36</sup></p>
                            <p class="sub-para">#Sports <sup> 235</sup></p>
                            <p class="sub-para">#Techniques <sup> 59</sup></p>
                        </div>
                        <div class="read-button mt-5">Read story <span class="fa fa-long-arrow-right" aria-hidden="true"></span></div>
                    </div>
                </a>
                <a href="blog-single.html" class="col-lg-6 blog-article-posts bg-color-two">
                    <div class="blog-post d-flex flex-wrap align-content-between">
                        <div class="post-content">
                            <ul class="author-date mb-4 d-flex align-items-center">
                                <li class="circle-lg avatar">
                                    <img src="assets/uploads/author5.jpg" alt="author-image">
                                </li>
                                <li class="author-name">by <b>Marko Dugonji</b></li>
                                <li><span class="fa fa-clock-o" aria-hidden="true"></span> Apr 21, 2020</li>
                            </ul>
                            <h4 class="blog_post_title mb-4">That’s what I want to show you how to do here. In this article, I will:</h4>
                            <p class="sub-para">#Market Tips <sup> 36</sup></p>
                            <p class="sub-para">#Sports <sup> 235</sup></p>
                            <p class="sub-para">#Techniques <sup> 59</sup></p>
                        </div>
                        <div class="read-button mt-5">Read story <span class="fa fa-long-arrow-right" aria-hidden="true"></span></div>
                    </div>
                </a>
                <a href="blog-single.html" class="col-lg-6 blog-article-posts bg-color-three">
                    <div class="blog-post d-flex flex-wrap align-content-between">
                        <div class="post-content">
                            <ul class="author-date mb-4 d-flex align-items-center">
                                <li class="circle-lg avatar">
                                    <img src="assets/uploads/author6.jpg" alt="author-image">
                                </li>
                                <li class="author-name">by <b>Max Stoiber</b></li>
                                <li><span class="fa fa-clock-o" aria-hidden="true"></span> Jun 08, 2020</li>
                            </ul>
                            <h4 class="blog_post_title mb-4">That’s what I want to show you how to do here. In this article, I will:</h4>
                            <p class="sub-para">#Market Tips <sup> 36</sup></p>
                            <p class="sub-para">#Sports <sup> 235</sup></p>
                            <p class="sub-para">#Techniques <sup> 59</sup></p>
                        </div>
                        <div class="read-button mt-5">Read story <span class="fa fa-long-arrow-right" aria-hidden="true"></span></div>
                    </div>
                </a>
                <a href="blog-single.html" class="col-lg-6 blog-article-posts bg-color-one">
                    <div class="blog-post d-flex flex-wrap align-content-between">
                        <div class="post-content">
                            <ul class="author-date mb-4 d-flex align-items-center">
                                <li class="circle-lg avatar">
                                    <img src="assets/uploads/author7.jpg" alt="author-image">
                                </li>
                                <li class="author-name">by <b>Dhony Abraham</b></li>
                                <li><span class="fa fa-clock-o" aria-hidden="true"></span> Sep 14, 2020</li>
                            </ul>
                            <h4 class="blog_post_title mb-4">That’s what I want to show you how to do here. In this article, I will:</h4>
                            <p class="sub-para">#Market Tips <sup> 36</sup></p>
                            <p class="sub-para">#Sports <sup> 235</sup></p>
                            <p class="sub-para">#Techniques <sup> 59</sup></p>
                        </div>
                        <div class="read-button mt-5">Read story <span class="fa fa-long-arrow-right" aria-hidden="true"></span></div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <button onclick="topFunction()" id="topScrollBtn" title="Go to top">
        <i class="fa fa-arrow-up"></i>
    </button>


    <?php
    include("./layouts/latest-post.php");
    include("./layouts/about-image-grid.php");
    include("./layouts/author-section.php");
    ?>
    <?php
    include('./layouts/subscribe.php');
    include('./layouts/footer.php');
    ?>

    <script>
        function likes_update(articleID) {
            var curr_count = $('#like_count' + articleID).html();
            curr_count++;
            $('#like_count' + articleID).html(curr_count);
            $.ajax({
                url: 'update_count_post.php',
                type: 'POST',
                data: 'type=like&articleID=' + articleID,
                success: function(result) {

                }
            })
        }
    </script>
    <script>
        //Get the button
        var mybutton = document.getElementById("topScrollBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
</body>

</html>