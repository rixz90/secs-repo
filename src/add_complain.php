<?php

    //include autoloader classes
    include '../includes/autoloader.php';

    $query = new Query("");
    $param = "";
    $status = false;

    if(isset($_POST['submit'])){

        $phone_no = trim($_POST['phone_no']);
        $email = trim($_POST['email']);
        $name = trim($_POST['name']);

        //check if user in database
        $query->setQuery("SELECT USER_ID FROM COMP_USER 
                        WHERE PHONE_NO = :phone_no AND EMAIL = :email AND NAME = :name");
        $param = array(
            ":phone_no" => $phone_no,
            ":email" => $email,
            ":name" => $name
        );
        $r = $query->fetch_array_with_param($param);
        if($r != null)
            $user_id = $r[0][0];
            
        // if user not in the database, add user
        if($r == null) {
            $userType = $_POST['userType'];

            if($userType == 'staff'){
                $query->setQuery("INSERT INTO COMP_USER (PHONE_NO,EMAIL,NAME,USER_TYPE) VALUES(:phone_no, :email, :name, :type)");
                $param = array(
                    ":phone_no" => $phone_no,
                    ":email" => $email,
                    ":name" => $name,
                    ":type" => 'STAFF'
                );
            }  else if($userType == 'student'){
                $query->setQuery("INSERT INTO COMP_USER (PHONE_NO,EMAIL,NAME,USER_TYPE) VALUES(:phone_no, :email, :name, :type)");
                $param = array(
                    ":phone_no" => $phone_no,
                    ":email" => $email,
                    ":name" => $name,
                    ":type" => 'STUDENT'
                );
                
            } else {
                $query->setQuery("INSERT INTO COMP_USER (PHONE_NO,EMAIL,NAME,USER_TYPE) VALUES(:phone_no, :email, :name, :type)");
                $param = array(
                    ":phone_no" => $phone_no,
                    ":email" => $email,
                    ":name" => $name,
                    ":type" => 'GUEST'
                );
            }
            $status = $query->insertInto($param);

            $query->setQuery("SELECT USER_ID FROM COMP_USER 
                            WHERE PHONE_NO = '$phone_no' AND EMAIL = '$email' AND NAME = '$name'");
            $user_id = $query->fetch_array()[0][0];

            if($userType == 'staff'){
                $staffId = trim($_POST['staffId']);
                $query->setQuery("INSERT INTO STAFF VALUES(:id, :staffId)");
                $param = array(
                    ":staffId" => $staffId,
                    ":id" => $user_id
                );
                $status = $query->insertInto($param);

            } else if($userType == 'student'){
                $studentId = trim($_POST['studentId']);
                $query->setQuery("INSERT INTO STUDENT VALUES(:id, :studentId)");
                $param = array(
                    ":studentId" => $studentId,
                    ":id" => $user_id
                );
                $status = $query->insertInto($param);
            }
        }

        $query->setQuery("INSERT INTO COMPLAINT 
                        (COMP_DETAIL,URL_ATTACHMENT,BRANCH_ID,LOCATION_ID,CATEGORY_ID,USER_ID,COMP_STATUS,DATE_REPORT,DATE_COMPLETE) 
                        VALUES( :comp_detail,:url_attachment,
                                :branch_id,:location_id,:category_id,:user_id,:status,:date_report,:date_complete)");

        if($_FILES['fileToUpload']['name'] != ""){
            $FILE = new File($_FILES['fileToUpload']);
            $FILE->upload();
            $fileUrl = $FILE ->getFileUrl();
        } else {
            $file = null;
        }
        
        $param = array(
            ":comp_detail" => trim($_POST['details']),
            ":url_attachment" => $fileUrl,
            ":branch_id" => trim($_POST['branch']),
            ":location_id" => trim($_POST['location']),
            ":category_id" => trim($_POST['category']),
            ":user_id" => $user_id,
            ":status" => "IN PROCESS",
            ":date_report" => date("j-M-y"),
            ":date_complete" => null

        ); 
        $status = $query->insertInto($param);
    }

    if($status)
        header("Location: ./aduan.php?status=success");
    else
        echo "Failed to add to DB";

?>