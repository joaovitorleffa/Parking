<?php
    class ConnectClass {
        var $conn;

        public function openConnection() {
            $host = 'localhost';
            $db = 'estacionamento';
            $user = 'root';
            $password = '';
            $this->conn = new mysqli($host, $user, $password, $db, "3308");
        }

        public function getConnection() {
            return $this->conn;
        }
    }
?>