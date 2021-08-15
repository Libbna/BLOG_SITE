<?php
require_once('../includes/config.php');

//if user is not logged in
if (!$user->is_logged_in()) {
    header('location: login.php');
};

if (isset($_POST['submit'])) {
    extract($_POST);
    if ($articleTitle == '') {
        $error[] = 'Please enter Title';
    }
    if ($articleDesc == '') {
        $error[] = 'Please enter Description';
    }
    if ($articleContent == '') {
        $error[] = 'Please enter Content';
    }
    if ($articleAuthor == '') {
        $error[] = 'Please enter Author Name';
    }

    if (!isset($error)) {
        try {
            $stmt = $db->prepare('INSERT INTO article (articleTitle, articleDesc, articleContent, articleAuthor) VALUES (:articleTitle, :articleDesc, :articleContent, :articleAuthor)');
            $stmt->execute(array(
                ':articleTitle' => $articleTitle,
                ':articleDesc' => $articleDesc,
                ':articleContent' => $articleContent,
                ':articleAuthor' => $articleAuthor,
            ));

            header('location:index.php?action=added');
            exit;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

if (isset($error)) {
    foreach ($error as $error) {
        echo '<p class="message>' . $error . '</p>';
    }
}
?>



<!-- <link href="http://localhost/blog/admin/assets/style.css" rel="stylesheet" type="text/css"> -->
<link rel="stylesheet" href="./assets/style.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<title>Add new Article</title>
<?php
include("header.php");
?>

<div class=" container mt-5">
    <form action="" method="post">

        <input type="text" name="articleTitle" class="input bg-dark text-white my-3 " placeholder="Title" autocomplete="off" value="<?php if (isset($error)) {
                                                                                                                                        echo $_POST['articleTitle'];
                                                                                                                                    } ?>">


        <textarea name="articleDesc" class="input bg-dark text-white my-3 " placeholder="Description"><?php if (isset($error)) {
                                                                                                            echo $_POST['articleDesc'];
                                                                                                        } ?></textarea>


        <textarea name="articleContent" class=" input body_content bg-dark text-white my-3 ml-2 " placeholder="Content"><?php if (isset($error)) {
                                                                                                                            echo $_POST['articleContent'];
                                                                                                                        } ?></textarea>

        <input type="text" name="articleAuthor" class="input bg-dark text-white my-3" placeholder="Author" autocomplete="off" value="<?php if (isset($error)) {
                                                                                                                                            echo $_POST['articleAuthor'];
                                                                                                                                        } ?>">

        <button name="submit" class="subbtn">+ Add Article</button>


    </form>



</div>