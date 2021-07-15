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

        static function hashPassword($str){
            return password_hash($str, PASSWORD_DEFAULT);
        }

        static function validate_phone_number($phone) {
            // Allow +, - and . in phone number
            $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
            // Remove "-" from number
            $phone_to_check = str_replace("-", "", $filtered_phone_number);

            // Check the lenght of number
            // This can be customized if you want phone number from a specific country
            if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
                return false;
            } else {
                return true;
            }
        }
    }

?>