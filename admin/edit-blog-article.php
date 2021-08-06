<?php require_once('../includes/config.php');

if (!$user->is_logged_in()) {
    header('Location: login.php');
}
?>
<title>Update Article</title>

<?php include("header.php");  ?>

<div class="content">

    <h2>Edit Post</h2>


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
                    ':articleDescrip' => $articleDescrip,
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
            echo $error;
        }
    }

    try {

        $stmt = $db->prepare('SELECT articleID, articleTitle, articleDesc, articleContent FROM article WHERE articleID = :articleID');
        $stmt->execute(array(':articleID' => $_GET['articleID']));
        $row = $stmt->fetch();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    ?>

    <form action='' method='post'>
        <input type='hidden' name='articleID' value="<?php echo $row['articleID']; ?>">

        <h2><label>Article Title</label><br>
            <input type='text' name='articleTitle' style="width:100%;height:40px" value="<?php echo $row['articleTitle']; ?>">
        </h2>

        <h2><label>Short Description(Meta Description) </label><br>
            <textarea name='articleDesc' cols='120' rows='6'><?php echo $row['articleDesc']; ?></textarea>
        </h2>

        <h2><label>Long Description(Body Content)</label><br>
            <textarea name='articleContent' id='textarea1' class='mceEditor' cols='120' rows='20'><?php echo $row['articleContent']; ?></textarea>
        </h2>

        <button name='submit' class="subbtn"> Update</button>

    </form>

</div>