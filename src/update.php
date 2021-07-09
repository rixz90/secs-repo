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
        $query->setQuery("UPDATE BRANCH SET 
            BRANCH_NAME = :name 
            WHERE BRANCH_ID = :id");

        $param = array(
            ":id" => trim($_POST['id']),
            ":name" => trim($_POST['name'])
        );
    }

    else if($_POST['type'] == "CAT"){
        $query->setQuery("UPDATE CATEGORY SET 
            CATEGORY_NAME = :name 
            WHERE CATEGORY_ID = :id");
        $param = array(
            ":id" => trim($_POST['id']),
            ":name" => trim($_POST['name'])
        );
    }

    else if($_POST['type'] == "LOC"){
        $query->setQuery("UPDATE LOCATION SET 
            LOCATION_NAME = :name 
            WHERE LOCATION_ID = :id");
        $param = array(
            ":id" => trim($_POST['id']),
            ":name" => trim($_POST['name'])
        );
    }

    else if($_POST['type'] == "ADM"){
        $pass = trim($_POST['pass']);
        $c_pass = trim($_POST['c_pass']);

        if(strcmp($pass,$c_pass) == 0 ){

            $query->setQuery("UPDATE ADMIN SET
                ADMIN_TYPE = :type,
                PASSWORD = :pass 
                WHERE USERNAME = :id");
            $param = array(
                ":id" => trim($_POST['id']),
                ":type" => trim($_POST['access']),
                ":pass" => Auth::hashPassword(trim($_POST['pass']))
            );
        }
    }

    if(!empty($param))
        $status = $query->insertInto($param);
    if($status)
        header("Location: ./admin_setting.php?status=success");
    else
        echo "Failed to update data from DB";
?>