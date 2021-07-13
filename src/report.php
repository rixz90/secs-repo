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
                        <form class="admin-form">
                            <table class="admin-table">
                                <tr>
                                    <td><label>Generate By:</label></td>
                                    <td><label>Abu Bakar</label></td>
                                </tr>
                                <tr>
                                    <td><label>From Department:</label></td>
                                    <td><label>Unit Integrity</label></td>
                                </tr>
                                <tr>
                                    <td><label for="date">Generate Date:</label></td>
                                    <td><input type="date" class="form-control" name="date" id="date"></td>
                                </tr>
                                <tr>
                                    <td><label for="userId">User ID:</label></td>
                                    <td><input type="text" class="form-control" name="userId" id="userId"></td>
                                </tr>
                                <tr>
                                    <td><label for="branch">Branch:</label></td>
                                    <td><input type="text" class="form-control" name="branch" id="branch"></td>
                                </tr>
                                <tr>
                                    <td><label for="status">Status:</label></td>
                                    <td><input type="text" class="form-control" name="status" id="status"></td>
                                </tr>
                                <tr>
                                    <td><button class="button-submit">Generate</button></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div class="panel">
                    <table class="table">
                        <tr>
                            <th>Bil</th>
                            <th>Complaint ID</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Branch</th>
                            <th>Date Report</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Complete Date</th>
                            <th>Detail</th>
                        </tr>
                        <tr>
                        <?php $q = new Query("SELECT c.COMPLAINT_ID,u.USER_ID,u.NAME,b.BRANCH_NAME,
                         c.DATE_REPORT,ca.CATEGORY_NAME, c.comp_status, NVL(to_char(c.date_complete),'STILL REVIEW')
                                            FROM COMPLAINT c JOIN CATEGORY ca ON(c.CATEGORY_ID = ca.CATEGORY_ID) 
                                            JOIN COMP_USER u ON(u.USER_ID = c.USER_ID) 
                                            JOIN BRANCH b ON(b.BRANCH_ID = c.BRANCH_ID)");
                            $r = $q->fetch_array();
                            for ($i = 0; $i < sizeof($r); $i++) {
                                $k = $i+1;
                                echo "<tr class='option'>";
                                echo "<td>".$k."</td>";
                                echo "<td>".$r[$i][0]."</td>";
                                echo "<td>".$r[$i][1]."</td>";
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
                        </tr>
                        <tr>
                            <td colspan="8">
                                <div class="right" style="margin-top: 4rem;">
                                    <input type="submit" class="button-submit" value="Update">
                                    <input type="reset" class="button-remove" value="Delete">
                                </div>
                            </td>
                        </tr>
                    </table>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>