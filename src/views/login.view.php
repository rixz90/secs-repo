<html>
<?php include(BASE_ROOT . $_ENV['COMP_PATH'] . '/common/_header.php'); ?>

<body>
    <?php include(BASE_ROOT . $_ENV['COMP_PATH'] . '/common/default_nav.php'); ?>

    <div class="content">
        <main class="login-view">
            <h1 class="title">Log Masuk / Log In</h1>
            <div class="container">
                <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <?php if (isset($_SESSION['errMsg'])) {
                        echo $_SESSION['errMsg'];
                        unset($_SESSION['errMsg']);
                    }  ?>
                    <table class="login-table">
                        <tr>
                            <td><label for="username">ID Pengguna / Username :</label></td>
                            <td><input type="text"
                                    name="username"
                                    id="username"
                                    class="form-control"
                                    autocomplete="username" required></td>
                        </tr>
                        <tr>
                            <td><label for="password">Katalaluan / Password : </label></td>
                            <td><input type="password"
                                    name="password"
                                    id="password"
                                    class="form-control"
                                    autocomplete="new-password" required></td>
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