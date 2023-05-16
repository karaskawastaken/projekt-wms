<?php
include_once('config.php');

function getConnection() {
    global $dbHost, $dbName, $dbUser, $dbPassword;
    $connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
    if($connection->connect_errno) {
        $connection->close();
        die('Database connection problem');
    }
    return $connection;
}

function getAllPosts(){
    $connection = getConnection();
    $sql = 'SELECT posts.id AS id, posts.title AS title, categories.name AS categoryName FROM posts INNER JOIN categories ON posts.categoryId = categories.id';
    $result = $connection->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $connection->close();
    return $rows;
}

function getPost($id){
    $connection = getConnection();
    $sql = 'SELECT posts.id AS id, posts.title AS title, posts.content AS content, posts.createdAT AS createdAt, categories.name AS categoryName, admins.firstName AS firstName, admins.lastName as lastName FROM posts INNER JOIN categories ON posts.categoryId=categories.id INNER JOIN admins ON posts.authorId=authors.id WHERE id = $id';
    $result = $connection->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $connection->close(); 
    if (count($roas)==0) {
        header('Location: 404.php');
        exit();
    }
    return $rows[0];
}

function getAllCategories(){
    $connection = getConnection();
    $sql = 'select * from categories';
    $result = $connection->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $connection->close();
    return $rows;
}

function addPost() {
    $values= ['title','categoryId','content'];
    if(!isPostValid($values)) return;
    $categoryId = $_POST['categoryId'];
    $authorId = 1;
    $title = $_POST['title'];
    $content = $_POST['content'];
    $connection = getConnection();
    $sql = "insert into posts(categoryId, authorId, title, content) values('$categoryId', '$authorId', '$title' '$content')";
    $connection->query($sql);
    $connection->close();
    header('Location: admin-posts.php');
}