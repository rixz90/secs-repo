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
            ":name" => strtoupper(trim($_POST['name']))
        );
    }
    
    else if(isset($_POST['ADD_REL'])){
        $query->setQuery("INSERT INTO LOCATION_BRANCH VALUES(:loc_id,:bra_id)");
        $param = array(
            ":loc_id" => trim($_POST['loc_id']),
            ":bra_id" => trim($_POST['bra_id'])
        );
    }

    else if(isset($_POST['ADD_LOC'])){
        $query->setQuery("INSERT INTO LOCATION VALUES(:id,:name)");
        $id = trim($_POST['id']);
        $param = array(
            ":id" => $id,
            ":name" => strtoupper(trim($_POST['name']))
        );
        $query->insertInto($param);

        $query->setQuery("SELECT * FROM LOCATION WHERE LOCATION_ID = ${id}");
        if($query->fetch_array() <= 0){
            exit("no data found");
        } 
    }

    else if(isset($_POST['ADD_ADMIN'])){
        $pass = trim($_POST['pass']);
        $c_pass = trim($_POST['c_pass']);

        if(strcmp($pass,$c_pass) == 0 ){

            $query->setQuery("INSERT INTO ADMIN VALUES(:id,:type,:pass, :department, :name)");
            $param = array(
                ":id" => trim($_POST['id']),
                ":type" => trim($_POST['access']),
                ":pass" => Auth::hashPassword(trim($_POST['pass'])),
                "department" => trim($_POST['department']),
                "name" => trim($_POST['name']),
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