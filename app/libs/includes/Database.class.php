<?php

/**
 * The DatabaseConnection is a class with public static methods used to access the database client objects originally created during the session. It has access to all the databases accross the server.
 */
class DatabaseConnection
{
    /**
     * Defined by WebApi in Init.php
     * @var MongoDB/Client
     */
    public static $client = null;

    public static function checkDatabaseConnection(){
        // return true;
        try {
            self::$client->listDatabases();
            return true;
        } catch (Exception $e) {
            return false;
        }
        // if (self::$client->selectServer(false)) {
        //     return true;
        // } else {
        //     return false;
        // }
    }

    /**
     * From the Constants, it reads provides the Database object for the requested database.
     * @return MongoDB/Database
     */
    public static function getDefaultDatabase()
    {
        if(self::checkDatabaseConnection()){
            return DatabaseConnection::$client->{get_config('database_main')};
        } else{
            self::$client = new MongoDB\Client(get_config("database_conn_string"));
        }
        return DatabaseConnection::$client->{get_config('database_main')};
    }

    public static function getDefaultManager()
    {
        return new MongoDB\Driver\Manager(get_config("database_conn_string"));
    }

    /**
     * From the Constants, it reads provides the Database object for the requested database.
     * @return MongoDB/Database
     */
    public static function getStatsDatabase()
    {
        if(self::checkDatabaseConnection()){
            return DatabaseConnection::$client->{get_config('database_stat')};
        } else{
            self::$client = new MongoDB\Client(get_config("database_conn_string"));
        }
        return DatabaseConnection::$client->{get_config('database_stat')};
    }

    public static function getPassiveDatabase()
    {
        if (self::checkDatabaseConnection()) {
            return DatabaseConnection::$client->{get_config('database_passive')};
        } else {
            self::$client = new MongoDB\Client(get_config("database_conn_string"));
        }
        return DatabaseConnection::$client->{get_config('database_passive')};
    }

    public static function getFileDatabase()
    {
        if (self::checkDatabaseConnection()) {
            return DatabaseConnection::$client->{get_config('database_file')};
        } else {
            self::$client = new MongoDB\Client(get_config("database_conn_string"));
        }
        return DatabaseConnection::$client->{get_config('database_file')};
    }

    public static function getDatabase($db_name)
    {
        if (self::checkDatabaseConnection()) {
            return DatabaseConnection::$client->{$db_name};
        } else {
            self::$client = new MongoDB\Client(get_config("database_conn_string"));
        }
        return DatabaseConnection::$client->{$db_name};
    }
}
