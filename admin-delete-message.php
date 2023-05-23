<?php
include_once('database.php');
if(!isset($_GET['id'])) {
    header('Location: admin-posts.php');
    exit();
}
deleteMessage();
header('Location: admin-messages.php');