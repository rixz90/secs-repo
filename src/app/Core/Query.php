<?php 
    namespace App\Core;
    
    class Query extends Db {
        private $conn;
        private $statement;

        public  function __construct($st){
            $this->conn = $this->connect();
            $this->statement = $st;
        }

        public function fetch_array(){

            $stid = oci_parse($this->conn, $this->statement);
            oci_execute($stid);

            $arr = [];

            while (($row = oci_fetch_array($stid, OCI_NUM)) != false) {
                $arr[] = $row;
            }

            return $arr;
        }

        public function fetch_array_with_param($par){

            $stid = oci_parse($this->conn, $this->statement);
            
            // Bind the input parameter
            foreach($par as $key => $value) {
                oci_bind_by_name($stid, $key ,$par[$key]);
            }

            oci_execute($stid);

            $arr = [];

            while (($row = oci_fetch_array($stid, OCI_NUM)) != false) {
                $arr[] = $row;
            }

            return $arr;
        }

        public function insertInto($par){
            if(strlen($this->statement) == 0 || empty($par)){
                return false;
            }

            $stid = oci_parse($this->conn, $this->statement);

            // Bind the input parameter
            foreach($par as $key => $value) {
                oci_bind_by_name($stid, $key ,$par[$key]);
            }
            return oci_execute($stid);
        }

        public function getQuery(){return $this->statement;}
        public function setQuery($st){$this->statement = $st;}
        public function close(){oci_close($this->conn);}
    }