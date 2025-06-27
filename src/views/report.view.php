<html lang="en">


<?php include(BASE_ROOT . $_ENV['COMP_PATH'] . '/common/_header.php'); ?>

<body>
    <?php include(BASE_ROOT . $_ENV['COMP_PATH'] . '/common/admin_nav.php'); ?>
    <div class="content center">
        <main class="admin-view">
            <h1 class="title">Complaints Report</h1>
            <div class="main">
                <div class="panel">
                    <table class="admin-table">
                        <tr>
                            <?php
                            // $q = new Query("SELECT ADMIN_NAME, DEPARTMENT FROM \"ADMIN\" 
                            //                 WHERE USERNAME = :username");
                            // $param = array(
                            //     ":username" => $_SESSION['username']
                            // );
                            // $r = $q->fetch_array_with_param($param);
                            ?>
                            <td><label>Generate By:</label></td>
                            <td><label></label></td>
                        </tr>
                        <tr>
                            <td><label>From Department:</label></td>
                            <td><label></label></td>
                        </tr>
                        <tr>
                            <td><label for="date">Generate Date:</label></td>
                            <td><input type="date" class="form-control" name="date" id="date"></td>
                        </tr>
                        <tr>
                            <td><label for="name">User ID:</label></td>
                            <td><input type="text" class="form-control" name="user_id" id="user_id"></td>
                        </tr>
                        <tr>
                            <td><label for="branch">Branch:</label></td>
                            <td>
                                <select name="branch" id="branch" class="form-control">
                                    <option value="" disabled selected>Choose Branch</option>
                                    <?php
                                    // $q = new Query("SELECT * FROM BRANCH");
                                    // $r = $q->fetch_array();
                                    // for ($i = 0; $i < sizeof($r); $i++) {
                                    //     echo "<option value='" . $r[$i][0] . "'>" . $r[$i][1] . "</option>";
                                    // }
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
                        </tr>
                    </table>
                    <p id="error" style="color:red;font-size:2rem"></p>
                </div>
                <div class="panel">
                    <table class="table">
                        <tr>
                            <th>User ID</th>
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
                            <?php

                            // $q = new Query("SELECT c.USER_ID,c.COMPLAINT_ID,u.NAME,b.BRANCH_NAME,
                            // c.DATE_REPORT,ca.CATEGORY_NAME, c.comp_status, NVL(to_char(c.date_complete),'STILL REVIEW')
                            //                     FROM COMPLAINT c JOIN CATEGORY ca ON(c.CATEGORY_ID = ca.CATEGORY_ID) 
                            //                     JOIN COMP_USER u ON(u.USER_ID = c.USER_ID) 
                            //                     JOIN BRANCH b ON(b.BRANCH_ID = c.BRANCH_ID)");
                            // $r = $q->fetch_array();
                            // for ($i = 0; $i < sizeof($r); $i++) {
                            //     echo "<tr>";
                            //     echo "<td>" . $r[$i][0] . "</td>";
                            //     echo "<td>" . $r[$i][1] . "</td>";
                            //     echo "<td>" . $r[$i][2] . "</td>";
                            //     echo "<td>" . $r[$i][3] . "</td>";
                            //     echo "<td>" . $r[$i][4] . "</td>";
                            //     echo "<td>" . $r[$i][5] . "</td>";
                            //     echo "<td>" . $r[$i][6] . "</td>";
                            //     echo "<td>" . $r[$i][7] . "</td>";
                            //     echo "<td><a href='./detail.php?id=" . $r[$i][0] . "'>detail</a></td>";
                            //     echo "</tr>";
                            // }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/assets/scripts/report.js"></script>
</body>

</html>