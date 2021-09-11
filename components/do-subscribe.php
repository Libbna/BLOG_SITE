<?php

require_once("../includes/config.php");

$email = $_POST["email"];
$stmt = $db->query("INSERT INTO subscribers (semail) VALUES ('$email')");
