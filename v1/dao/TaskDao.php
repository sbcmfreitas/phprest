<?php

require_once('../../dao/TaskDao.php');
require_once('../../model/Task.php');

class TaskDao
{
    private $connection;

    public function __construct()
    {
        $this->connection = DB::getConnection();
    }

    public function getAll(): array
    {
        $sth = $this->connection->prepare("SELECT id, title FROM public.task");
        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_CLASS, "Task");

        return $result;
    }
}
