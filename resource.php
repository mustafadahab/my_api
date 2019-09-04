<?php

// include our OAuth2 Server object
require_once __DIR__.'/server.php';
include_once __DIR__."./api/get/read.php";



// Handle a request to a resource and authenticate the access token
if (!$server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
    $server->getResponse()->send();
    die;
}
else{
    $input=file_get_contents("php://input");

    $parameters = explode("&",$input);
    $request = explode("=",$parameters[1]);

    $request_array=json_decode(urldecode($request[1]));
    /*die(var_dump($request_array->action)); die();*/
    $stmt=$storage->getConnection();
    $read = new read($stmt);

    switch ($request_array->action){
        case "get_all":{
            var_dump(json_encode(array('success' => true, 'message' =>$read->read_all()->fetch(PDO::FETCH_ASSOC))));
        }break;
        case "get_one":{

        }break;
        default:{
            echo "action not found";
        }
    }



    /*echo json_encode(array('success' => true, 'message' => 'You accessed my APIs!'));*/
}

