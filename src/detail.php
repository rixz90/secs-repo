<?php session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ./login.php");
    }

    //include autoloader classes
    include '../includes/autoloader.php';

    $query = new Query("SELECT c.COMPLAINT_ID, u.USER_TYPE,u.USER_ID, b.BRANCH_NAME, l.LOCATION_NAME, CATEGORY_NAME, c.COMP_DETAIL, NVL(TO_CHAR(c.URL_ATTACHMENT),'NO_FILE') 
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
                <h1 class="title">Complaint Details</h1>
                    <table class="register-table">
                        <tr>
                            <td><h3 class="h3">User Information</h3></td>
                        </tr>
                        <tr>
                            <td style="height: 2rem;"><label>Complaint ID : </label></td>
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

                        }  
                        
                            $q2 = new Query("SELECT NAME FROM COMP_USER WHERE USER_ID=".$r[0][2]);
                            $r2 = $q2->fetch_array(); 
                    
                            echo "<tr>";
                            echo "<td><label>NAME : </td>";
                            echo "<td>".$r2[0][0]."</td>";
                            echo "</tr>";

                         ?>
                        
                        <tr>
                            <td><h3 class="h3">Complaint Information</h3></td>
                        </tr>
                        <tr>
                            <td><label for="branch">UiTM Branch: </td>
                            <td><?php echo $r[0][3]; ?></td>
                        </tr>
                        <tr>
                            <td><label for="location">Location Details : </td>
                            <td><?php echo $r[0][4]; ?></td>
                        </tr>
                        <tr>
                            <td><label for="category">Category: </td>
                            <td><?php echo $r[0][5]; ?></td>
                        </tr>
                        <tr>
                            <td><label for="details">Details : </td>
                            <td><?php echo $r[0][6]; ?></td>
                        </tr>
                        <tr>
                            <td><label for="attachment">Attachment : </td>
                            <td><?php echo $r[0][7]; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="center" style="margin-top: 4rem; width:fit-content">
                                    <button class="button-submit" style="height:3.8rem;">
                                        <div class="flex flex-center" style="height: -webkit-fill-available;">
                                            <svg class="nav_icon" style="margin-right:5px;transform:rotate(180deg);">
                                                <use xlink:href="img/sprite.svg#icon-chevron-right">
                                            </svg>
                                            <a href="./admin.php">Back</a>
                                        </div>
                                    </button>
                                    <button class="button-print" style="height:3.8rem;">
                                        <div class="flex flex-center" style="height: -webkit-fill-available;">
                                            <svg class="nav_icon" style="margin-right:5px;">
                                                <use xlink:href="img/sprite.svg#icon-print">
                                            </svg>
                                            <a href="">Print</a>
                                        </div>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </table>
            </main>
        </div>
    </body>
</html>