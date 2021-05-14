<?php

use PHPUnit\Framework\TestCase;

require_once('config/DB.php');

class DBTest extends TestCase
{
    /** @test */
    public function test_connectWriteDB_ValidParameters_ReturnConnection(): void
    {
        //when
        $connection = DB::getConnection();

        //then
        $this->assertInstanceOf(PDO::class, $connection);
    }
}
