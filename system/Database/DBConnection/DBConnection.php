<?php

namespace System\Database\DBConnection;

use PDO;
use PDOException;
use System\Config\Config; // اضافه کردن کلاس Config

class DBConnection
{
    private static $dbConnectionInstance = null;

    // Constructor remains private for singleton pattern
    private function __construct()
    {
    }

    // Singleton method to get a single instance of the connection
    public static function getDBConnectionInstance()
    {
        if (self::$dbConnectionInstance == null) {
            $DBConnectionInstance = new DBConnection();
            self::$dbConnectionInstance = $DBConnectionInstance->dbConnection();
        }

        return self::$dbConnectionInstance;
    }

    // Method to create a new PDO connection using config settings
    private function dbConnection()
    {
        // Fetching database configuration from Config class
        $dbHost = Config::get('database.DBHOST');
        $dbName = Config::get('database.DBNAME');
        $dbUsername = Config::get('database.DBUSERNAME');
        $dbPassword = Config::get('database.DBPASSWORD');

        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        try {
            // Using the fetched values to create a new PDO connection
            return new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword, $options);
        } catch (PDOException $e) {
            echo "Error in database connection: " . $e->getMessage();
            return false;
        }
    }

    // Method to get the last inserted ID from the database
    public static function newInsertId()
    {
        return self::getDBConnectionInstance()->lastInsertId();
    }
}
