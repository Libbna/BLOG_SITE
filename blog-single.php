<?php
require_once('./includes/config.php');

$stmt = $db->prepare('SELECT * FROM article WHERE articleID = :articleID');
$stmt->execute(array(':articleID' => $_GET['id']));
$row = $stmt->fetch();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <base href="http://blogsite.com/"> -->
    <title>Document</title>

    <!-- font awesome icon  -->
    <link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="/assets/sass/utilities/main.css">
</head>

<body>
    <?php include("./layouts/header.php"); ?>
    <section class="w3l-blog-single py-5">
        <div class="container py-lg-3">
            <?php

            ?>
            <div class="row">
                <div class="col-lg-3 pr-lg-4 order-lg-1 order-2">
                    <div class="img-circle">
                        <a href="author.php">
                            <img src="<?php echo $row['profile_img']; ?>" class="img-fliud" alt="author-img">
                        </a>
                    </div>
                    <h4 class="about-title"><?php echo $row['articleAuthor']; ?></h4>
                    <p class="mr-lg-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat, fugiat omnis aliquam iure quasi aspernatur nulla
                        soluta dignissimos
                        consequatur. Omnis fugit dolor recusandae quae! Molestiae! <br>
                        <a href="author.html">More about author...</a>
                    </p>
                </div>
                <div class="col-lg-9 pl-lg-0 order-lg-2 order-1">
                    <div class="message">
                        <ul class="author-date mb-4 p-0 d-flex align-items-center">
                            <li><span class="fa fa-clock-o" aria-hidden="true"></span> Mar 16, 2021</li>
                            <li><span class="fa fa-commenting-o" aria-hidden="true"></span> <a href="#reply">12 Comments</a></li>
                            <li><span class="fa fa-clock-o" aria-hidden="true"></span> 8 min read</li>
                        </ul>
                        <h4 class="blog_post_title"><?php echo $row['articleTitle']; ?>:</h4>
                        <div class="row mt-4">
                            <div class="col-lg-8 pr-lg-4 order-lg-1 order-2">
                                <div class="single-post-content">
                                    <p class="mb-4"><?php echo $row['articleDesc']; ?></p>
                                    <p class="mb-4"><?php echo $row['articleContent']; ?></p>
                                    <div class="single-post-content mt-4 mb-4 py-lg-3">
                                        <h3 class="blog-desc-big m-0 mb-4">Developing first class solutions for our clients.</h3>
                                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime vel nam tenetur sequi
                                            assumenda fuga
                                            sit non praesentium aut voluptatibus rem repellendus amet fugit, ab eligendi ratione, placeat quo
                                            ducimus at? Et suscipit earum reiciendis perferendis, dignissimos, labore quos voluptatibus voluptas
                                            ipsam placeat voluptates laborum maxime asperiores natus tempore incidunt. </p>
                                        <div class="text-list">
                                            <ol>
                                                <li>Quisque sagittis lacus eu lorem sodalesd enean adipiscing.</li>
                                                <li>Sed ut perspiciatis unde omnis natus</li>
                                                <li>Get started with Online Education!</li>
                                                <li>It’s limited seating! Hurry up. Get the Coaching Training for Free</li>
                                                <li>Nam libero tempore, cum soluta nobis est eligendi optio </li>
                                                <li>Onec Consequat sapien ut cursus rhoncus</li>
                                            </ol>
                                        </div>
                                    </div>
                                    <p class="mb-4">Lorem ipsum dolor sit amet,Ea consequuntur
                                        illum facere aperiam sequi optio
                                        dolor set consectetur.Ea ipsum sed consequuntur illum facere aperiam sequi optio consectetur
                                        adipisicing elitFuga, suscipit totam animi consequatur saepe. Lorem ipsum dolor sit amet,
                                        illum facere sequi optio elit..</p>
                                    <p class="mb-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. At, corrupti odit? At
                                        iure facere, porro repellat officia quas, dolores magnam assumenda soluta odit harum voluptate
                                        inventore ipsa maiores fugiat accusamus eos nulla. Iure explicabo officia. Lorem ipsum dolor sit
                                        amet, consectetur adipisicing elit, dolorem.</p>
                                    <blockquote class="blockquote my-5">
                                        <div class="icon-quote"><span class="fa fa-quote-left" aria-hidden="true"></span></div>
                                        Lorem ipsum dolor sit amet,Ea consequuntur illum facere aperiam sequi optio consectetur.Ea
                                        consequuntur illum facere aperiam sequi optio consectetur adipisicing elitFuga, suscipit
                                        totam animi, dolores magnam assumenda soluta odit harum.
                                        <footer class="blockquote-footer mt-3">
                                            Winston Churchill</footer>
                                    </blockquote>
                                    <h3 class="blog-desc-big m-0 mb-4">What makes a good blog post?</h3>
                                    <p class="mb-4">Excepteur sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id
                                        erat eu. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in
                                        culpa quis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde expedita esse error enim
                                        repellat, architecto corporis rerum ipsa alias cum! </p>
                                    <p class="mb-4">Dolor sit sed amet, excepteur sint occaecat non proident, sunt in culpa quis. Phasellus
                                        lacinia id erat eu. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in
                                        culpa quis. </p>
                                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, veritatis. Excepteur
                                        sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id
                                        erat eu. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in
                                        culpa quis. Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                                    <div class="sing-post-thumb mb-5 row pt-3">
                                        <div class="col-sm-6">
                                            <a href="#url"><img src="/assets/uploads/img2.jpg" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="col-sm-6 mt-sm-0 mt-3">
                                            <a href="#url"><img src="/assets/uploads/img3.jpg" class="img-fluid" alt=""></a>
                                        </div>
                                    </div>
                                    <h3 class="blog-desc-big m-0 mb-lg-4 mb-3">How to wite a Blog Post</h3>
                                    <p class="mb-4">Dolor sit sed amet, excepteur sint occaecat non proident, sunt in culpa quis. Phasellus
                                        lacinia id erat eu. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in
                                        culpa quis. Lorem ipsum dolor, sit amet elit. </p>
                                    <div class="text-list mb-4">
                                        <ol>
                                            <li>Understand your audience. </li>
                                            <li>Create your blog domain. </li>
                                            <li>Sign Up With a Content Management System </li>
                                            <li>Register a Domain or Subdomain With a Website Host </li>
                                            <li>Customize your blog's theme. </li>
                                            <li>Identify your first blog post's topic.</li>
                                        </ol>
                                    </div>
                                    <p class="mb-4">Excepteur sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id
                                        erat eu. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in
                                        culpa quis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde expedita esse error enim
                                        repellat, architecto corporis rerum ipsa alias cum! </p>
                                    <p class="mb-4">Dolor sit sed amet, excepteur sint occaecat non proident, sunt in culpa quis. Phasellus
                                        lacinia id
                                        erat eu. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in
                                        culpa quis. </p>


                                    <div class="single-post-content my-4 py-lg-3">
                                        <h3 class="blog-desc-big m-0 mb-4">Your Blog Posts are Boring? Here are 9 Tips for Making your Writing more Interesting</h3>
                                        <p class="mb-4">Hong Kong is one of those cities you never really stop discovering. With its breathtaking
                                            national parks and a Chinese culture influenced by years of British colonial rule, Hong Kong has unique
                                            and enduring characteristics that make it truly special. The city’s intrigue will lead you there, while
                                            its economic and cultural vibrance will make it impossible to leave. Don’t take our word for it, read
                                            these unforgettable Hong Kong quotes:</p>
                                        <div class="single-post-content">
                                            <div class="img-row mb-4">
                                                <img src="/assets/uploads/img4.jpg" class="img-fluid" alt="image">
                                            </div>
                                            <div class="text-row">
                                                <p class="mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut debitis nobis veniam
                                                    fugit. Unde,
                                                    culpa illum ipsum tempora excepturi quo porro, asperiores quibusdam molestiae iure ea facilis
                                                    consequuntur quaerat fuga.</p>
                                                <p class="mb-4">Vestibulum feugiat tortor vitae diam euismod, ut et inter dum nisi fermentum.
                                                    Pellentesque sed
                                                    sodales nunc. Vestibulum laoreet erat nisi, sit amet ultrices. Vestibulum feugiat tortor vitae
                                                    diam euismod, ut et inter dum nisi fermentum. Pellentesque sed sodales nunc. Vestibulum laoreet
                                                    erat nisi, sit amet ultrices vitae diam.</p>
                                                <p class="mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut debitis nobis veniam
                                                    fugit. Unde,
                                                    culpa illum ipsum tempora excepturi quo porro, asperiores quibusdam molestiae iure ea facilis
                                                    consequuntur quaerat fuga.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <h3 class="blog-desc-big m-0 mb-4">Search for Inspiration</h3>
                                    <p class="mb-4">Vivamus a ligula quam. Ut blandit eu leo non suscipit. <a href="#" class="use-admin">Domains</a> In interdum
                                        ullamcorper dolor eu mattis.Nulla quis lorem
                                        neque,Nulla
                                        quis lorem neque, mattis venenatis lectus.<a href="#" class="use-admin"> Sub Domains</a>
                                        In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis
                                        lectus.</p>
                                    <p class="mb-4">Dolor sit sed amet, excepteur sint occaecat non proident, sunt in culpa quis. Phasellus
                                        lacinia id erat eu. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in
                                        culpa quis. </p>


                                    <div class="single-post-content mb-4 py-lg-3">
                                        <h3 class="blog-desc-big m-0 mb-4">Join With Us. We Will Make The Best Market Together!</h3>
                                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, amet fuga harum
                                            nulla laborum
                                            aliquid maxime accusamus vitae quas minima nisi facere quidem omnis perferendis voluptatum corrupti,
                                            voluptatem aperiam quod.</p>
                                        <div class="two-columns row single-post-content mt-4">
                                            <div class="col-md-6 left-column">
                                                <img src="/assets/uploads/img1.jpg" class="img-fluid" alt="image">
                                            </div>
                                            <div class="col-md-6 right-column mt-md-0 mt-4 pl-md-3">
                                                <p class="mb-4">Vestibulum feugiat tortor vitae diam euismod, ut et inter dum nisi fermentum.
                                                    Pellentesque sed
                                                    sodales nunc. Vestibulum laoreet erat nisi, sit amet ultrices. Vestibulum feugiat tortor vitae
                                                    diam euismod, ut et inter dum nisi fermentum. Pellentesque sed sodales nunc. Vestibulum laoreet
                                                    erat nisi, sit amet ultrices vitae diam.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-grid left-right">
                                        <div class="buttons-singles">
                                            <h4>Share :</h4>
                                            <a href="#blog-share"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                                            <a href="#blog-share"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                                            <a href="#blog-share"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                                            <a href="#blog-share"><span class="fa fa-pinterest-p" aria-hidden=" true"></span></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4 mb-lg-0 mb-4 order-lg-2 order-1">
                                <div class="blog-single-content">
                                    <p><span class="fa fa-clock-o" aria-hidden="true"></span> 8 min read</p>
                                    <a href="#reply"><span class="fa fa-commenting-o" aria-hidden="true"></span> Leave your thought</a>
                                </div>
                                <div class="blog-subscribe p-3 mt-lg-5 mt-3">
                                    <h5>Subscribe to Blog</h5>
                                    <form action="#" method="GET" class="subscribe-form">
                                        <input type="email" class="form-control subscribe-field mt-3 mb-2" placeholder="Email Address" name="subscribe" required="required">
                                        <button type="submit" class="btn btn-primary btn-theme">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>







    <?php
    include("./layouts/comment.php");
    include("./layouts/footer.php");
    ?>
</body>

</html>