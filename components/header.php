<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>


    <!-- font awesome icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="/assets/sass/utilities/main.css">

</head>

<body>
    <!-- Domain Modal -->

    <?php
    include('domainModal.php');
    ?>
    <header id="site-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark stroke p-0">
                <h1>
                    <a class="navbar-brand" href="">Publication</a>
                </h1>
                <button class="navbar-toggler  bg-gradient collapsed" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarToggler">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="http://blogsite.com/index.php">Home </a>
                        </li>
                        <li class="nav-item  @@article-active">
                            <a class=" nav-link" href="../components/articles.php">Articles</a>
                        </li>
                        <li class="nav-item dropdown @@dropdown-active">
                            <a class="nav-link dropdown-toggle caret-off" id="navbarDropdown" href="blog-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog
                                <span class="fa fa-angle-down"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navBarDropdown">
                                <a class="dropdown-item @@blog-active" href="#">Featured Post</a>
                                <a class="dropdown-item @@blog-single-active" href="#">Single Post</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown @@pages-dropdown-active">
                            <a class="nav-link dropdown-toggle caret-off" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages
                                <span class="fa fa-angle-down"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navBarDropdown">
                                <a class="dropdown-item @@login-active" href="/components/login.php">Login</a>
                                <a class="dropdown-item @@signup-active" href="/components/register.php">SignUp</a>
                                <a class="dropdown-item @@search-active" href="#">Search Results</a>
                            </div>
                        </li>
                        <li class="nav-item @@about-active">
                            <a class="nav-link" href="#">About </a>
                        </li>
                        <li class="nav-item @@contact-active">
                            <a class="nav-link" href="#">Contact </a>
                        </li>
                    </ul>
                    <!-- search right -->
                    <div class="search-right">
                        <a href="#search" class="btn btn-light theme-button mr-lg-3 mt-lg-0 mt-4" title="search">
                            <span class="fa fa-search" aria-hidden="true"></span> Topics
                        </a>
                        <!-- search popup -->
                        <div id="search" class="pop-overlay">
                            <div class="popup">
                                <!-- <form action="search-results.php" method="GET" class="search-box"> -->
                                <form action="../components/search-results.php" method="GET" class="search-box">
                                    <input type="search" name="search" required autofocus="" placeholder="Search your Keyword">
                                    <button name="submit-search" type="submit" class="btn"><span class="fa fa-search" aria-hidden="true"></span></button>

                                </form>
                                <!-- search -> browser - items -->
                                <div class="browse-items">
                                    <h3 class="title two mt-md-5 mt-4">Browse all topics:</h3>
                                    <ul class="search-items">
                                        <li><a href="#">Design Patterns</a></li>
                                        <li><a href="#">Performace</a></li>
                                        <li><a href="#">Photoshop</a></li>
                                        <li><a href="#">User Experience</a></li>
                                        <li><a href="#">Typography</a></li>
                                        <li><a href="#">E-commerce</a></li>
                                        <li><a href="#">HTML</a></li>
                                        <li><a href="#">Illustration</a></li>
                                        <li><a href="#">Design Patterns</a></li>
                                        <li><a href="#">Performace</a></li>
                                        <li><a href="#">Photoshop</a></li>
                                        <li><a href="#">User Experience</a></li>
                                        <li><a href="#">Typography</a></li>
                                        <li><a href="#">E-commerce</a></li>
                                        <li><a href="#">HTML</a></li>
                                        <li><a href="#">Illustration</a></li>

                                    </ul>
                                </div>
                            </div>
                            <a class="close" href="#close">×</a>
                        </div>
                        <!-- /search popup -->
                        <a href="#domain" class="domain" data-toggle="modal" data-target="#DomainModal">
                            <div class="hamburger1">
                                <div class="d1"></div>
                                <div class="d2"></div>
                                <div class="d3"></div>
                            </div>
                        </a>
                    </div>
                    <!-- /search right -->

                </div>
            </nav>
        </div>
    </header>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>