<?php

use PHPUnit\Framework\TestCase;

require_once('v1/dao/TaskDao.php');


class TaskDaoTest extends TestCase
{
    /**
     * @test
     */
    public function test_GetAll_ValidParameters_ReturnTaskArray(): void
    {
        // Arrange
        $taskDao = new TaskDao();

        // Act
        $result = $taskDao->getAll();

        // Assert
        $this->assertIsArray($result);
    }
}
