<?php

require_once("config.php");

$email = $_POST["email"];
$stmt = $db->query("INSERT INTO subscribers (semail) VALUES ('$email')");
