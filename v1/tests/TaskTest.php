<?php

use PHPUnit\Framework\TestCase;

require_once('v1/model/Task.php');


class TaskTest extends TestCase
{
    /**
     * @test
     */
    public function test_GetTaskArray_ValidParameters_ReturnTaskArray(): void
    {
        // Arrange
        $id = random_int(100, 999);
        $title = str_shuffle("Ab");
        $description = str_shuffle("Ab");
        $deadline = new DateTime('NOW');
        $completed = rand(0, 1) == 1 ? "N" : "Y";

        $response = new Task($id, $title, $description, $deadline, $completed);

        // Act
        $result = $response->getTaskArray();


        // Assert
        $this->assertIsArray($result);
        $this->assertEquals($title, $result['title'], $title);
    }
}
