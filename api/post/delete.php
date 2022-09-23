<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../model/Post.php';

$db = new Database;
$database = $db->connect();

$post = new Post($database);

$data = json_decode(file_get_contents("php://input"));


$post->id = $data->id;

if($post->delete()) {
    echo json_encode(
        array('message'=>'Post is Deleted')
    );
} else {
    echo json_encode(
        array('message'=>'Post not deleted')
    );
}