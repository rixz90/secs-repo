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
                        </form>
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
                        </form>
                    </div>

                    <div class="panel">
                        <h2>Loaction</h2>
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
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>