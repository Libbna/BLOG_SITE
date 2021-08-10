<?php
require_once('../includes/config.php');

//if user is not logged in
if (!$user->is_logged_in()) {
    header('location: login.php');
}

if (isset($_GET['delpost'])) {
    $stmt = $db->prepare('DELETE FROM article WHERE articleID=:articleID');
    $stmt->execute(array(':articleID' => $_GET['delpost']));
    header('location:index.php ? action=deleted');
    exit;
}
?>

<title> Admin Page </title>

<head>
    <!-- <link rel="stylesheet" href="http://localhost/blog/assets/style.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    .content1 {
        margin: auto;
        margin-top: 100px;
        width: 80%;
    }

    tr {
        font-size: 20px;
    }

    td {
        font-size: 18px;
        font-family: sans-serif;
    }

    thead {
        background-color: #DE4839;
        color: white;
    }
</style>
<script type="text/javascript">
    function delpost(id, title) {
        if (confirm("Are you sure you want to delete '" + title + "'")) {
            window.location.href = 'index.php ? delpost=' + id;
        }
    }
</script>

<?php include("header.php"); ?>
<div class="content1">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <?php

        try {
            $stmt = $db->query('SELECT articleID, articleTitle, articleDesc, articleAuthor FROM article ORDER BY articleID DESC');
            while ($row = $stmt->fetch()) {
                echo '<tbody>';
                echo '<tr>';
                echo '<td>' . $row['articleTitle'] . '</td>';
                echo '<td>' . $row['articleAuthor'] . '</td>';
        ?>

                <td>
                    <a class="btn btn-success" role="button" href="edit-blog-article.php?id = <?php echo $row['articleID']; ?>">Edit</a>
                </td>
                <td>
                    <a class="btn btn-danger" role="button" href="javascript:delpost('<?php echo $row['articleID']; ?>','<?php echo $row['articleTitle']; ?>')">Delete</a>
                </td>

        <?php
                echo '</tr>';
                echo '</tbody>';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        ?>
    </table>

    <a class="btn btn-success" role="button" href="add-blog-article.php">Add New Article</a>





</div>