<?php
    //include autoloader classes
    include '../includes/autoloader.php';

    if(isset($_POST['userType']))
        $userType = $_POST['userType'];

    if(empty($userType)){
        echo "<tbody id=location>";
        echo "</tbody>";
        exit();
    }

    if($userType == 'staff'){
        $search_item = trim($_POST['staffId']);
        $sql = new Query("  SELECT c.COMPLAINT_ID, c.DATE_REPORT, ca.CATEGORY_NAME, NVL(to_char(c.date_complete),'STILL REVIEW'), c.comp_status
                            FROM COMPLAINT c JOIN CATEGORY ca ON(c.CATEGORY_ID = ca.CATEGORY_ID)
                            JOIN comp_user u ON(u.user_id = c.user_id)
                            JOIN staff st ON(u.user_id = st.user_id) 
                            WHERE st.staff_id = :id");
        $param = array(
            ":id" => $search_item
        );
    } else if($userType == 'student'){ 
        $search_item = trim($_POST['studentId']);
        $sql = new Query("  SELECT c.COMPLAINT_ID, c.DATE_REPORT, ca.CATEGORY_NAME, NVL(to_char(c.date_complete),'STILL REVIEW'), c.comp_status
                            FROM COMPLAINT c JOIN CATEGORY ca ON(c.CATEGORY_ID = ca.CATEGORY_ID)
                            JOIN comp_user u ON(u.user_id = c.user_id)
                            JOIN student st ON(u.user_id = st.user_id) 
                            WHERE st.matrix_id = :id");
        $param = array(
            ":id" => $search_item
        );
    } else if($userType == 'guest') {
        $search_item = trim($_POST['name']);
        $sql = new Query("  SELECT c.COMPLAINT_ID, c.DATE_REPORT, ca.CATEGORY_NAME, NVL(to_char(c.date_complete),'STILL REVIEW'), c.comp_status
                            FROM COMPLAINT c JOIN CATEGORY ca ON(c.CATEGORY_ID = ca.CATEGORY_ID)
                            JOIN comp_user u ON(u.user_id = c.user_id)
                            WHERE u.name = :id");
        $param = array(
            ":id" => $search_item
        );
    } else {
        exit();
    }

    $r = $sql->fetch_array_with_param($param);
    echo "<tbody id=location>";
    for ($i = 0; $i < sizeof($r); $i++) {
        $j = $i+1;
        echo "<tr>";
        echo "<td>".$j."</td>";
        echo "<td>".$r[$i][0]."</td>";
        echo "<td>".$r[$i][1]."</td>";
        echo "<td>".$r[$i][2]."</td>";
        echo "<td>".$r[$i][3]."</td>";
        echo "<td>".$r[$i][4]."</td>";
        echo "</tr>";
    }
    echo "</tbody>";
?>