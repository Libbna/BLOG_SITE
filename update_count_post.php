<?php
require_once("includes/config.php");
$type = $_POST['type'];
$articleID = $_POST['articleID'];
if ($type == 'like') {
    $stmt = $db->query("UPDATE article SET likes=likes+1 WHERE articleID='$articleID'");
}
