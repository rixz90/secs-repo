<?php session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ./login.php");
    }

    //include autoloader classes
    include '../includes/autoloader.php';


    if(!isset($_GET['search'])){

        $q = new Query("SELECT c.COMPLAINT_ID, c.DATE_REPORT, 
        ca.CATEGORY_NAME, NVL(to_char(c.date_complete),'STILL REVIEW'), c.comp_status
        FROM COMPLAINT c JOIN CATEGORY ca ON(c.CATEGORY_ID = ca.CATEGORY_ID)");

        $r = $q->fetch_array();
    }else{

        if(isset($_GET['id']) && $_GET['id'] == null){
            $_SESSION['errMsg'] = "*Input is empty";
            $r = 0;
        } else {
            $q = new Query("SELECT c.COMPLAINT_ID, c.DATE_REPORT, 
            ca.CATEGORY_NAME, NVL(to_char(c.date_complete),'STILL REVIEW'), c.comp_status
            FROM COMPLAINT c JOIN CATEGORY ca ON(c.CATEGORY_ID = ca.CATEGORY_ID) 
            WHERE c.COMPLAINT_ID = :id");
    
            $param = array(
                ":id" => trim($_GET['id'])
            );
    
            $r = $q->fetch_array_with_param($param);
        }        
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600,700" rel="stylesheet">
        <title>SCES</title>
    </head>
    <body>
        <?php include 'header/admin_header.php'; ?>

        <div class="content">
            <main class="admin-view">
                <h1 class="title">Management Complaints</h1>
                <div class="main">
                    <div class="panel">
                        <form class="admin-form" action="./admin.php" method="GET">
                            <table class="admin-table">
                                <tr>
                                    <td><label for="id">Complaint ID:</label></td>
                                    <td><input type="text" class="form-control" name="id" id="id"></td>
                                    <td><input type="submit" class="button-submit" name="search" id="search" value="Search"></td>
                                    <td><a href="./admin.php" class="button-reset">Reset</a></td>
                                <?php 
                                    if(isset($_SESSION['errMsg'])){
                                        echo "<td><p style='color:red'>".$_SESSION['errMsg']."</p></td>";
                                        unset($_SESSION['errMsg']);
                                    }
                                ?>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div class="panel">
                    <table class="table">
                        <tr>
                            <th>Bil</th>
                            <th>Complaint ID</th>
                            <th>Date Report</th>
                            <th>Category</th>
                            <th>Complete Date</th>
                            <th>Status</th>
                            <th>Details</th>
                        </tr>
                        <?php 
                            if($r != null){
                                for ($i = 0; $i < sizeof($r); $i++) {
                                    $k = $i+1;
                                    echo "<tr class='option'>";
                                    echo "<td>".$k."</td>";
                                    echo "<td id='id'>".$r[$i][0]."</td>";
                                    echo "<td>".$r[$i][1]."</td>";
                                    echo "<td>".$r[$i][2]."</td>";
                                    echo "<td>".$r[$i][3]."</td>";
                                    echo "<td>".$r[$i][4]."</td>";
                                    echo "<td><a href='./detail.php?id=".$r[$i][0]."'>detail</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan=7><center>Not Found</center></td></tr>";
                            }
                            
                        ?>
                        <tr>
                            <td colspan="8">
                                <div class="right" style="display:flex">
                                    <form action="./update_complaint.php" id="form_up" method="GET">
                                        <input type="hidden" name="id"/>
                                        <input type="submit" class="button-update" id="update" value="Update"/>
                                    </form>
                                    <form action="./delete_complaint.php" id="form_del" method="GET">
                                        <input type="hidden" name="id"/>
                                        <input type="submit" class="button-remove" id="remove" value="Delete"/>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </table>
                    </div>
                </div>
            </main>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        <script src="js/admin.js"></script>
    </body>
    <?php include 'footer/footer.php'; ?>
</html>