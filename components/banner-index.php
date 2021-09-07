<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- main css -->
    <link rel="stylesheet" href="../assets/sass/utilities/main.css">
    <!-- owl css -->
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.green.min.css">
</head>

<body>
    <section class="w3l-main-slider position-relative" id="home">
        <div class="companies20-content">
            <div class="owl-one owl-carousel owl-theme">
                <div class="item">
                    <li>
                        <div class="slider-info banner-view banner-top3 bg bg2">
                            <div class="banner-info">
                                <div class="container">
                                    <div class="banner-info-bg text-center">
                                        <a href="blog-single.html" class="blog_post_title">How to Make Cappuccino without a Machine</a>
                                        <ul class="author-date mb-4 d-flex align-items-center mt-2 justify-content-center">
                                            <li class="circle avatar"><img src="/assets/uploads/author1.jpg" alt=""></li>
                                            <li>by <a href="author.html">John Michele</a></li>
                                            <li><span class="fa fa-clock-o" aria-hidden="true"></span> Mar 16, 2020</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
                <div class="item">
                    <li>
                        <div class="slider-info  banner-view banner-top1 bg bg2">
                            <div class="banner-info">
                                <div class="container">
                                    <div class="banner-info-bg text-center">
                                        <a href="blog-single.html" class="blog_post_title">Create a Stunning Website!</a>
                                        <ul class="author-date mb-4 d-flex align-items-center mt-4 justify-content-center">
                                            <li class="circle avatar"><img src="/assets/uploads/author2.jpg" alt=""></li>
                                            <li>by <a href="author.html">Daniel Roberto</a></li>
                                            <li><span class="fa fa-clock-o" aria-hidden="true"></span> Jan 22, 2020</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
                <div class="item">
                    <li>
                        <div class="slider-info banner-view banner-top2 bg bg2">
                            <div class="banner-info">
                                <div class="container">
                                    <div class="banner-info-bg text-center">
                                        <a href="blog-single.html" class="blog_post_title">See yourself in a New Light.</a>
                                        <ul class="author-date mb-4 d-flex align-items-center mt-4 justify-content-center">
                                            <li class="circle avatar"><img src="/assets/uploads/author3.jpg" alt=""></li>
                                            <li>by <a href="author.html">Emma Stone</a></li>
                                            <li><span class="fa fa-clock-o" aria-hidden="true"></span> Aug 14, 2020</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
            </div>
        </div>

    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.owl-one').owlCarousel({
                loop: true,
                margin: 0,
                nav: false,
                responsiveClass: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplaySpeed: 1000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    480: {
                        items: 1,
                        nav: false
                    },
                    667: {
                        items: 1,
                        nav: true
                    },
                    1000: {
                        items: 1,
                        nav: true
                    }
                }
            })
        })
    </script>

    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>



</body>

</html>