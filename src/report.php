<?php session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ./login.php");
    }

    //include autoloader classes
    include '../includes/autoloader.php';
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
            <main class="admin-view">
                <h1 class="title">Complaints Report</h1>
                <div class="main">
                    <div class="panel">
                            <table class="admin-table">
                                <tr>
                                    <?php 
                                    $q = new Query("SELECT ADMIN_NAME, DEPARTMENT FROM \"ADMIN\" 
                                            WHERE USERNAME = :username");
                                        $param = array(
                                            ":username" => $_SESSION['username']
                                        );
                                    $r = $q->fetch_array_with_param($param);
                                    ?>
                                    <td><label>Generate By:</label></td>
                                    <td><label><?php echo $r[0][0] ?></label></td>
                                </tr>
                                <tr>
                                    <td><label>From Department:</label></td>
                                    <td><label><?php echo $r[0][1] ?></label></td>
                                </tr>
                                <tr>
                                    <td><label for="date">Generate Date:</label></td>
                                    <td><input type="date" class="form-control" name="date" id="date"></td>
                                </tr>
                                <tr>
                                    <td><label for="name">User Name:</label></td>
                                    <td><input type="text" class="form-control" name="name" id="name"></td>
                                </tr>
                                <tr>
                                    <td><label for="branch">Branch:</label></td>
                                    <td>
                                        <select name="branch" id="branch" class="form-control">
                                        <option value="" disabled selected>Choose Branch</option>
                                        <?php 
                                            $q = new Query("SELECT * FROM BRANCH");
                                            $r = $q->fetch_array();
                                            for ($i = 0; $i < sizeof($r); $i++) {
                                                echo "<option value='".$r[$i][0]."'>".$r[$i][1]."</option>";
                                            }
                                        ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="status">Status:</label></td>
                                    <td>
                                        <select name="status" id="status" class="form-control">
                                            <option disabled selected>Status</option>
                                            <option value="IN PROCESS">IN PROCESS</option>
                                            <option value='REPORTED'>REPORTED</option>
                                            <option value='INVESTIGATION'>INVESTIGATION</option>
                                            <option value='COMPLETE'>COMPLETE</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                <tr>
                                    <td><button name="submit" class="button-submit">Generate</button></td>
                                    <td><p id="error" style="color:red;font-size:2rem"></p></td>
                                </tr>
                            </table>
                    </div>
                    <div class="panel">
                    <table class="table">
                        <tr>
                            <th>Bil</th>
                            <th>Complaint ID</th>
                            <th>Name</th>
                            <th>Branch</th>
                            <th>Date Report</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Complete Date</th>
                            <th>Detail</th>
                        </tr>
                        <tbody id=location>
                            <?php $q = new Query("SELECT c.COMPLAINT_ID,u.USER_ID,u.NAME,b.BRANCH_NAME,
                            c.DATE_REPORT,ca.CATEGORY_NAME, c.comp_status, NVL(to_char(c.date_complete),'STILL REVIEW')
                                                FROM COMPLAINT c JOIN CATEGORY ca ON(c.CATEGORY_ID = ca.CATEGORY_ID) 
                                                JOIN COMP_USER u ON(u.USER_ID = c.USER_ID) 
                                                JOIN BRANCH b ON(b.BRANCH_ID = c.BRANCH_ID)");
                                $r = $q->fetch_array();
                                for ($i = 0; $i < sizeof($r); $i++) {
                                    $k = $i+1;
                                    echo "<tr>";
                                    echo "<td>".$k."</td>";
                                    echo "<td>".$r[$i][0]."</td>";
                                    echo "<td>".$r[$i][2]."</td>";
                                    echo "<td>".$r[$i][3]."</td>";
                                    echo "<td>".$r[$i][4]."</td>";
                                    echo "<td>".$r[$i][5]."</td>";
                                    echo "<td>".$r[$i][6]."</td>";
                                    echo "<td>".$r[$i][7]."</td>";
                                    echo "<td><a href='./detail.php?id=".$r[$i][0]."'>detail</a></td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </main>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/report.js"></script>
    </body>
</html>