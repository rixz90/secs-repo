<?php
    session_start();

    //include autoloader classes
    include '../includes/autoloader.php';

    if(!isset($_SESSION['username'])){
        header("Location: ./login.php");
    }

    if(isset($_POST["submit"])){

        if(!isset($_POST['id'])){
            die("NO ID FOUND");
        }
        $complaintId = trim($_POST['id']);

        $query = new Query("SELECT u.USER_ID, u.USER_TYPE FROM COMP_USER u 
            JOIN COMPLAINT c ON(u.USER_ID = c.USER_ID) 
            WHERE c.COMPLAINT_ID = :complaintId");
        
        $param = array(
            "complaintId" => $complaintId
        );

        $r = $query->fetch_array_with_param($param);
        $userId = $r[0][0];
        $userType = $r[0][1];

        if($userId == null || $userType == null){
            die("USER NOT FOUND IN DB");
        }

        if($userType == "STAFF"){
            $query->setQuery("DELETE FROM STAFF    
            WHERE USER_ID = :userId");
        
            $param = array(
                ":userId" => $userId
            );
            $query->insertInto($param);

        } else if($userType == "STUDENT"){
            $query->setQuery("DELETE FROM STUDENT    
            WHERE USER_ID = :userId");
        
            $param = array(
                ":userId" => $userId
            );
            $query->insertInto($param);
        }

        $query->setQuery("DELETE FROM COMPLAINT   
            WHERE COMPLAINT_ID = :id");
        
        $param = array(
            ":id" => $complaintId
            );
       
        $status = $query->insertInto($param);
        
        if($status){
            $query->setQuery("DELETE FROM COMP_USER    
            WHERE USER_ID = :userId");

            $param = array(
                ":userId" => $userId
            );
            $query->insertInto($param);

            echo "OK";
        }
    }

?>