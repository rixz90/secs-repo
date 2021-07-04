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
        <?php include 'header/default_header.php'; ?>
            
        <div class="content">
            <main class="register-view">
                <h1 class="title">Complaint Details</h1>
                <form class="registration-form" >
                    <table class="register-table">
                        <tr>
                            <td style="height: 2rem;"><label>Complaint ID : </label></td>
                            <td>1001</td>
                        </tr>
                        <tr>
                            <td><label for="staff">User Type : </label></td>
                            <td class="input-radio">
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
                        <tr>
                            <td><label for="staffId">Staff ID : </td>
                            <td><input type="text" name="staffId" id="staffId" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><label for="studentId">Student ID : </td>
                            <td><input type="text" name="studentId" id="studentId" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><label for="guestName">Guest Name : </td>
                            <td><input type="text" name="guestName" id="guestName" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><h3 class="h3">Complaint Information</h3></td>
                        </tr>
                        <tr>
                            <td><label for="branch">UiTM Branch: </td>
                            <td>
                                <select name="branch" id="branch"  class="form-control">
                                    <option value="" disabled selected>Choose Branch</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="location">Location Details : </td>
                            <td><input type="text" name="location" id="location"  class="form-control"></td>
                        </tr>
                        <tr>
                            <td><label for="category">Category: </td>
                            <td>
                                <select name="category" id="category"  class="form-control">
                                    <option value="" disabled selected>Choose Category</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
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
                                    <input type="file" name="attachment" id="attachment" class="form-control file">
                                    <button class="button-remove">Remove</button>
                                </div>
                                <p style="font-size: small;">*Format PDF or Image(jpg, png, jpeg)only</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="center" style="margin-top: 4rem;">
                                    <input type="submit" class="button-submit" value="Submit">
                                    <input type="reset" class="button-reset" value="Reset">
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </main>
        </div>
    </body>
</html>