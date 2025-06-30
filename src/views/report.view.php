<html lang="en">
<?php include(BASE_ROOT . $_ENV['COMP_PATH'] . '/common/_head.php'); ?>

<body>
    <header>
        <?php include(BASE_ROOT . $_ENV['COMP_PATH'] . '/common/admin_navbar.php'); ?>
    </header>

    <main class="container">
        <h1>Complaints Report</h1>
        <div class="main">
            <div class="panel">
                <table class="admin-table">
                    <tr>
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
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/assets/scripts/report.js"></script>
</body>

</html>