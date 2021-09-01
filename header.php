<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
    <!-- Main CSS -->
    <link rel="stylesheet" href="/assets/main.css">
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
                <button class="navbar-toggler collapsed bg-gradient" type="button" data-toggle="collapse" data-target="navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarToggler">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="http://blogsite.com/index.php">Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @@article-active" href="#">Articles</a>
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
                                <a class="dropdown-item @@login-active" href="http://blogsite.com/admin/login.php">Login</a>
                                <a class="dropdown-item @@signup-active" href="./admin/register.php">SignUp</a>
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
                                <form action="search-results.php" method="GET" class="search-box">
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
















</body>

</html>