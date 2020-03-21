<?php
require_once '../middlewares/headers.php';
require_once '../middlewares/connect.php';
require_once '../../models/Post.php';

// Intanciate the Post Class
$post = new Post($db);

// get Results 
$result = $post->index();
$num = $result->rowCount();

if ($num > 0) {
    $posts = array();
    $posts['data'] = array();
    
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $items = array(
            'id' => $id,
            'title' => $title,
            'body' => $body
        );

        // push the items into posts array
        array_push($posts['data'], $items);
    }
    // return the json to the client 
    echo json_encode($posts);
} else {
    echo json_encode(array('message' => 'No data found'));
}
