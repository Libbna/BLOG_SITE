<?php require_once('../includes/config.php');

if (!$user->is_logged_in()) {
    header('Location: login.php');
}
?>

<title>Update Article</title>

<head>

    <link rel="stylesheet" href="./assets/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<?php include("header.php");  ?>



<div class="container">

    <?php


    if (isset($_POST['submit'])) {


        //collect form data
        extract($_POST);

        //very basic validation
        if ($articleID == '') {
            $error[] = 'This post is missing a valid id!.';
        }

        if ($articleTitle == '') {
            $error[] = 'Please enter the title.';
        }

        if ($articleDesc == '') {
            $error[] = 'Please enter the description.';
        }

        if ($articleContent == '') {
            $error[] = 'Please enter the content.';
        }

        if (!isset($error)) {
            try {
                //insert into database
                $stmt = $db->prepare('UPDATE article SET articleTitle = :articleTitle,  articleDesc = :articleDesc, articleContent = :articleContent WHERE articleID= :articleID');
                $stmt->execute(array(
                    ':articleTitle' => $articleTitle,
                    ':articleDesc' => $articleDesc,
                    ':articleContent' => $articleContent,
                    ':articleID' => $articleID,

                ));

                //redirect to index page
                header('Location: index.php?action=updated');
                exit;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    ?>


    <?php
    //check for any errors
    if (isset($error)) {
        foreach ($error as $error) {
            echo $error . '<br>';
        }
    }

    try {

        $stmt = $db->prepare('SELECT articleID, articleTitle, articleDesc, articleContent FROM article WHERE articleID = :articleID');
        $stmt->execute(array(':articleID' => $_GET['id']));
        $row = $stmt->fetch();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }


    ?>

    <form action="" method="post">

        <input type='hidden' name='articleID' autocomplete="off" value="<?php echo $row['articleID']; ?>">
        <input type="text" name="articleTitle" class="input" value="<?php echo $row['articleTitle']; ?>">
        <textarea class="edit_textarea" name='articleDesc' cols='60' rows='5'><?php echo $row['articleDesc']; ?></textarea>
        <textarea class="edit_textarea" name='articleContent' id='textarea1' cols='70' rows='10'><?php echo $row['articleContent']; ?></textarea>
        <button name="submit" class="subbtn">Update</button>
    </form>






</div>