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
                            <th>Details</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Complete Date</th>
                            <th>Detail</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1001</td>
                            <td>2020866623</td>
                            <td>Ahmad</td>
                            <td>Unit Integrity</td>
                            <td>21/2/2012</td>
                            <td>Details</td>
                            <td>Category</td>
                            <td>Complete</td>
                            <td>22/3/2012</td>
                            <td><a href="./detail.php">detail</a></td>
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