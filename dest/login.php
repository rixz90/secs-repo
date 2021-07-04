<?php session_start();
    if(isset($_SESSION["username"])){
        header("Location: ./admin.php");
    }

    //include autoloader classes
    include '../includes/autoloader.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Connect Database
        $db = new Db();
        $conn = $db->connect();
        $query = "SELECT password from admin where username = :username";
        $stid = oci_parse($conn, $query);
        
        //  Bind the input parameter
        oci_bind_by_name($stid,':username',$username,32);

        // collect value of input field
        $username = trim($_POST['username']);
        
        oci_execute($stid);
        $r = oci_fetch_array($stid, OCI_ASSOC);
        
        $hash = $r['PASSWORD'];
        $pass = trim($_POST['password']);

        if (password_verify($pass, $hash)) {
            $_SESSION['username'] = $username;
            header("Location: ./admin.php");
        } else {
            echo 'Invalid password.';
        }
    }

?>

<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600,700" rel="stylesheet">
        <title>SCES</title>
    </head>
    <body>
        <?php include 'header/default_header.php'; ?>

        <div class="content">
            <main class="login-view">
                <h1 class="title">Log Masuk / Log In</h1>
                <div class="container">
                    <form class="login-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                        <table class="login-table">
                            <tr>
                                <td><label for="username">ID Pengguna / Username :</label></td>
                                <td><input type="text" name="username" id="username" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><label for="password">Katalaluan / Password : </label></td>
                                <td><input type="password" name="password" id="password" class="form-control"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="center" style="margin-top: 4rem;">
                                        <input type="submit" name="submit" class="button-submit" value="Login">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>