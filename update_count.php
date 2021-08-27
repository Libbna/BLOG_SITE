<?php
require_once("includes/config.php");
$type = $_POST['type'];
$cid = $_POST['cid'];
if ($type == 'like') {
    $stmt = $db->query("UPDATE comments SET like_count=like_count+1 WHERE cid='$cid'");
}
