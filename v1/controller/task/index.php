<?php

require_once('../../../config/DB.php');
require_once('../../dao/TaskDao.php');
require_once('../../model/Response.php');

class Index
{
    private $taskDao;

    public function __construct()
    {
        $this->taskDao = new TaskDao();
        $this->getResponseData();
    }

    public function getResponseData()
    {
        $data =  $this->taskDao->getAll();

        $response = new Response();
        $response->setSuccess(true);
        $response->setHttpStatusCode(200);
        $response->addMessage("");
        $response->setData($data);
        $response->send();
    }
}

new Index();
