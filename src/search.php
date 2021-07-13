<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ./login.php");
    }

    //include autoloader classes
    include '../includes/autoloader.php';

    if(isset($_GET['report'])){
        $sql ="SELECT c.COMPLAINT_ID,u.USER_ID,u.NAME,b.BRANCH_NAME,
        c.DATE_REPORT,ca.CATEGORY_NAME, c.COMP_STATUS, NVL(to_char(c.DATE_COMPLETE),'STILL REVIEW')
        FROM COMPLAINT c JOIN CATEGORY ca ON(c.CATEGORY_ID = ca.CATEGORY_ID) 
        JOIN COMP_USER u ON(u.USER_ID = c.USER_ID) 
        JOIN BRANCH b ON(b.BRANCH_ID = c.BRANCH_ID) WHERE ";

        $flag = false;
        $param = [];
        if(!empty($_GET['date'])){
           $flag = true;
            $sql.="c.DATE_REPORT <= :date_report OR ";

           $time = strtotime($_GET['date']);
           $time = date('j-M-y',$time);
           $param[':date_report'] = $time;
        }

        if(!empty($_GET['name']) || $_GET['name']!=0){
            $flag = true;
            $sql.="u.NAME LIKE '%' || :name || '%' OR ";

            $param['name'] = trim($_GET['name']);
        }

        if(!empty($_GET['branch']) || $_GET['branch']!=0){
            $flag = true;
            $sql.="b.BRANCH_ID = :branch OR ";

            $param['branch'] = trim($_GET['branch']);
        }

        if(!empty($_GET['status'])){
            $flag = true;
            $sql.="c.COMP_STATUS = :comp_status OR";

            $param['comp_status'] = trim($_GET['status']);
        }

        

        $statement = substr($sql,0,strlen($sql)-3);

        if($flag == true){
            $q = new Query($statement);
            $r = $q->fetch_array_with_param($param);

            if(empty($r)){
                echo "<tbody id='location'><tr><td colspan=9><center>Not Found</center></td></tr></tbody>";
            }
        }
        
        else {
            echo "<tbody id='location'><tr><td colspan=9><center>Not Found</center></td></tr></tbody>";
        }
        
        
        echo "<tbody id='location'>";
        for ($i = 0; $i < sizeof($r); $i++) {
            $k = $i+1;
            echo "<tr class='option'>";
            echo "<td>".$k."</td>";
            echo "<td>".$r[$i][0]."</td>";
            echo "<td>".$r[$i][2]."</td>";
            echo "<td>".$r[$i][3]."</td>";
            echo "<td>".$r[$i][4]."</td>";
            echo "<td>".$r[$i][5]."</td>";
            echo "<td>".$r[$i][6]."</td>";
            echo "<td>".$r[$i][7]."</td>";
            echo "<td><a href='./detail.php?id=".$r[$i][0]."'>detail</a></td>";
            echo "</tr>";
        }
        echo "</tbody id='location'>";
    }
    

?>