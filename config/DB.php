<?php

class DB
{
    private static $connection;

    public static function getConnection()
    {
        if (self::$connection === null) {

            // read parameters in the ini configuration file
            $params = parse_ini_file('database.ini');

            if ($params === false) {
                throw new \Exception("Error reading database configuration file");
            }

            // connect to the postgre sql database
            $conStr = sprintf(
                "pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
                $params['host'],
                $params['port'],
                $params['database'],
                $params['user'],
                $params['password']
            );


            self::$connection = new \PDO($conStr);
            self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$connection->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        }
        return self::$connection;
    }
}
