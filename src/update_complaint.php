<?php session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ./login.php");
    }

    //include autoloader classes
    include '../includes/autoloader.php';

    if(isset($_POST['submit'])){

        if($_POST['status'] == 'COMPLETE'){
            $complete_date = date("j-M-y");
        }else{
            $complete_date = null;
        }

        $query = new Query("UPDATE COMPLAINT SET 
        COMP_STATUS = :status,
        DATE_COMPLETE = :complete_date 
        WHERE COMPLAINT_ID = :id");
        $param = array(
            ":id" => trim($_POST['id']),
            ":status" => trim($_POST['status']),
            ":complete_date" => $complete_date
        );

        $result = $query->insertInto($param);

        if($result){
            header("Location: ./admin.php?status=success");
        } else {
            die("Error");
        }
        
        
    }

    $query = new Query("SELECT c.COMPLAINT_ID, u.USER_TYPE, u.USER_ID, u.NAME, c.COMP_STATUS,    
     l.LOCATION_NAME, b.BRANCH_NAME, ca.CATEGORY_NAME, c.COMP_DETAIL,  
    NVL(TO_CHAR(c.URL_ATTACHMENT),'NO_FILE') 
    FROM COMPLAINT c JOIN BRANCH b ON(c.BRANCH_ID = b.BRANCH_ID) 
    JOIN COMP_USER u ON(c.USER_ID = u.USER_ID) 
    JOIN LOCATION l ON(c.LOCATION_ID = l.LOCATION_ID) 
    JOIN CATEGORY ca ON(c.CATEGORY_ID = ca.CATEGORY_ID) 
    WHERE c.COMPLAINT_ID = '".$_GET["id"]."'");

    $r = $query->fetch_array();
    if(empty($r)){
        echo "<p>NOT FOUND</p>";
    }


?>

<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600,700" rel="stylesheet">
        <title>SCES</title>
    </head>
    <body>    
        <?php include 'header/admin_header.php'; ?>
        <div class="content">
            <main class="register-view">
                <h1 class="title">Update Complaint</h1>
                <table class="register-table">
                    <form action="./update_complaint.php" method="POST" enctype="multipart/form-data">
                        <tr>
                            <td><h3 class="h3">User Information</h3></td>
                        </tr>
                        <tr>
                            <td><label>Complaint ID : </label></td>
                            <td><?php echo $r[0][0]; ?><input type="hidden" name="id" value="<?php echo $r[0][0]; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="userType">User Type : </label></td>
                            <td><?php echo $r[0][1] ?></td>    
                        </tr>
                        <?php if($r[0][1] == "STAFF" ){
                    
                            $q2 = new Query("SELECT STAFF_ID FROM STAFF WHERE USER_ID=".$r[0][2]);
                            $r2 = $q2->fetch_array(); 
                            
                            echo "<tr>";
                            echo "<td><label>Staff ID : </td>";
                            echo "<td>".$r2[0][0]."</td>";
                            echo "</tr>";

                        } ?>

                        <?php if($r[0][1] == "STUDENT" ){ 
                     
                            $q2 = new Query("SELECT MATRIX_ID FROM STUDENT WHERE USER_ID=".$r[0][2]);
                            $r2 = $q2->fetch_array(); 
                        
                            echo "<tr>";
                            echo "<td><label>Student ID : </td>";
                            echo "<td>".$r2[0][0]."</td>";
                            echo "</tr>";

                        } ?>
                    
                            <tr>
                                <td><label>NAME : </td>
                                <td><?php echo $r[0][3]; ?></td>
                            </tr>

                            <tr>
                                <td><label>Status : </td>
                                <td>
                                    <select name="status" class="form-control">
                                        <?php
                                            echo "<option disable selected>".$r[0][4]."</option>";
                                            if($r[0][12] != "IN PROCESS"){
                                                echo "<option value='IN PROCESS'>IN PROCESS</option>";
                                            }
                                            if($r[0][12] != "REPORTED"){
                                                echo "<option value='REPORTED'>REPORTED</option>";
                                            }
                                            if($r[0][12] != "INVESTIGATION"){
                                                echo "<option value='INVESTIGATION'>INVESTIGATION</option>";
                                            }
                                            if($r[0][12] != "COMPLETE"){
                                                echo "<option value='COMPLETE'>COMPLETE</option>";
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        
                        <tr>
                            <td><h3 class="h3">Complaint Information</h3></td>
                        </tr>
                        <tr>
                            <td><label for="branch">UiTM Branch: </td>
                            <td><?php echo $r[0][5]; ?></td>
                        </tr>
                        <tr>
                            <td><label for="location">Location Details : </td>
                            <td><?php echo $r[0][6]; ?></td>
                        </tr>
                        <tr>
                            <td><label for="category">Category: </td>
                            <td><?php echo $r[0][7]; ?></td>
                        </tr>
                        <tr>
                            <td><label for="details">Details : </td>
                            <td><p><?php echo $r[0][8]; ?></p></td>
                        </tr>
                        <tr>
                            <td><label for="attachment">Attachment : </td>
                            <td><a href="<?php echo $r[0][9]; ?>">File/Image</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="center" style="margin-top: 4rem; width:fit-content;display:flex">
                                    <button class="button-reset" style="height:3.8rem;margin-right:5px;">
                                        <div class="flex flex-center" style="height: -webkit-fill-available;">
                                            <svg class="nav_icon" style="margin-right:5px;transform:rotate(180deg);">
                                                <use xlink:href="img/sprite.svg#icon-chevron-right">
                                            </svg>
                                            <a href="./admin.php">Back</a>
                                        </div>
                                    </button>
                                    <input type="hidden" name="id" value="<?php echo $r[0][0] ?>"/>
                                    <input type="submit" name="submit" class="button-submit" style="height:3.8rem;"/>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </main>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/update_complaint.js"></script>
    </body>
</html>