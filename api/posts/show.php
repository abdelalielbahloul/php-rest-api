<?php
require_once '../middlewares/headers.php';
require_once '../middlewares/connect.php';
require_once '../../models/Post.php';

// Intanciate the Post Class
$post = new Post($db);

//get the id from url
$post->id = isset($_GET['id']) ? $_GET['id'] : die();

$post->show();

$res = array(
    'id' => $post->id,
    'title' => $post->title,
    'body' => $post->body
);

echo json_encode($res);