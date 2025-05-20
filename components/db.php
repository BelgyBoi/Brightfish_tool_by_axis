<?php
// components/db.php

require_once 'config.php'; // if you're using a central config file

// components/Database.php
class Database {
    private static $conn;

    public static function connect() {
        if (!self::$conn) {
            self::$conn = new mysqli('localhost', 'root', '', 'your_db');
            if (self::$conn->connect_error) {
                if (defined('IS_DEV_MODE') && IS_DEV_MODE) {
                    die("DB fail: " . self::$conn->connect_error);
                }
                error_log("DB error: " . self::$conn->connect_error);
                die("Database connection failed.");
            }
        }
        return self::$conn;
    }
}

