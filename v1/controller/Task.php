<?php

require_once('../../config/DB.php');
require_once('../model/Task.php');
require_once('../model/Response.php');

try {
    $connection = DB::getConnection();
} catch (PDOException $ex) {
    $response = new Response();
    $response->setHttpStatusCode(500);
    $response->setSuccess(false);
    $response->addMessage('Database connection error');
    $response->send();
}
