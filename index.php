<?php
require_once("includes/config.php");
$stmt = $db->query('SELECT * FROM article ORDER BY articleID DESC');


?>

<title>Blog Site</title>
<?php
include("./header.php");

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="/assets/main.css">


<!-- font awesome icon  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- main css -->
<!-- <link href="./assets/main.css" rel="stylesheet" type="text/css"> -->


<?php
include('banner.php')
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
                                <img src="assets/uploads/author4.jpg" alt="">
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
                                <img src="assets/uploads/author5.jpg" alt="">
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
                                <img src="assets/uploads/author6.jpg" alt="">
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
                                <img src="assets/uploads/author7.jpg" alt="">
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







<?php
// include('comment-section.php');
include('footer.php');
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





<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>