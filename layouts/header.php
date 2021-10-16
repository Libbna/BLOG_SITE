<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>

    <!-- <base href="http://blogsite.com/" /> -->
    <!-- font awesome icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="/assets/sass/utilities/main.css">


</head>

<body>
    <!-- Domain Modal -->

    <header id="site-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark stroke p-0">
                <h1 class="logo">
                    <a class="navbar-brand" href="">Publication</a>
                </h1>
                <button id="navbar-toggler" class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-label="Toggle navigation">
                    <span onclick='myFunction()' class="navbar-toggler-icon fa icon-expand fa-bars" id="bars"></span>
                    <span onclick='myFunction()' class="navbar-toggler-icon fa icon-close fa-times" id="cross"></span>
                </button>
                <div class="navbar-collapse collapse" id="navbarTogglerDemo02">
                    <?php
                    // For English Language
                    if (isset($language) && ($language == 'en')) {
                        // if user is authorized
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                            // if ROLE is ADMIN
                            if ($_SESSION['role'] == "admin") {
                    ?>
                                <ul class="navbar-nav mx-auto" id="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/index">Home</a>
                                    </li>
                                    <li class="nav-item @@article-active">
                                        <a class="nav-link" href="/components/articles">Articles</a>
                                    </li>
                                    <li class="nav-item dropdown @@dropdown-active">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
                                            Blog <span class="fa fa-angle-down"></span>
                                            <span class="fa fa-angle-up"></span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item @@blog-active" href="blog.php">Featured Posts</a>
                                            <a class="dropdown-item @@blog-single-active" href="blog-single.html">Single post</a>
                                        </div>
                                    </li>
                                    <li class="nav-item @@about-active">
                                        <a class="nav-link" href="/admin/index">Dashboard</a>
                                    </li>
                                    <li class="nav-item @@contact-active">
                                        <a class="nav-link" href="/components/contact-form">Contact</a>
                                    </li>
                                    <li class="nav-item @@contact-active">
                                        <a class="nav-link logout" href="/admin/logout">LOGOUT</a>
                                    </li>
                                    <select name="language" id="language" onchange="set_lang()">
                                        <option value="en" <?php echo  $en_select; ?>>EN</option>
                                        <option value="hi" <?php echo  $hi_select; ?>>HI</option>
                                    </select>
                                </ul>
                                <h3 id="welcome">Welcome</h3>
                            <?php
                            } else
                            // if ROLE is USER
                            {
                            ?>
                                <ul class="navbar-nav mx-auto" id="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/index">Home</a>
                                    </li>
                                    <li class="nav-item @@article-active">
                                        <a class="nav-link" href="/components/articles">Articles</a>
                                    </li>
                                    <li class="nav-item dropdown @@dropdown-active">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
                                            Blog <span class="fa fa-angle-down"></span>
                                            <span class="fa fa-angle-up"></span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item @@blog-active" href="blog.php">Featured Posts</a>
                                            <a class="dropdown-item @@blog-single-active" href="blog-single.html">Single post</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown @@pages-dropdown-active">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
                                            Pages <span class="fa fa-angle-down"></span>
                                            <span class="fa fa-angle-up"></span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item @@author-active" href="author.html">Author Page</a>
                                            <a class="dropdown-item @@search-active" href="search-results.html">Search Results</a>
                                        </div>
                                    </li>
                                    <li class="nav-item @@contact-active">
                                        <a class="nav-link" href="/components/contact-form">Contact</a>
                                    </li>
                                    <li class="nav-item @@contact-active">
                                        <a class="nav-link logout" href="/admin/logout.php">LOGOUT</a>
                                    </li>
                                    <select name="language" id="language" onchange="set_lang()">
                                        <option value="en" <?php echo  $en_select; ?>>EN</option>
                                        <option value="hi" <?php echo  $hi_select; ?>>HI</option>
                                    </select>
                                </ul>
                                <h3 id="welcome">Welcome</h3>
                            <?php
                            }
                        } else
                        // if user is unauthorized
                        {
                            ?>
                            <ul class="navbar-nav" id="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="/index">Home<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item @@article-active ">
                                    <a class="nav-link" href="/components/articles">Articles</a>
                                </li>
                                <li class="nav-item dropdown @@dropdown-active ">
                                    <a class="dropbtn nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
                                        Blog <span class="fa fa-angle-down"></span>
                                        <span class="fa fa-angle-up"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-content" id="myDropdown" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item @@blog-active" href="blog.php">Featured Posts</a>
                                        <a class="dropdown-item @@blog-single-active" href="blog-single.html">Single post</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown @@pages-dropdown-active">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
                                        Pages <span class="fa fa-angle-down"></span>
                                        <span class="fa fa-angle-up"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-content  " aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item @@author-active" href="author.html">Author Page</a>
                                        <a class="dropdown-item @@error-active" href="error.html">404 Page</a>
                                        <a class="dropdown-item @@login-active" href="/components/login">Login</a>
                                        <a class="dropdown-item @@signup-active" href="/components/register">Signup</a>
                                        <a class="dropdown-item @@search-active" href="search-results.html">Search Results</a>
                                    </div>
                                </li>
                                <li class="nav-item @@about-active">
                                    <a class="nav-link" href="/components/about">About</a>
                                </li>
                                <li class="nav-item @@contact-active">
                                    <a class="nav-link" href="/components/contact-form">Contact</a>
                                </li>
                                <!-- language select -->
                                <li class="lang">
                                    <select name="language" id="language" onchange="set_lang()">
                                        <option value="en" <?php echo  $en_select; ?>>EN</option>
                                        <option value="hi" <?php echo  $hi_select; ?>>HI</option>
                                    </select>
                                </li>
                            </ul>
                            <!--/search-right-->
                            <div class="search-right">
                                <a href="#search" class="btn btn-light theme-button mr-lg-3 mt-lg-0 mt-4" title="search"><span class="fa fa-search" aria-hidden="true"></span> Topics</a>
                                <!-- search popup -->
                                <div id="search" class="pop-overlay">
                                    <div class="popup">
                                        <form action="../components/search-results" method="GET" class="search-box">
                                            <input type="search" placeholder="Search your Keyword" name="search" required="required" autofocus="">
                                            <button type="search" name="submit-search" class="btn"><span class="fa fa-search" aria-hidden="true"></span></button>
                                        </form>
                                        <div class="browse-items">
                                            <h3 class="hny-title two mt-md-5 mt-4">Browse all topics:</h3>
                                            <ul class="search-items">
                                                <li><a href="blog.html">Design Patterns</a></li>
                                                <li><a href="blog.html">Performance</a></li>
                                                <li><a href="blog.html">Photoshop</a></li>
                                                <li><a href="blog.html">User Experience</a></li>
                                                <li><a href="blog.html">Typography</a></li>
                                                <li><a href="blog.html">E-commerce</a></li>
                                                <li><a href="blog.html">HTML</a></li>
                                                <li><a href="blog.html">Illustration</a></li>
                                                <li><a href="blog.html">Design Patterns</a></li>
                                                <li><a href="blog.html">Performance</a></li>
                                                <li><a href="blog.html">Photoshop</a></li>
                                                <li><a href="blog.html">User Experience</a></li>
                                                <li><a href="blog.html">Typography</a></li>
                                                <li><a href="blog.html">E-commerce</a></li>
                                                <li><a href="blog.html">HTML</a></li>
                                                <li><a href="blog.html">Illustration</a></li>
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

                                <!--//search-right-->
                            </div>
                            <?php
                        }
                    }
                    // for Hindi language
                    else {
                        // if user is authorized
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                            // if ROLE is ADMIN
                            if ($_SESSION['role'] == "admin") {
                            ?>
                                <ul class="navbar-nav mx-auto" id="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/index?language=hi"><?php echo $header[$language][0]; ?><span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item @@article-active ">
                                        <a class="nav-link" href="/components/articles?language=hi"><?php echo $header[$language][1]; ?></a>
                                    </li>
                                    <li class="nav-item dropdown @@dropdown-active ">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
                                            <?php echo $header[$language][2]; ?> <span class="fa fa-angle-down"></span>
                                            <span class="fa fa-angle-up"></span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item @@blog-active" href="blog.php">Featured Posts</a>
                                            <a class="dropdown-item @@blog-single-active" href="blog-single.html">Single post</a>
                                        </div>
                                    </li>
                                    <li class="nav-item @@about-active">
                                        <a class="nav-link" href="/admin/index?language=hi"><?php echo $header[$language][9]; ?></a>
                                    </li>
                                    <li class="nav-item @@about-active">
                                        <a class="nav-link" href="/components/about?language=hi"><?php echo $header[$language][4]; ?></a>
                                    </li>
                                    <li class="nav-item @@contact-active">
                                        <a class="nav-link" href="/components/contact-form?language=hi"><?php echo $header[$language][5]; ?></a>
                                    </li>
                                    <li class="nav-item @@contact-active">
                                        <a class="nav-link logout" href="/admin/logout?language=hi"><?php echo $header[$language][8]; ?></a>
                                    </li>
                                    <!-- language select -->
                                    <li class="lang">
                                        <select name="language" id="language" onchange="set_lang()">
                                            <option value="en" <?php echo  $en_select; ?>>EN</option>
                                            <option value="hi" <?php echo  $hi_select; ?>>HI</option>
                                        </select>
                                    </li>
                                </ul>
                            <?php
                            }
                            // if ROLE is USER
                            else {
                            ?>
                                <ul class="navbar-nav mx-auto" id="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/index?language=hi"><?php echo $header[$language][0]; ?><span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item @@article-active ">
                                        <a class="nav-link" href="/components/articles?language=hi"><?php echo $header[$language][1]; ?></a>
                                    </li>
                                    <li class="nav-item dropdown @@dropdown-active ">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
                                            <?php echo $header[$language][2]; ?> <span class="fa fa-angle-down"></span>
                                            <span class="fa fa-angle-up"></span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item @@blog-active" href="blog.php">Featured Posts</a>
                                            <a class="dropdown-item @@blog-single-active" href="blog-single.html">Single post</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown @@pages-dropdown-active">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
                                            <?php echo $header[$language][3]; ?> <span class="fa fa-angle-down"></span>
                                            <span class="fa fa-angle-up"></span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item @@author-active" href="author.html">Author Page</a>
                                        </div>
                                    </li>
                                    <li class="nav-item @@about-active">
                                        <a class="nav-link" href="/components/about?language=hi"><?php echo $header[$language][4]; ?></a>
                                    </li>
                                    <li class="nav-item @@contact-active">
                                        <a class="nav-link" href="/components/contact-form?language=hi"><?php echo $header[$language][5]; ?></a>
                                    </li>
                                    <li class="nav-item @@contact-active">
                                        <a class="nav-link logout" href="/admin/logout?language=hi"><?php echo $header[$language][8]; ?></a>
                                    </li>
                                    <!-- language select -->
                                    <li class="lang">
                                        <select name="language" id="language" onchange="set_lang()">
                                            <option value="en" <?php echo  $en_select; ?>>EN</option>
                                            <option value="hi" <?php echo  $hi_select; ?>>HI</option>
                                        </select>
                                    </li>
                                </ul>
                                <h3 id="welcome">Welcome</h3>

                            <?php
                            }
                        }
                        // if user is unauthorized
                        else {
                            ?>
                            <ul class="navbar-nav mx-auto" id="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="/index?language=hi"><?php echo $header[$language][0]; ?><span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item @@article-active ">
                                    <a class="nav-link" href="/components/articles?language=hi"><?php echo $header[$language][1]; ?></a>
                                </li>
                                <li class="nav-item dropdown @@dropdown-active ">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
                                        <?php echo $header[$language][2]; ?> <span class="fa fa-angle-down"></span>
                                        <span class="fa fa-angle-up"></span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item @@blog-active" href="blog.php">Featured Posts</a>
                                        <a class="dropdown-item @@blog-single-active" href="blog-single.html">Single post</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown @@pages-dropdown-active">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
                                        <?php echo $header[$language][3]; ?> <span class="fa fa-angle-down"></span>
                                        <span class="fa fa-angle-up"></span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item @@author-active" href="author.html">Author Page</a>
                                        <a class="dropdown-item @@error-active" href="error.html">404 Page</a>
                                        <a class="dropdown-item @@login-active" href="/components/login">Login</a>
                                        <a class="dropdown-item @@signup-active" href="/components/register">Signup</a>
                                        <a class="dropdown-item @@search-active" href="search-results.html">Search Results</a>
                                    </div>
                                </li>
                                <li class="nav-item @@about-active">
                                    <a class="nav-link" href="/components/about"><?php echo $header[$language][4]; ?></a>
                                </li>
                                <li class="nav-item @@contact-active">
                                    <a class="nav-link" href="/components/contact-form"><?php echo $header[$language][5]; ?></a>
                                </li>
                                <!-- language select -->
                                <li class="lang">
                                    <select name="language" id="language" onchange="set_lang()">
                                        <option value="en" <?php echo  $en_select; ?>>EN</option>
                                        <option value="hi" <?php echo  $hi_select; ?>>HI</option>
                                    </select>
                                </li>
                            </ul>
                            <!--/search-right-->
                            <div class="search-right">
                                <a href="#search" class="btn btn-light theme-button mr-lg-3 mt-lg-0 mt-4" title="search"><span class="fa fa-search" aria-hidden="true"></span> Topics</a>
                                <!-- search popup -->
                                <div id="search" class="pop-overlay">
                                    <div class="popup">
                                        <form action="../components/search-results" method="GET" class="search-box">
                                            <input type="search" placeholder="Search your Keyword" name="search" required="required" autofocus="">
                                            <button type="search" name="submit-search" class="btn"><span class="fa fa-search" aria-hidden="true"></span></button>
                                        </form>
                                        <div class="browse-items">
                                            <h3 class="hny-title two mt-md-5 mt-4">Browse all topics:</h3>
                                            <ul class="search-items">
                                                <li><a href="blog.html">Design Patterns</a></li>
                                                <li><a href="blog.html">Performance</a></li>
                                                <li><a href="blog.html">Photoshop</a></li>
                                                <li><a href="blog.html">User Experience</a></li>
                                                <li><a href="blog.html">Typography</a></li>
                                                <li><a href="blog.html">E-commerce</a></li>
                                                <li><a href="blog.html">HTML</a></li>
                                                <li><a href="blog.html">Illustration</a></li>
                                                <li><a href="blog.html">Design Patterns</a></li>
                                                <li><a href="blog.html">Performance</a></li>
                                                <li><a href="blog.html">Photoshop</a></li>
                                                <li><a href="blog.html">User Experience</a></li>
                                                <li><a href="blog.html">Typography</a></li>
                                                <li><a href="blog.html">E-commerce</a></li>
                                                <li><a href="blog.html">HTML</a></li>
                                                <li><a href="blog.html">Illustration</a></li>
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

                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="mobile-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label for="checkbox" class="theme-switch">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <span class="fa fa-sun"></span>
                                    <span class="fa fa-moon"></span>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
            </nav>
        </div>
    </header>
    <?php
    include('domainModal.php');
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- navbar toggle function -->
    <script>
        function myFunction() {
            var x = document.getElementById('navbarTogglerDemo02');
            var cross = document.getElementById('cross');
            var bars = document.getElementById('bars');


            if (x.style.display === "block") {
                x.style.display = "none";
                cross.style.display = 'none';
                bars.style.display = 'block';

            } else {
                x.style.display = "block";
                cross.style.display = 'block';
                bars.style.display = 'none';
            }
        }
    </script>

    <script type="text/javascript">
        $(function() {
            // this will get the full URL at the address bar
            var url = window.location.href;

            // passes on every "a" tag 
            $(".nav-link").each(function() {
                // checks if its the same on the address bar
                if (url == (this.href)) {
                    $(this).closest("a").addClass("active");
                }
            });
        });
    </script>
    <!-- for website translation -->
    <script type="text/javascript">
        function set_lang() {
            var language = $('#language').val();
            window.location.href = '?language=' + language;
        }
    </script>


    <script src=" ../assets/js/jquery.js"></script>
</body>

</html>