<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../model/Post.php';

$db = new Database;
$database = $db->connect();

$post = new Post($database);

$post->id = $_GET['id'] ?? die();

$post->single_post();
$post_arr = [
    'id'=>$post->id,
    'title'=>$post->title,
    'body'=>$post->body,
    'author' => $post->author
];

print_r(json_encode($post_arr));