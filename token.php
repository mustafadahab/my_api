<?php
/**
 * Created by PhpStorm.
 * User: Mustafa
 * Date: 8/28/2019
 * Time: 6:17 PM
 */
// include our OAuth2 Server object
require_once __DIR__.'/server.php';

// Handle a request for an OAuth2.0 Access Token and send the response to the client
$server->handleTokenRequest(OAuth2\Request::createFromGlobals())->send();