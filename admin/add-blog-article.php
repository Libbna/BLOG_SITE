<?php
require_once('../includes/config.php');

//if user is not logged in
if (!$user->is_logged_in()) {
    header('location: login.php');
}; ?>



<link href="http://localhost/blog/admin/assets/style.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<title>Add new Article</title>
<?php
include("header.php");
?>



<div class="container mt-5">
    <form action="" method="post">

        <input type="text" name="articleTitle" class="input bg-dark text-white my-3 " placeholder="Title" autocomplete="off" value="<?php if (isset($error)) {
                                                                                                                                        echo $_POST['articleTitle'];
                                                                                                                                    } ?>">
        </h2>

        <textarea name="articleDesc" class="input bg-dark text-white my-3 " placeholder="Description"><?php if (isset($error)) {
                                                                                                            echo $_POST['articleDesc'];
                                                                                                        } ?></textarea>
        </h2>

        <textarea name="articleContent" class=" input body_content bg-dark text-white my-3 ml-2 " placeholder="Content"><?php if (isset($error)) {
                                                                                                                            echo $_POST['articleContent'];
                                                                                                                        } ?></textarea>
        </h2>
        <input type="text" name="articleAuthor" class="input bg-dark text-white my-3" placeholder="Author" autocomplete="off" value="<?php if (isset($error)) {
                                                                                                                                            echo $_POST['articleAuthor'];
                                                                                                                                        } ?>">
        </h2>
        <button name="submit" class="subbtn">+ Add Article</button>


    </form>



</div>