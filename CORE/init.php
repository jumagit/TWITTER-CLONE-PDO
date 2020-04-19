<?php
include 'DATABASE/connection.php';
include 'CLASSES/user.php';
include 'CLASSES/tweet.php';
include 'CLASSES/follow.php';

global $pdo;

session_start();

$getFromU = new User($pdo);
$getFromU = new Tweet($pdo);
$getFromU = new Follow($pdo);

define("BASE_URL", "http://localhost/Twitter/");

?>
