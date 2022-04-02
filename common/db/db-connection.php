<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config.php';

class DbDriver
{

    private static $instance = false;

    private function __construct()
    {

    }

    /**
     * Connection
     * @return PDO
     */
    public static function getConnection()
    {
        if (!self::$instance) {
            $host = DB_HOST;
            $dbName = DB_NAME;
            $connection = new PDO("mysql:host=$host;dbname=$dbName", DB_USER, DB_PASSWORD);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance = $connection;
        }
        return self::$instance;
    }
}
