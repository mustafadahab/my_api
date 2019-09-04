<?php
/**
 * Created by PhpStorm.
 * User: Mustafa
 * Date: 8/26/2019
 * Time: 3:55 PM
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once "../../config/DB.php";
include_once "../../models/post.php";


$database = new DB();
$connection = $database->connect();

$post= new post($connection);

//get posts
/* "title"         => htmlspecialchars(strip_tags($_POST['title'])),
            "body"          => $_POST['body'],
            "author"        => $_POST['author'],
            "category_id"   => $_POST['category_id']
 * */
$posted_data=json_decode(file_get_contents("php://input"));

    $post->title=$posted_data->title;
    $post->body=$posted_data->body;
    $post->author=$posted_data->author;
    $post->category_id=$posted_data->category_id;
    $create = $post->update();

    if($create){
        echo json_encode(
            array(
                'data' => "inserted",
                'response' => 201
            )
        );
    }

    else{

        echo json_encode(
            array('message' => 'Not Inserted', 'response' => 200)
        );

    }



