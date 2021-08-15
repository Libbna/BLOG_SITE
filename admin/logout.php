<?php
require_once('../includes/config.php');

$user->logout();
header('Location: http://blogsite.com/index.php');
