<?php


class TaskException extends Exception
{
}


class Task
{
    private $id;
    private $title;
    private $description;
    private $deadline;
    private $completed;

    public function __construct(int $id, string $title, string $description, Datetime $deadline, string $completed)
    {
        $this->setId($id);
        $this->setTitle($title);
        $this->setDescription($description);
        $this->setDeadline($deadline);
        $this->setCompleted($completed);
    }

    public function getTaskArray(): array
    {
        $task = array();
        $task['id'] = $this->getId();
        $task['title'] = $this->getTitle();
        $task['description'] = $this->getDescription();
        $task['deadline'] = $this->getDeadline();
        $task['completed'] = $this->getCompleted();

        return $task;
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

    /**
     * Get the value of description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     */
    public function setDescription(string $description): void
    {
        if (strlen($description) < 0 || strlen($description) > 255) {
            throw new TaskException("Description len is invalid");
        }

        $this->description = $description;
    }

    /**
     * Get the value of deadline
     */
    public function getDeadline(): ?DateTime
    {
        return $this->deadline;
    }

    /**
     * Set the value of deadline
     *
     */
    public function setDeadline(DateTime $deadline): void
    {
        if ($deadline === null) {
            throw new TaskException("Deadline date time error");
        }

        $this->deadline = $deadline;
    }

    /**
     * Get the value of completed
     */
    public function getCompleted(): string
    {
        return $this->completed;
    }

    /**
     * Set the value of completed
     *
     */
    public function setCompleted(string $completed): void
    {
        if (strtoupper($completed) !== 'Y' && strtoupper($completed) !== 'N') {
            throw new TaskException("Completed value is invalid");
        }
        $this->completed = $completed;
    }
}
