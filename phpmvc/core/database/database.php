<?php
class Database {

    public static $connection = null;

    public function __construct()
    {
        if (self::$connection) {
            return self::$connection;
        }

        $this->connect();
    }

    public function connect() {

        // Create connection
        self::$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
        // Check connection
        if (self::$connection->connect_error) {
            die("Connection failed: " . self::$connection->connect_error);
        }
    }

    public function disconnect() {
        self::$connection->close();
    }

}