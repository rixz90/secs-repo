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
                <h1 class="title">Setting</h1>
                <div class="main">
                    
                    <div class="panel">
                        <h2>Branch</h2>
                        <table class="table">
                            <tr>
                                <th>Branch ID</th>
                                <th>Branch Name</th>
                            </tr>
                            <?php 
                            $q = new Query('SELECT * FROM branch');
                            $r = $q->fetch_array();
                            for ($i = 0; $i < sizeof($r); $i++) {
                                echo '<tr>';
                                echo '<td>'.$r[$i][0].'</td>';
                                echo '<td>'.$r[$i][1].'</td>';
                                echo '</tr>';
                            }
                            ?>
                        </table>
                        <div class="panel">
                            <form class="registration-form" >
                            <table class="register-table">
                                <tr>
                                    <td><label for="branch_id">Branch ID: </td>
                                    <td><input type="text" name="branch_id" id="branch_id" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><label for="branch_name">Branch Name: </td>
                                    <td><input type="text" name="branch_name" id="branch_name" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="right">
                                    <input type="submit" class="button-submit" value="ADD">
                                    </td>
                                </tr>
                            </table>
                            </form>
                        </div>
                    </div>

                    <div class="panel">
                        <h2>Categories</h2>
                        <table class="table">
                            <tr>
                                <th>Category ID</th>
                                <th>Category Name</th>
                            </tr>
                            <?php 
                            $q = new Query('SELECT * FROM category');
                            $r = $q->fetch_array();
                            for ($i = 0; $i < sizeof($r); $i++) {
                                echo '<tr>';
                                echo '<td>'.$r[$i][0].'</td>';
                                echo '<td>'.$r[$i][1].'</td>';
                                echo '</tr>';
                            }
                            ?>
                        </table>
                        <div class="panel">
                            <form class="registration-form" >
                            <table class="register-table">
                                <tr>
                                    <td><label for="branch_id">Category ID: </td>
                                    <td><input type="text" name="branch_id" id="branch_id" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><label for="branch_name">Category Name: </td>
                                    <td><input type="text" name="branch_name" id="branch_name" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="right">
                                    <input type="submit" class="button-submit" value="ADD">
                                    </td>
                                </tr>
                            </table>
                            </form>
                        </div>
                    </div>

                    <div class="panel">
                        <h2>Location</h2>
                        <table class="table">
                            <tr>
                                <th>Location ID</th>
                                <th>Location Name</th>
                            </tr>
                            <?php 
                            $q = new Query('SELECT * FROM location');
                            $r = $q->fetch_array();
                            for ($i = 0; $i < sizeof($r); $i++) {
                                echo '<tr>';
                                echo '<td>'.$r[$i][0].'</td>';
                                echo '<td>'.$r[$i][1].'</td>';
                                echo '</tr>';
                            }
                            ?>
                        </table>
                        <div class="panel">
                            <form class="registration-form" >
                            <table class="register-table">
                                <tr>
                                    <td><label for="branch_id">Location ID: </td>
                                    <td><input type="text" name="branch_id" id="branch_id" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><label for="branch_name">Location Name: </td>
                                    <td><input type="text" name="branch_name" id="branch_name" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="right">
                                    <input type="submit" class="button-submit" value="ADD">
                                    </td>
                                </tr>
                            </table>
                            </form>
                        </div>
                    </div>

                    <div class="panel">
                        <h2>Administrator</h2>
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Access Type</th>
                                <th>Password</th>
                            </tr>
                            <?php 
                            $q = new Query('SELECT * FROM admin');
                            $r = $q->fetch_array();
                            for ($i = 0; $i < sizeof($r); $i++) {
                                echo '<tr>';
                                echo '<td>'.$r[$i][0].'</td>';
                                echo '<td>'.$r[$i][1].'</td>';
                                echo '<td>'.$r[$i][2].'</td>';
                                echo '</tr>';
                            }
                            ?>
                        </table>
                        <div class="panel">
                            <form class="registration-form" >
                            <table class="register-table">
                                <tr>
                                    <td><label for="branch_id">ID: </td>
                                    <td><input type="text" name="branch_id" id="branch_id" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><label for="branch_name">ACCESS TYPE: </td>
                                    <td><input type="text" name="branch_name" id="branch_name" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><label for="branch_name">PASSWORD: </td>
                                    <td><input type="text" name="branch_name" id="branch_name" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><label for="branch_name">PASSWORD2: </td>
                                    <td><input type="text" name="branch_name" id="branch_name" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="right">
                                    <input type="submit" class="button-submit" value="ADD">
                                    </td>
                                </tr>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>