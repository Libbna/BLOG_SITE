<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- font awesome icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../assets/sass/utilities/blog.css">

</head>

<body>

    <div style="margin: 8px auto; display: block; text-align:center;"></div>
    <section class="w3l-blog-single py-5" id="comment-section">
        <div class="container py-lg-3">
            <div class="row">
                <div class="col-lg-8 pl-lg-0 offset-lg-2 offset-0">
                    <nav class="post-navigation row mb-4 mt-lg-0 mt-5 py-4">
                        <div class="post-prev col-6 pr-sm-5">
                            <span class="nav-title">
                                <span class="fa fa-arrow-left prev"></span>
                                &nbsp; Prev Post
                            </span>
                            <a href="#url" rel="prev" class="posts-view posts-view-left">
                                <img src="/assets/uploads/img10.jpg" class="img-fluid postimg d-none d-md-block">
                                <label>That’s what I want to show you how to do here.</label>
                            </a>
                        </div>
                        <div class="post-next col-6 pl-sm-5 text-right">
                            <span class="nav-title">
                                Next Post&nbsp;
                                <span class="fa fa-arrow-right next"></span>
                            </span>
                            <a href="#url" rel="next" class="posts-view posts-view-right ">
                                <label>How to Make Cappuccino without a Machine</label>
                                <img src="/assets/uploads/img11.jpg" class="img-fluid postimg d-none d-md-block">
                            </a>
                        </div>
                    </nav>
                    <div class="comments mt-5">
                        <h4 class="side-title ">Comments</h4>
                        <div class="media mt-4">
                            <div class="img-circle">
                                <img src="/assets/uploads/author.jpg" class="img-fluid" alt="...">
                            </div>
                            <div class="media-body">
                                <ul class="time-rply mb-2">
                                    <li><a href="#URL" class="name mt-0 mb-2 d-block">Dhony Abraham</a>
                                        May 11, 2020 - 10:02 pm
                                    </li>
                                    <li class="reply-last">
                                        <a href="#reply" class="reply">
                                            Reply
                                        </a>
                                    </li>
                                </ul>
                                <p>Adipisicing elit. Repellat, hic
                                    reprehenderit eum cupiditate deleniti, Lorem ipsum dolor sit amet consectetur adipisicing.....</p>
                            </div>
                        </div>
                        <div class="media mt-4">
                            <div class="img-circle">
                                <img src="/assets/uploads/author1.jpg" class="img-fluid" alt="...">
                            </div>
                            <div class="media-body">
                                <ul class="time-rply mb-2">
                                    <li><a href="#URL" class="name mt-0 mb-2 d-block">Marko Dugonji</a>
                                        Jun 05, 2020 - 12:12 pm
                                    </li>
                                    <li class="reply-last">
                                        <a href="#reply" class="reply">
                                            Reply
                                        </a>
                                    </li>
                                </ul>
                                <p>Adipisicing elit. Repellat, hic
                                    reprehenderit eum cupiditate deleniti, Lorem ipsum dolor sit amet consectetur adipisicing.....</p>
                            </div>

                        </div>
                    </div>
                    <div class="leave-comment-form mt-5" id="reply">
                        <h4 class="side-title mb-2">Leave your comment</h4>
                        <p class="mb-4">Your email address will not be published. Required fields are marked *
                        </p>
                        <form action="#" method="post">

                            <div class="form-group">
                                <textarea name="Comment" class="form-control" placeholder="Your Comment*" required="" spellcheck="false"></textarea>
                            </div>
                            <div class="input-grids row">

                                <div class="form-group col-lg-6">
                                    <input type="text" name="Name" class="form-control" placeholder="Your Name*" required="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="email" name="Email" class="form-control" placeholder="Email*" required="">
                                </div>
                            </div>

                            <div class="submit text-right">
                                <button class="btn btn-style btn-primary">Post Comment </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



</body>

</html>