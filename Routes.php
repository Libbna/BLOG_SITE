<?php

include("/controller/blogSingle_Controller.php");

Route::set('blog-single', function() {
    // echo "blog single";
    blogsingle::CreateView('blog-single');
});

Route::get('blog-single', function() {
    $obj = new BlogSingle();
    $obj->blog_single();
         
});

// require_once(__DIR__ . "/router.php");


// get('/', 'index.php');

// get('/index', 'index.php');

// get('/login', 'components/login.php');

// get('/register', 'components/register.php');

// get('/about', '/components/about.php');

// get('/blog-single/$id', 'blog-single.php');

// any('/404error', '404error.php');

// any('/403error', '403error.php');
