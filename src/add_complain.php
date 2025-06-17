<?php session_start();

    //include autoloader classes
    include '/includes/autoloader.php';

    $query = new Query("");
    $param = "";
    $status = false;

    if(isset($_POST['submit'])){
        
        $error = [];
        $email = trim($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($error,"*Invalid email format");
        }

        $name = trim($_POST['name']);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            array_push($error,"*Only letters and white space allowed");
        }

        $phone_no = trim($_POST['phone_no']);
        if(!Auth::validate_phone_number($phone_no)){
            array_push($error,"*Invalid phone number");
        }

        if(!empty($error)){
            $_SESSION['errorMsg'] = $error;
            header("Location: ./aduan.php?status=failed");
            exit();
        }

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
                
            } else if($userType == 'guest') {
                $query->setQuery("INSERT INTO COMP_USER (PHONE_NO,EMAIL,NAME,USER_TYPE) VALUES(:phone_no, :email, :name, :type)");
                $param = array(
                    ":phone_no" => $phone_no,
                    ":email" => $email,
                    ":name" => $name,
                    ":type" => 'GUEST'
                );
            } else {
                die("NO USERTYPE FOUND");
            }
            $status = $query->insertInto($param);

            $query->setQuery("SELECT USER_ID FROM COMP_USER 
                            WHERE PHONE_NO = :phone_no AND EMAIL = :email AND NAME = :name ");

            $param = array(
                ":phone_no" => $phone_no,
                ":email" => $email,
                ":name" => $name,
                ":type" => $userType
            );

            $r = $query->fetch_array_with_param($param);
            $user_id = $r[0][0];

            var_dump($user_id);

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

        if($_FILES['fileToUpload']['name'] != ""){
            $FILE = new File($_FILES['fileToUpload']);
            $FILE->upload();
            $fileUrl = $FILE ->getFileUrl();
        } else {
            $file = null;
        }

        $query->setQuery("INSERT INTO COMPLAINT 
                        (COMP_DETAIL,URL_ATTACHMENT,BRANCH_ID,LOCATION_ID,CATEGORY_ID,USER_ID,COMP_STATUS,DATE_REPORT,DATE_COMPLETE) 
                        VALUES( :comp_detail,:url_attachment,
                                :branch_id,:location_id,:category_id,:user_id)");

        $file = new File($_FILES['fileToUpload']);

        $param = array(
            ":comp_detail" => trim($_POST['details']),
            ":url_attachment" => $file->getFileUrl(),
            ":branch_id" => trim($_POST['branch']),
            ":location_id" => trim($_POST['location']),
            ":category_id" => trim($_POST['category']),
            ":user_id" => $user_id
        ); 
        $status = $query->insertInto($param);
        if($status){
            $file->upload();
        }
    }

    if($status)
        echo 'pass';//header("Location: ./aduan.php?status=success");
    else {
        echo "Failed to add to DB";
    }     
?>