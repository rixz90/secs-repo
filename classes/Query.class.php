<?php
    class Query extends Db {
        private $conn;
        private $statement;

        public  function __construct($st){
            $this->conn = $this->connect();
            $this->statement = $st;
        }

        public function getQuery(){return $this->statement;}
        public function setQuery($st){$this->statement = $st;}

        public function fetch_array(){

            $stid = oci_parse($this->conn, $this->statement);
            oci_execute($stid);

            $arr = [];

            while (($row = oci_fetch_array($stid, OCI_NUM)) != false) {
                $arr[] = $row;
            }

            return $arr;
        }

    }
?>