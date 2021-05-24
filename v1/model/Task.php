<?php


class TaskException extends Exception
{
}


class Task
{
    private $id;
    private $title;

    public function __construct()
    {
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     */
    public function setId(int $id): void
    {
        if ($id !== null && !is_numeric($id)) {
            throw new TaskException("Id is null or invalid");
        }
        $this->id = $id;
    }

    /**
     * Get the value of title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     */
    public function setTitle(string $title): void
    {
        if (strlen($title) < 0 || strlen($title) > 255) {
            throw new TaskException("Title len is invalid");
        }
        $this->title = $title;
    }
}
