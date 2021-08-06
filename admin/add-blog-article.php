<?php
require_once('../includes/config.php');

//if user is not logged in
if (!$user->is_logged_in()) {
    header('location: login.php');
}; ?>

<title>Add new Article</title>
<?php include("header.php"); ?>

<div class="content">
    <h1>Add New Article</h1>
    <?php
    if (isset($_POST['submit'])) {
        extract($_POST);
        if ($articleTitle == '') {
            $error[] = 'Please enter Title';
        }
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


    <form action="" method="post">

        <h2><label>Article Title</label><br>
            <input type="text" name="articleTitle" style="width:100%;height:40px" value="<?php if (isset($error)) {
                                                                                                echo $_POST['articleTitle'];
                                                                                            } ?>">
        </h2>

        <h2><label>Short Description(Meta Description) </label><br>
            <textarea name="articleDesc" cols="120" rows="6"><?php if (isset($error)) {
                                                                    echo $_POST['articleDesc'];
                                                                } ?></textarea>
        </h2>

        <h2><label>Long Description(Body Content)</label><br>
            <textarea name="articleContent" id="textarea1" class="mceEditor" cols="120" rows='20'><?php if (isset($error)) {
                                                                                                        echo $_POST['articleContent'];
                                                                                                    } ?></textarea>
        </h2>
        <h2><label>Author</label><br>
            <input type="text" name="articleAuthor" value="<?php if (isset($error)) {
                                                                echo $_POST['articleAuthor'];
                                                            } ?>">
        </h2>



        <button name="submit" class="subbtn">Submit</button>


    </form>



</div>

?>