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
        $query->setQuery("SELECT COMPLAINT_ID FROM COMPLAINT  
            WHERE BRANCH_ID = :id");
        $param = array(
            ":id" => trim($_POST['id'])
        );
        $r = $query->fetch_array_with_param($param);

        //if not use by other complaint row continue
        if($r[0][0] == 0){
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
            $status = $query->insertInto($param);
        } else {
            die('DependecyErr');
        }    
    }

    else if($_POST['type'] == "CAT"){
        $query->setQuery("SELECT COMPLAINT_ID FROM COMPLAINT  
            WHERE CATEGORY_ID = :id");
        
        $param = array(
            ":id" => trim($_POST['id'])
        );
        
        $r = $query->fetch_array_with_param($param);

        //if not use by other complaint row continue
        if($r[0][0] == 0){
            $query->setQuery("DELETE FROM CATEGORY  
                WHERE CATEGORY_ID = :id");
            
            $param = array(
                ":id" => trim($_POST['id'])
            );
            $status = $query->insertInto($param);
        } else {
            die('DependecyErr');
        }
    }

    else if($_POST['type'] == "LOC"){
        $query->setQuery("SELECT COMPLAINT_ID FROM COMPLAINT  
            WHERE LOCATION_ID = :id");
        
        $param = array(
            ":id" => trim($_POST['id'])
        );
        
        $r = $query->fetch_array_with_param($param);

        //if not use by other complaint row continue
        if( empty($r) ||$r[0][0] == 0){
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
            $status = $query->insertInto($param);
        }
        else {
            die('DependecyErr');
        }
    } else if($_POST['type'] == "REL"){
        $query->setQuery("DELETE FROM LOCATION_BRANCH  
                WHERE LOCATION_ID = :loc_id AND BRANCH_ID = :bra_id");
        $param = array(
            ":loc_id" => trim($_POST['loc_id']),
            ":bra_id" => trim($_POST['bra_id']),
        );
        $status = $query->insertInto($param);
    }

    else if($_POST['type'] == "ADM"){
        $pass = trim($_POST['pass']);
        $c_pass = trim($_POST['c_pass']);

        if(strcmp($pass,$c_pass) == 0 ){

            $query->setQuery("SELECT ADMIN_TYPE FROM ADMIN
                WHERE USERNAME = '".$_SESSION['username']."'");
            
            $access = $query->fetch_array();
            if($access[0][0] == 'SYS'){

                $query->setQuery("DELETE FROM ADMIN 
                    WHERE USERNAME = :id 
                    AND ADMIN_TYPE <> 'SYS'");
                $param = array(
                    ":id" => trim($_POST['id'])
                );
                $status = $query->insertInto($param);
            } else {
                die("accessErr");
            }
        }
    }

    if($status)
        echo "OK";
    else
        echo "Failed to delete data from DB";
?>