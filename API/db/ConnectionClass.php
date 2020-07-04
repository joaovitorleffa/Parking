<?php
    class ConnectClass {
        var $conn;

        public function openConnection() {
            $host = 'yourHost';
            $db = 'yourDatabaseName';
            $user = 'yourUser';
            $password = 'yourPassword';
            $this->conn = new mysqli($host, $user, $password, $db, "3308");
        }

        public function getConnection() {
            return $this->conn;
        }
    }
?>