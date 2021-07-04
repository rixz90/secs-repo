<?php
    class Db {
        private $username = 'secs';
        private $pass = 'admin';
        private $conn_string = '//localhost:1521/xe';

        protected function connect(){
            // Create connection to Oracle
            $conn = oci_connect($this->username, $this->pass, $this->conn_string);
            if (!$conn) {
                $m = oci_error();
                echo 'Connection failed\n';
                exit;
            }
            return $conn;

        }
    }

?>