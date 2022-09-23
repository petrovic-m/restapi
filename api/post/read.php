<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../model/Post.php';

$db = new Database;
$database = $db->connect();

$post = new Post($database);

$result = $post->read();

$num = $result->rowCount();

if($num > 0) {
    $posts_arr = [];
    $posts_arr['data'] = [];

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $post_item = [
            'id' => $id,
            'title' => $title,
            'body' => htmlspecialchars_decode($body),
            'author' => $author
        ];

        array_push($posts_arr['data'], $post_item);

    }

    echo json_encode($posts_arr);
} else {
    echo 'There no have posts';
}