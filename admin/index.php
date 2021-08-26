<?php
require_once('../includes/config.php');

//if user is not logged in
if (!$user->is_logged_in()) {
    header('location: login.php');
}
?>

<title> Admin Page </title>

<head>
    <link rel="stylesheet" href="./assets/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<script type="text/javascript">
    function delpost(id, title) {
        if (confirm("Are you sure you want to delete '" + title + "'")) {
            window.location.href = 'index.php ? delpost=' + id;
        }
    }
</script>

<?php include("header.php"); ?>


<?php if (isset($_REQUEST['action'])) { ?>
    <?php if ($_REQUEST['action'] == "added") { ?>
        <div class="alert alert-success" role="alert">
            Article has been added successfuly!
        </div>

    <?php } ?>
<?php } ?>

<?php if (isset($_REQUEST['action'])) { ?>
    <?php if ($_REQUEST['action'] == "deleted") { ?>
        <div class="alert alert-danger" role="alert">
            Article has been deleted successfuly!
        </div>

    <?php } ?>
<?php } ?>
<?php if (isset($_REQUEST['action'])) { ?>
    <?php if ($_REQUEST['action'] == "updated") { ?>
        <div class="alert alert-primary" role="alert">
            Article has been updated successfuly!
        </div>

    <?php } ?>
<?php } ?>


<table class="table table-hover">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Author</th>
            <th>Profile</th>

        </tr>
    </thead>
    <?php

    try {
        $stmt = $db->query('SELECT articleID, articleTitle, articleDesc, articleAuthor, profile_img FROM article ORDER BY articleID DESC');
        while ($row = $stmt->fetch()) {

            echo '<tbody>';
            echo '<tr id="row">';
            echo '<td class="w-25">' . $row['articleTitle'] . '</td>';
            echo '<td class="w-25">' . $row['articleDesc'] . '</td>';
            echo '<td class=" style="width: 15%;">' . $row['articleAuthor'] . '</td>';
    ?>
            <td class="w-25"><img src="<?php echo $row['profile_img'] ?>" alt="" height="100px" width="100px"></td>
            <td>
                <div id="mybtn" class="btn-group btn-group-md">
                    <?php
                    echo '<a type="button" class="btn btn-success" id="edit" href="http://blogsite.com/admin/edit-blog-article.php?id=' . $row['articleID'] . '"><i class="fa fa-edit"></i></a>';
                    ?>

                    </a>
                    <a id="trash" type="button" class="btn btn-danger" role="button" href="javascript:delpost('<?php echo $row['articleID']; ?>','<?php echo $row['articleTitle']; ?>')">
                        <i class="fa fa-trash"></i>
                    </a>
                    <?php
                    echo '<a type="button" class="btn btn-primary" href="http://blogsite.com/admin/view-article.php?id=' . $row['articleID'] . '"><i class="fa fa-eye"></i></a>';
                    ?>

                </div>
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

<a id="add" class="btn btn-success" role="button" href="add-blog-article.php">Add Article</a>
<a id="add_banner" class="btn btn-primary" role="button" href="add_view-banner.php">Add / View Banner</a>




<!-- <script type="text/javascript">
    var row = document.getElementById("row");
    var mybtn = document.getElementById("mybtn");

    row.onmouseover = function() {
        mybtn.style.display = "flex";
    }

    row.onmouseout = function() {
        mybtn.style.display = "none";
    }
</script> -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>