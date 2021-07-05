<?php session_start();

    if(!isset($_SESSION['username'])){
        header("Location: ./login.php");
    }

    //include autoloader classes
    include '../includes/autoloader.php';

    $query = new Query("");
    $param = "";
    $status = false;

    if(isset($_POST['ADD_BRA'])){
        $query->setQuery("INSERT INTO BRANCH VALUES(:id,:name)");

        $param = array(
            ":id" => trim($_POST['id']),
            ":name" => trim($_POST['name'])
        );
    }

    else if(isset($_POST['ADD_CAT'])){
        $query->setQuery("INSERT INTO CATEGORY VALUES(:id,:name)");
        $param = array(
            ":id" => trim($_POST['id']),
            ":name" => trim($_POST['name'])
        );
    }

    else if(isset($_POST['ADD_LOC'])){
        $query->setQuery("INSERT INTO LOCATION VALUES(:id,:name)");
        $param = array(
            ":id" => trim($_POST['id']),
            ":name" => trim($_POST['name'])
        );
    }

    else if(isset($_POST['ADD_ADMIN'])){
        $pass = trim($_POST['pass']);
        $c_pass = trim($_POST['c_pass']);

        if(strcmp($pass,$c_pass) == 0 ){

            $query->setQuery("INSERT INTO ADMIN VALUES(:id,:type,:pass)");
            $param = array(
                ":id" => trim($_POST['id']),
                ":type" => trim($_POST['type']),
                ":pass" => Auth::hashPassword(trim($_POST['pass']))
            );
        }
    }

    if(!empty($param))
        $status = $query->insertInto($param);
    if($status)
        header("Location: ./admin_setting.php?status=success");
    else
        echo "Failed to add to DB";
?>