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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <title>SCES</title>
    </head>
    <body>
        <?php include 'header/admin_header.php'; ?>

        <div class="content">
            <main class="adminSet-view">
                <nav class="admin-sidenav">
                    <ul>
                        <li id="nav_bra"><a>Branch</a></li>
                        <li id="nav_cat"><a>Category</a></li>
                        <li id="nav_loc"><a>Location</a></li>
                        <li id="nav_adm"><a>Administator</a></li>
                    </ul>
                </nav>
                <div class="main">
                    <div class="panel" id="branchPanel">
                        <h1 class="title">Branch</h1>
                        <table class="table">
                            <tr>
                                <th>Branch ID</th>
                                <th>Branch Name</th>
                            </tr>
                            <?php 
                            $q = new Query('SELECT * FROM branch');
                            $r = $q->fetch_array();
                            for ($i = 0; $i < sizeof($r); $i++) {
                                echo '<tr class="option">';
                                echo '<td>'.$r[$i][0].'</td>';
                                echo '<td>'.$r[$i][1].'</td>';
                                echo '</tr>';
                            }
                            ?>
                        </table>
                        <div class="panel">
                            <form class="registration-form f-table" action="./add.php" method="POST">
                            <input type="hidden" name="type" value="BRA">
                            <fieldset>
                                <legend>Insert Branch:</legend>
                                <table>
                                <tr>
                                    <td><label for="branch_id">Branch ID: </td>
                                    <td><input  type="text"
                                                id="branch_id" 
                                                name="id" 
                                                class="form-control"
                                                required/></td>
                                </tr>
                                <tr>
                                    <td><label for="branch_name">Branch Name: </td>
                                    <td><input  type="text"  
                                                id="branch_name"
                                                name="name" 
                                                class="form-control"
                                                required/></td>
                                </tr>
                                <tr>        
                                    <td colspan="2">
                                    <div class="flex">
                                        <input  type = "submit"
                                                name = "ADD_BRA"
                                                class = "button-submit" 
                                                value = "ADD"/>
                                        <input  type = "submit"
                                                name = "UP_BRA"
                                                class = "button-update" 
                                                value = "UPDATE"/>
                                        <input  type = "submit"
                                                name = "DEL_BRA"
                                                class = "button-remove" 
                                                value = "DELETE"/>
                                    </div>
                                    </td>
                                </tr>
                                </table>
                            </fieldset>
                            </form>
                        </div>
                    </div>

                    <div class="panel" id="categoryPanel">
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
                                echo '<tr class="option">';
                                echo '<td>'.$r[$i][0].'</td>';
                                echo '<td>'.$r[$i][1].'</td>';
                                echo '</tr>';
                            }
                            ?>
                        </table>
                        <div class="panel">
                            <form class="registration-form f-table" action="./add.php" method="POST">
                            <input type="hidden" name="type" value="CAT">
                                <fieldset>
                                    <legend>Insert Category:</legend>
                                    <table>
                                    <tr>
                                        <td><label for="cat_id">Category ID: </td>
                                        <td><input  type="text" 
                                                    name="id" 
                                                    id="cat_id" 
                                                    class="form-control"
                                                    required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="cat_name">Category Name: </td>
                                        <td><input  type="text" 
                                                    name="name" 
                                                    id="cat_name" 
                                                    class="form-control"
                                                    required></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                        <div class="flex">
                                            <input  type = "submit"
                                                    name = "ADD_CAT"
                                                    class = "button-submit" 
                                                    value = "ADD"/>
                                            <input  type = "submit"
                                                    name = "UP_CAT"
                                                    class = "button-update" 
                                                    value = "UPDATE"/>
                                            <input  type = "submit"
                                                    name = "DEL_CAT"
                                                    class = "button-remove" 
                                                    value = "DELETE"/>
                                        </div>
                                        </td>
                                    </tr>
                                    </table>
                                </fieldset>
                            </form>
                        </div>
                    </div>

                    <div class="panel" id="locationPanel">
                        <h2>Location</h2>
                        <table class="table">
                            <tr>
                                <th>Location ID</th>
                                <th>Location Name</th>
                                <th>Branch Name</th>
                            </tr>
                            <?php 
                            $q = new Query('SELECT L.LOCATION_ID, L.LOCATION_NAME, B.BRANCH_NAME   
                                            FROM (LOCATION L JOIN LOCATION_BRANCH M
                                            ON (L.LOCATION_ID = M.LOCATION_ID)) 
                                            JOIN BRANCH B 
                                            ON (M.BRANCH_ID = B.BRANCH_ID)');
                            $r = $q->fetch_array();
                            for ($i = 0; $i < sizeof($r); $i++) {
                                echo '<tr class="option">';
                                echo '<td>'.$r[$i][0].'</td>';
                                echo '<td>'.$r[$i][1].'</td>';
                                echo '<td>'.$r[$i][2].'</td>';
                                echo '</tr>';
                            }
                            ?>
                        </table>
                        <div class="panel">
                            <form class="registration-form f-table" action="./add.php" method="POST">
                            <input type="hidden" name="type" value="LOC">
                            <fieldset>
                                <legend>Insert Location:</legend>
                                <table>
                                <tr>
                                    <td><label for="loc_id">Location ID: </td>
                                    <td><input  type="text" 
                                                name="id" 
                                                id="loc_id" 
                                                class="form-control"
                                                required/></td>
                                </tr>
                                <tr>
                                    <td><label for="loc_name">Location Name: </td>
                                    <td><input  type="text" 
                                                name="name" 
                                                id="loc_name" 
                                                class="form-control"
                                                required/></td>
                                </tr>
                                <tr>
                                    <td><label for="bra_id">Branch: </td>
                                    <td>
                                        <select name="bra_id" id="bra_id"  class="form-control">
                                        <option disabled selected>Choose Branch</option>
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
                                    <td colspan="2">
                                    <div class="flex">
                                        <input  type = "submit"
                                                name = "ADD_LOC"
                                                class = "button-submit" 
                                                value = "ADD"/>
                                        <input  type = "submit"
                                                name = "UP_LOC"
                                                class = "button-update" 
                                                value = "UPDATE"/>
                                        <input  type = "submit"
                                                name = "DEL_LOC"
                                                class = "button-remove" 
                                                value = "DELETE"/>
                                    </div>
                                    </td>
                                </tr>
                                </table>
                            </fieldset>
                            </form>
                        </div>
                    </div>

                    <div class="panel" id="adminPanel">
                        <h2>Administrator</h2>
                        <table class="table">
                            <tr>
                                <th>Username</th>
                                <th>Access Type</th>
                                <th>Password</th>
                            </tr>
                            <?php 
                            $q = new Query('SELECT * FROM admin');
                            $r = $q->fetch_array();
                            for ($i = 0; $i < sizeof($r); $i++) {
                                echo '<tr class="option">';
                                echo '<td>'.$r[$i][0].'</td>';
                                echo '<td>'.$r[$i][1].'</td>';
                                echo '<td>'.substr($r[$i][2],0,20).'</td>';
                                echo '</tr>';
                            }
                            ?>
                        </table>
                        <div class="panel">
                            <form class="registration-form f-table" action="./add.php" method="POST">
                            <input type="hidden" name="type" value="ADM">
                            <fieldset>
                                <legend>Insert Administrator:</legend>
                                <table>
                                <tr>
                                    <td><label for="admin_id">ID: </td>
                                    <td><input  type="text" 
                                                name="id" 
                                                id="admin_id" 
                                                class="form-control"
                                                required/></td>
                                </tr>
                                <tr>
                                    <td><label for="admin_type">ACCESS TYPE: </td>
                                    <td><input  type="text" 
                                                name="access" 
                                                id="admin_type" 
                                                class="form-control"
                                                required/></td>
                                </tr>
                                <tr>
                                    <td><label for="pass">PASSWORD: </td>
                                    <td><input  type="text" 
                                                name="pass" 
                                                id="pass" 
                                                class="form-control"
                                                required/></td>
                                </tr>
                                <tr>
                                    <td><label for="c_pass">CONFORM PASSWORD: </td>
                                    <td><input  type="text" 
                                                name="c_pass" 
                                                id="c_pass" 
                                                class="form-control"
                                                required/></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                    <div class="flex">
                                        <input  type = "submit"
                                                name = "ADD_ADMIN"
                                                class = "button-submit" 
                                                value = "ADD"/>
                                        <input  type = "submit"
                                                name = "UP_ADMIN"
                                                class = "button-update" 
                                                value = "UPDATE"/>
                                        <input  type = "submit"
                                                name = "DEL_ADMIN"
                                                class = "button-remove" 
                                                value = "DELETE"/>
                                    </div>
                                    </td>
                                </tr>
                            </table>
                            </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        <script src="js/admin_setting.js"></script>
    </body>
</html>