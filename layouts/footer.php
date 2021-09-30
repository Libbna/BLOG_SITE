<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <footer>
        <section class="footer-inner-main">
            <div class="footer-grids py-5">
                <div class="container py-lg-4">
                    <div class="text-txt">
                        <div class="row footer-about pb-5">
                            <div class="col-lg-9 footer-links">
                                <?php
                                if (isset($language) && ($language == 'en')) {
                                ?>
                                    <div class="header-section">
                                        <h3 class="mb-3">About Us</h3>
                                        <p class="pr-lg-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Consequuntur hic odio voluptatem tenetur consequatur.Lorem ipsum dolor sit amet
                                            consectetur adipisicing elit. </p>
                                    </div>
                                    <div class="columns-2 mt-4">
                                        <ul class="social">
                                            <li><a href="#facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                                            </li>
                                            <li><a href="#linkedin"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
                                            </li>
                                            <li><a href="#twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                                            </li>
                                            <li><a href="#google"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                            </div>
                        </div>
                        <div class="row footer-links">
                            <div class="col-md-3 col-sm-6 sub-two-right mt-5">
                                <h6>Quick Links</h6>
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Login</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-6 sub-two-right mt-5">
                                <h6>Designing</h6>
                                <ul>
                                    <li><a href="#">Design Patterns</a></li>
                                    <li><a href="#">Performance</a></li>
                                    <li><a href="#">Photoshop</a></li>
                                    <li><a href="#">User Experience</a></li>
                                    <li><a href="#">Typography</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-6 sub-two-right mt-5">
                                <h6>Business</h6>
                                <ul>
                                    <li><a href="#">Investment</a></li>
                                    <li><a href="#">Politics</a></li>
                                    <li><a href="#">Markets</a></li>
                                    <li><a href="#">Stock Exchange</a></li>
                                    <li><a href="#">Business Stats</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-6 sub-two-right mt-5">
                                <h6>Health</h6>
                                <ul>
                                    <li><a href="#">Living Science</a></li>
                                    <li><a href="#">Child's Health</a></li>
                                    <li><a href="#">Mental Health</a></li>
                                    <li><a href="#">Medicine Export</a></li>
                                    <li><a href="#">Heart Health</a></li>
                                </ul>
                            </div>
                        </div>
                    <?php
                                } else {
                    ?>
                        <div class="header-section">
                            <h3 class="mb-3"><?php echo $footer_about[$language][0]; ?></h3>
                            <p class="pr-lg-5"><?php echo $footer_about[$language][1]; ?> </p>
                        </div>
                        <div class="columns-2 mt-4">
                            <ul class="social">
                                <li><a href="#facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                                </li>
                                <li><a href="#linkedin"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
                                </li>
                                <li><a href="#twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                                </li>
                                <li><a href="#google"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row footer-links">
                    <div class="col-md-3 col-sm-6 sub-two-right mt-5">
                        <h6><?php echo $header[$language][6]; ?></h6>
                        <ul>
                            <li><a href="#"><?php echo $header[$language][0]; ?></a></li>
                            <li><a href="#"><?php echo $header[$language][4]; ?></a></li>
                            <li><a href="#"><?php echo $header[$language][7]; ?></a></li>
                            <li><a href="#"><?php echo $header[$language][5]; ?></a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 sub-two-right mt-5">
                        <h6><?php echo $footer_designing[$language][0]; ?></h6>
                        <ul>
                            <li><a href="#"><?php echo $footer_designing[$language][1]; ?></a></li>
                            <li><a href="#"><?php echo $footer_designing[$language][2]; ?></a></li>
                            <li><a href="#"><?php echo $footer_designing[$language][3]; ?></a></li>
                            <li><a href="#"><?php echo $footer_designing[$language][4]; ?></a></li>
                            <li><a href="#"><?php echo $footer_designing[$language][5]; ?></a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 sub-two-right mt-5">
                        <h6><?php echo $footer_Busi[$language][0]; ?></h6>
                        <ul>
                            <li><a href="#"><?php echo $footer_Busi[$language][1]; ?></a></li>
                            <li><a href="#"><?php echo $footer_Busi[$language][2]; ?></a></li>
                            <li><a href="#"><?php echo $footer_Busi[$language][3]; ?></a></li>
                            <li><a href="#"><?php echo $footer_Busi[$language][4]; ?></a></li>
                            <li><a href="#"><?php echo $footer_Busi[$language][5]; ?></a></li>

                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 sub-two-right mt-5">
                        <h6><?php echo $footer_health[$language][0]; ?></h6>
                        <ul>
                            <li><a href="#"><?php echo $footer_health[$language][1]; ?></a></li>
                            <li><a href="#"><?php echo $footer_health[$language][2]; ?></a></li>
                            <li><a href="#"><?php echo $footer_health[$language][3]; ?></a></li>
                            <li><a href="#"><?php echo $footer_health[$language][4]; ?></a></li>
                            <li><a href="#"><?php echo $footer_health[$language][5]; ?></a></li>
                        </ul>
                    </div>
                </div>

            <?php
                                }
            ?>
            </div>
            </div>
            </div>
        </section>
    </footer>
</body>

</html>