<?php 
    session_start();
    include dirname(__FILE__, 3) . '/vendor/autoload.php';
?>
<html>
    <?php include dirname(__FILE__, 2) . '/components/common/_header.php'; ?>
    <body>
        <?php include dirname(__FILE__, 2) . '/components/common/default_nav.php'; ?>
        <div class="content">
            <main class="review-view">
            
                <h1 class="title">Semakan Aduan / Check Lodge</h1>
                <?php if(isset($_SESSION["success"])) {
                    echo "<p style='color:green; font-size:2rem;'>".$_SESSION["success"]."</p>";
                } ?>
                <form class="review-form" id="form" action="./semakan.php" method="POST">
                    <table class="review-table">
                        <tr>
                            <td><label for="staff">User Type : </label></td>
                            <td class="input-radio" style="margin-left: 1rem;">
                                <div class=item>
                                    <input type="radio" name="userType" id="staff" value="staff">
                                    <label for="staff">Staff</label>
                                </div>
                                <div class=item>
                                    <input type="radio" name="userType" id="student" value="student">
                                    <label for="student">Student</label>
                                </div>
                                <div class=item>
                                    <input type="radio" name="userType" id="guest" value="guest">
                                    <label for="guest">Guest</label>
                                </div>
                            </td>
                        </tr>
                        <tr id="staff_id">
                            <td><label for="staffId">Staff ID : </td>
                            <td><input type="text" name="staffId" id="staffId" class="form-control"></td>
                        </tr>
                        <tr id="student_id">
                            <td><label for="studentId">Student ID : </td>
                            <td><input type="text" name="studentId" id="studentId" class="form-control"></td>
                        </tr>
                        <tr id="guest_name">
                            <td><label for="studentId">Name : </td>
                            <td><input type="text" name="name" id="name" class="form-control"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="center" style="margin-top: 2rem;">
                                    <input type="submit" name="search" class="button-submit" value="Search">
                                    <input type="reset" class="button-reset" value="Reset">
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="table" style="margin-top: 3rem;">
                    <tr>
                        <th>No.</th>
                        <th>Complaint ID</th>
                        <th>Date Report</th>
                        <th>Category</th>
                        <th>Complete Date</th>
                        <th>Status</th>
                    </tr>
                    <tbody id="location">
                    </tbody>
                </table>

            </main>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="/src/scripts/semakan.js"></script>
    </body>
</html>