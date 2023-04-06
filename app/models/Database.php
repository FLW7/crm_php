<?php
// app/models/Database

class Database {
    private static $instance = null;
    private $conn;
    private $host = 'localhost';
    private $name = 'crm_php';
    private $user = 'root';
    private $pass = '';

    private function __construct() {
        // `$this->conn` обьект подключения к БД
        $this->conn = new mysqli($this->host, $this->user, $this->name, $this->pass);
        if ($this->conn->connect_error) {
            die("Connection error: " . $this->conn->connect_error);
        }
    }

    // возвращает обьект класса Database
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
    }

    // возвращает обьект подключения к БД
    public function getConnection() {
        return $this->conn;
    }
}