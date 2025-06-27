<html>
<?php include(BASE_ROOT .  $_ENV['COMP_PATH'] . '/common/_header.php'); ?>

<body>
    <?php include(BASE_ROOT . $_ENV['COMP_PATH'] . '/common/admin_nav.php'); ?>
    <div class="content">
        <main class="admin-view center">
            <h1 class="title">Management Complaints</h1>
            <div class="main">
                <div class="panel">
                    <form class="admin-form" action="./admin.php" method="GET">
                        <table class="admin-table">
                            <tr>
                                <td><label for="id">Complaint ID:</label></td>
                                <td><input type="text" class="form-control" name="id" id="id"></td>
                                <td><input type="submit" class="button-submit" name="search" id="search" value="Search"></td>
                                <td><a href="./admin.php" class="button-reset">Reset</a></td>
                                <?php
                                if (isset($_SESSION['errMsg'])) {
                                    echo "<td><p style='color:red'>" . $_SESSION['errMsg'] . "</p></td>";
                                    unset($_SESSION['errMsg']);
                                }
                                ?>
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
                        <tr>
                            <td colspan="8">
                                <div class="right" style="display:flex">
                                    <form action="./update_complaint.php" id="form_up" method="GET">
                                        <input type="hidden" name="id" />
                                        <input type="submit" class="button-update" id="update" value="Update" />
                                    </form>
                                    <form action="./delete_complaint.php" id="form_del" method="GET">
                                        <input type="hidden" name="id" />
                                        <input type="submit" class="button-remove" id="remove" value="Delete" />
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="/assets/scripts/admin.js"></script>
</body>

</html>