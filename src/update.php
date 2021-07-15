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
        $status = $query->insertInto($param);
    }

    else if($_POST['type'] == "CAT"){
        $query->setQuery("UPDATE CATEGORY SET 
            CATEGORY_NAME = :name 
            WHERE CATEGORY_ID = :id");
        $param = array(
            ":id" => trim($_POST['id']),
            ":name" => trim($_POST['name'])
        );
        $status = $query->insertInto($param);
    }

    else if($_POST['type'] == "LOC"){

        if( $_POST['id']==null || $_POST['name']==null  || $_POST['bra_id']==null ){
            die("notFillErr");
        }

        if($_POST['bra_id']== 0){
            $query->setQuery("DELETE FROM LOCATION_BRANCH 
            WHERE LOCATION_ID = :loc_id");

            $param = array(
                ":loc_id" => $_POST['id'],
                ":bra_id" => $_POST['bra_id']
            );

            $status = $query->insertInto($param);
        }

        $query->setQuery("SELECT * FROM LOCATION_BRANCH 
        WHERE LOCATION_ID = :loc_id AND
        BRANCH_ID = :bra_id");

        $param = array(
            ":loc_id" => $_POST['id'],
            ":bra_id" => $_POST['bra_id']
        );

        $r = $query->fetch_array_with_param($param);

        //If there is no relationship exist, add to the table DB
        if(empty($r) || $r[0][0] == 0) {
            $query->setQuery("INSERT INTO LOCATION_BRANCH VALUES(:loc_id,:bra_id)");
            $status = $query->insertInto($param);
        }
        //Else update the table DB
        else{
            $query->setQuery("UPDATE LOCATION_BRANCH SET 
            BRANCH_ID = :bra_id 
            WHERE LOCATION_ID = :loc_id");
        
            $status = $query->insertInto($param);
        
            if($status){
                $query->setQuery("UPDATE LOCATION SET 
                LOCATION_NAME = :loc_name 
                WHERE LOCATION_ID = :loc_id");
            
                $param = array(
                    ":loc_id" => trim($_POST['id']),
                    ":loc_name" => trim($_POST['name'])
                );
                $status = $query->insertInto($param);
            }
        }  
    } else if($_POST['type'] == "REL"){
        $query->setQuery("UPDATE LOCATION_BRANCH SET 
        BRANCH_ID = :bra_id,
        LOCATION_ID = :loc_id 
        WHERE LOCATION_ID = :init_loc_id AND BRANCH_ID = :init_bra_id");

        $param = array(
            ":loc_id" => trim($_POST['loc_id']),
            ":bra_id" => trim($_POST['bra_id']),
            ":init_loc_id" => trim($_POST['init_loc_id']),
            ":init_bra_id" => trim($_POST['init_bra_id'])
        );
        $status = $query->insertInto($param);

    } else if($_POST['type'] == "ADM"){
        $pass = trim($_POST['pass']);
        $c_pass = trim($_POST['c_pass']);

        if(strcmp($pass,$c_pass) == 0 ){

            $query->setQuery("SELECT ADMIN_TYPE FROM ADMIN
                WHERE USERNAME = '".$_SESSION['username']."'");
            
            $access = $query->fetch_array();
            if($access[0][0] == 'SYS'){
                $query->setQuery("UPDATE ADMIN SET
                ADMIN_TYPE = :type,
                PASSWORD = :pass 
                WHERE USERNAME = :id");
                
                $param = array(
                ":id" => trim($_POST['id']),
                ":type" => trim($_POST['access']),
                ":pass" => Auth::hashPassword(trim($_POST['pass']))
                );
                
                $status = $query->insertInto($param);
            } else {
                die("Dont have access to modify database! Please refer to management.");
            }
            
        }
    }
    
    if($status)
        echo "OK";
    else
        echo "Failed to update data from DB";
?>