<?php session_start();
    if(isset($_SESSION["username"])){
        header("Location: ./admin.php");
    }

    //include autoloader classes
    include '../includes/autoloader.php';

    if (isset($_POST['submit'])) {
        $user = trim($_POST['username']);
        $pass = trim($_POST['password']);
        
        if(!(empty($user) && empty($pass))){
            $auth = new Auth();

            if ($auth->verify($user, $pass)) {
                $_SESSION['username'] = $user;
                header("Location: ./admin.php");
            } else {
                $_SESSION['errMsg'] = "<span style='color:red;font-size:2rem;'>*Invalid password or Username</span>";
            }
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
                        <?php if(isset($_SESSION['errMsg'])) { echo $_SESSION['errMsg']; unset($_SESSION['errMsg']); }  ?>
                        <table class="login-table">
                            <tr>
                                <td><label for="username">ID Pengguna / Username :</label></td>
                                <td><input type="username" name="username" id="username" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td><label for="password">Katalaluan / Password : </label></td>
                                <td><input type="password" name="password" id="password" class="form-control" autocomplete = "new-password" required></td>
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