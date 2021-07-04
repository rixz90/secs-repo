<?php
    class Auth extends Db {

        private $conn;
       
        public function __construct(){
            $this->conn = $this->connect();
        }

        public function verify($username, $pass){
            $query = "SELECT password from admin where username = :username";
            $stid = oci_parse($this->conn, $query);
        
            //  Bind the input parameter
            oci_bind_by_name($stid,':username',$username,32);
        
            oci_execute($stid);
            $r = oci_fetch_array($stid, OCI_ASSOC);
        
            $hash = $r['PASSWORD'];

            if (password_verify($pass, $hash)) 
                return true; 
            return false;
        }
    }

?>