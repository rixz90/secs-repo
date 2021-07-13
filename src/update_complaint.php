<?php session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ./login.php");
    }

    //include autoloader classes
    include '../includes/autoloader.php';

    if(isset($_GET['branch'])){  
        echo '<option id=location value="'.$_GET['defaultVal'].'" disable>Choose Location</option>';
        $q = new Query("SELECT L.LOCATION_ID, L.LOCATION_NAME  
                        FROM LOCATION L 
                        JOIN LOCATION_BRANCH M 
                        ON (M.LOCATION_ID = L.LOCATION_ID) 
                        WHERE M.BRANCH_ID = '".trim($_GET['branch'])."'");
        $r = $q->fetch_array();
        for ($i = 0; $i < sizeof($r); $i++) {
            echo "<option value='".$r[$i][0]."'>".$r[$i][1]."</option>";
        }
        echo '</select>';
        exit();
    }
    if(isset($_POST['submit'])){
        $query = new Query("UPDATE COMPLAINT SET 
        COMP_DETAIL = :detail,
        BRANCH_ID = :branch_id,
        LOCATION_ID = :loc_id,
        CATEGORY_ID = :category_id,
        COMP_STATUS = :status
        WHERE COMPLAINT_ID = :id");
        $param = array(
            ":detail" => trim($_POST['details']),
            ":branch_id" => trim($_POST['branch']),
            ":loc_id" => trim($_POST['location']),
            ":category_id" => trim($_POST['category_id']),
            ":id" => trim($_POST['id']),
            ":status" => trim($_POST['status'])
        );

        $result = $query->insertInto($param);
        var_dump($result);
        if($result){
            $query->setQuery("UPDATE COMP_USER SET 
            NAME = :name 
            WHERE USER_ID = :userId");
            $param = array(
                ":name" => trim($_POST['name']),
                ":userId" => trim($_POST['userId'])
            );
            $query->insertInto($param);

            if(isset($_POST['matrix_id'])){
                $query->setQuery("UPDATE STUDENT SET 
                MATRIX_ID = :matrix_id 
                WHERE USER_ID = :userId");
                $param = array(
                    ":matrix_id" => trim($_POST['matrix_id']),
                    ":userId" => trim($_POST['userId'])
                );
                $query->insertInto($param);
            } else if(isset($_POST['staff_id'])){
                $query->setQuery("UPDATE STAFF SET 
                STAFF_ID = :staff_id 
                WHERE USER_ID = :userId");
                $param = array(
                    ":staff_id" => trim($_POST['staff_id']),
                    ":userId" => trim($_POST['userId'])
                );
                $result = $query->insertInto($param);
            }
        } else {
            die("error");
        }
        if($result){
            header("Location: ./admin.php?status=success");
        }
        
        die();
    }

    $query = new Query("SELECT c.COMPLAINT_ID, u.USER_TYPE, u.USER_ID, 
    b.BRANCH_NAME, b.BRANCH_ID, l.LOCATION_NAME, l.LOCATION_ID, ca.CATEGORY_NAME, 
    ca.CATEGORY_ID, c.COMP_DETAIL, NVL(TO_CHAR(c.URL_ATTACHMENT),'NO_FILE'), u.NAME, c.COMP_STATUS  
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
                            <td><?php echo $r[0][0] ?></td>
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
                            echo "<td><input type='text' name='staff_id' value='".$r2[0][0]."'/></td>";
                            echo "</tr>";

                        } ?>

                        <?php if($r[0][1] == "STUDENT" ){ 
                     
                            $q2 = new Query("SELECT MATRIX_ID FROM STUDENT WHERE USER_ID=".$r[0][2]);
                            $r2 = $q2->fetch_array(); 
                        
                            echo "<tr>";
                            echo "<td><label>Student ID : </td>";
                            echo "<td><input type='text' class='form-control' name='matrix_id' value='".$r2[0][0]."'/></td>";
                            echo "</tr>";

                        } ?>
                    
                            <tr>
                                <td><label>NAME : </td>
                                <td><input type='text' class='form-control' name='name' value="<?php echo $r[0][11]; ?>"/></td>
                                <input type="hidden" name="userId" value="<?php echo $r[0][2]; ?>">
                            </tr>

                            <tr>
                                <td><label>Status : </td>
                                <td>
                                    <select name="status" class="form-control">
                                        <?php
                                            echo "<option disable selected>".$r[0][12]."</option>";
                                            if($r[0][12] != "IN_PROCESS"){
                                                echo "<option value='IN PROCESS'>IN PROCESS</option>";
                                            }
                                            if($r[0][12] != "REPORTED"){
                                                echo "<option value='REPORTED'>REPORTED</option>";
                                            }
                                            if($r[0][12] != "UNDER_INVESTIGATION"){
                                                echo "<option value='UNDER INVESTIGATION'>INVESTIGATION</option>";
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
                            <td>
                                <select name="branch" id="branch_id"  class="form-control">
                                    <option value="<?php echo $r[0][4]; ?>" selected><?php echo $r[0][3]; ?></option>
                                    <?php 
                                        $q = new Query("SELECT * FROM BRANCH WHERE BRANCH_ID NOT LIKE '".$r[0][4]."'");
                                        $s = $q->fetch_array();
                                        for ($i = 0; $i < sizeof($s); $i++) {
                                            echo "<option value='".$s[$i][0]."'>".$s[$i][1]."</option>";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="location">Location Details : </td>
                            <td>
                                <select name="location"  class="form-control">
                                    <option id="location" value="<?php echo $r[0][6]; ?>" selected><?php echo $r[0][5]; ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="category">Category: </td>
                            <td>
                                <select name="category_id" id="category"  class="form-control">
                                    <option value="<?php echo $r[0][8]; ?>" selected><?php echo $r[0][7]; ?></option>
                                    <?php 
                                        $q = new Query("SELECT * FROM CATEGORY WHERE CATEGORY_ID NOT LIKE '".$r[0][8]."'");
                                        $s = $q->fetch_array();
                                        for ($i = 0; $i < sizeof($s); $i++) {
                                            echo "<option value='".$s[$i][0]."'>".$s[$i][1]."</option>";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="details">Details : </td>
                            <td>
                                <textarea name="details" id="details" cols="30" rows="10"  class="form-control textarea"><?php echo $r[0][9]; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="attachment">Attachment : </td>
                            <td><?php echo $r[0][10]; ?></td>
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