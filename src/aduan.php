<?php 
    session_start();

    //include autoloader classes
    include '../includes/autoloader.php';
    
    if(isset($_GET['branch'])){  
        echo '<select name="location" id="location"  class="form-control">';
        echo '<option value="" disabled selected>Choose Location</option>';

        $q = new Query("SELECT L.LOCATION_ID, L.LOCATION_NAME  
                        FROM LOCATION L 
                        JOIN LOCATION_BRANCH M 
                        ON (M.LOCATION_ID = L.LOCATION_ID) 
                        WHERE M.BRANCH_ID = '".trim($_GET['branch']).'\'');
        $r = $q->fetch_array();
        for ($i = 0; $i < sizeof($r); $i++) {
            echo "<option value='".$r[$i][0]."'>".$r[$i][1]."</option>";
        }
        echo '</select>';
        exit();
    }
    
?>

<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600,700" rel="stylesheet">
        <title>SCES</title>
    </head>
    <body>    
        <?php include 'header/default_header.php';?>
            
        <div class="content">
            <main class="register-view">
                <h1 class="title">Daftar Aduan/Lodge Complaint</h1>
                <form   class="registration-form" 
                        id="form" 
                        action="./add_complain.php" 
                        method="POST"
                        enctype="multipart/form-data">
                    <table class="register-table">
                        <tr>
                            <td><label for="">User Type : </label></td>
                            <td class="input-radio" style="margin-left:10px;">
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
                        <tbody id="other">
                        <tr>
                            <td><label for="name">Name : </td>
                            <td><input type="text" name="name" id="name" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><label for="email">Email: </td>
                            <td><input type="text" name="email" id="email" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><label for="phone_no">Phone Number: </td>
                            <td><input type="text" name="phone_no" id="phone_no" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><h3 class="h3">Complaint Information</h3></td>
                        </tr>
                        <tr>
                            <td><label for="branch">UiTM Branch: </td>
                            <td>
                                <select name="branch" id="branch"  class="form-control">
                                    <option value="" disabled selected>Choose Branch</option>
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
                            <td><label for="location">Location Details : </td>
                            <td>
                                <select name="location" id="location"  class="form-control">
                                <option value="" disabled selected>Choose Location</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="category">Category: </td>
                            <td>
                                <select name="category" id="category"  class="form-control">
                                    <option value="" disabled selected>Choose Category</option>
                                    <?php 
                                        $q = new Query("SELECT * FROM CATEGORY");
                                        $r = $q->fetch_array();
                                        for ($i = 0; $i < sizeof($r); $i++) {
                                            echo "<option value='".$r[$i][0]."'>".$r[$i][1]."</option>";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="details">Details : </td>
                            <td>
                                <textarea name="details" id="details" cols="30" rows="10"  class="form-control textarea"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="attachment">Attachment : </td>
                            <td>
                                <div class="flex">
                                    <input type="file" name="fileToUpload" id="attachment" class="form-control file">
                                    <button class="button-remove">Remove</button>
                                </div>
                                <p style="font-size: small;">*Format PDF or Image(jpg, png, jpeg)only</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="center" style="margin-top: 4rem;">
                                    <input type="submit" name="submit" class="button-submit" value="Submit">
                                    <input type="reset" class="button-reset" value="Reset">
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </main>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/aduan.js"></script>
    </body>
</html>