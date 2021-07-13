<?php session_start();

    if(!isset($_SESSION['username'])){
        header("Location: ./login.php");
    }

    //include autoloader classes
    include '../includes/autoloader.php';

    $query = new Query("");
    $param = "";
    $status = false;

    if($_POST['type'] == "BRA"){
        $query->setQuery("DELETE FROM LOCATION_BRANCH   
            WHERE BRANCH_ID = :id");

        $param = array(
            ":id" => trim($_POST['id'])
        );

        $status = $query->insertInto($param);
        
        $query->setQuery("DELETE FROM BRANCH   
            WHERE BRANCH_ID = :id");

        $param = array(
            ":id" => trim($_POST['id'])
        );
    }

    else if($_POST['type'] == "CAT"){
        $query->setQuery("DELETE FROM CATEGORY  
            WHERE CATEGORY_ID = :id");
        $param = array(
            ":id" => trim($_POST['id'])
        );
    }

    else if($_POST['type'] == "LOC"){
        $query->setQuery("DELETE FROM LOCATION_BRANCH  
            WHERE LOCATION_ID = :id");
        $param = array(
            ":id" => trim($_POST['id'])
        );

        $status = $query->insertInto($param);
        
        $query->setQuery("DELETE FROM LOCATION 
            WHERE LOCATION_ID = :id");
        $param = array(
            ":id" => trim($_POST['id'])
        );
    }

    else if($_POST['type'] == "ADM"){
        $pass = trim($_POST['pass']);
        $c_pass = trim($_POST['c_pass']);

        if(strcmp($pass,$c_pass) == 0 ){

            $query->setQuery("DELETE FROM ADMIN 
                WHERE USERNAME = :id 
                AND ADMIN_TYPE <> 'SYS'");
            $param = array(
                ":id" => trim($_POST['id'])
            );
        }
    }

    if(!empty($param))
        $status = $query->insertInto($param);
    if($status)
        header("Location: ./admin_setting.php?status=success");
    else
        echo "Failed to delete data from DB";
?>