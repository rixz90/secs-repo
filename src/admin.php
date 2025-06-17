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
                <h1 class="title">Management Complaints</h1>
                <div class="main">
                    <div class="panel">
                        <form class="admin-form">
                            <table class="admin-table">
                                <tr>
                                    <td><label for="id">Complaint ID:</label></td>
                                    <td><input type="text" class="form-control" name="id" id="id"></td>
                                </tr>
                                <tr>
                                    <td><button class="button-submit">Search</button></td>
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
                        <?php $q = new Query("SELECT c.COMPLAINT_ID, c.DATE_REPORT, ca.CATEGORY_NAME, NVL(to_char(c.date_complete),'STILL REVIEW'), c.comp_status
                                            FROM COMPLAINT c JOIN CATEGORY ca ON(c.CATEGORY_ID = ca.CATEGORY_ID)");
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
                                echo "<td><a href=''>detail</a></td>";
                                echo "</tr>";
                            }
                        ?>
                        <tr>
                            <td colspan="8">
                                <div class="right">
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