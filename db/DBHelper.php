<?php

    class DBHelper {
        private $conn;

        public function __construct() {
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'db_users';

            $this->conn = new mysqli($servername, $username, $password, $database);

            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }

        // Add new record
        public function addRecord($table, $data) {
            $columns = implode(", ", array_keys($data));
            $fields = implode(", ", array_fill(0, count($data), "?"));
            $query = "INSERT INTO $table ($columns) VALUES ($fields)";

            $stmt = $this->conn->prepare($query);
            $types = str_repeat("s", count($data));
            $stmt->bind_param($types, ...array_values($data));

            return $stmt->execute();
        }

        //Get record
        public function getRecord($table, $conditions) {
            $columns = implode(" = ? AND ", array_keys($conditions)) . " = ?";
            $query = "SELECT * FROM $table WHERE $columns LIMIT 1";

            $stmt = $this->conn->prepare($query);
            $types = str_repeat("s", count($conditions));
            $stmt->bind_param($types, ...array_values($conditions));

            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        }

        //Execute query select
        public function select($query, $params = []) {
            $stmt = $this->conn->prepare($query);
            if(!empty($params)) {
                $stmt->bind_param($types, ...$params);
            }

            $stmt->execute();
            $result = $stmt->get_result();
            $rows = $result->fetch_all(MYSQLI_ASSOC);
        }

        //Execute query update or delete
        public function execute($query, $params = []) {
            $stmt = $this->conn->prepare($query);
            if(!empty($params)) {
                $stmt->bind_param($types, ...$params);
            }

            return $stmt->execute();
        }
        
        public function close() {
            $this->conn->close();
        }
    }

?>