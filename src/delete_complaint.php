<?php
    session_start();

    //include autoloader classes
    include '../includes/autoloader.php';

    if(!isset($_SESSION['username'])){
        header("Location: ./login.php");
    }

    if(isset($_POST["submit"])){
        $query = new Query("DELETE FROM COMPLAINT   
            WHERE COMPLAINT_ID = :id");

        $param = array(
            ":id" => trim($_POST['id'])
        );

        $query->insertInto($param);

    }

?>