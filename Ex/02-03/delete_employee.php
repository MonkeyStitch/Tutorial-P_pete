<?php
    require_once(__DIR__ . '/admin_menu.php');

    if(isset($_GET['emp_no'])){
        try {
            $id = $_GET['emp_no'];
            $sql = 'delete from employees where emp_no=:emp_no ';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':emp_no', $id, PDO::PARAM_INT);
            if($stmt->execute()){
                echo 'Delete emp_no='.$id .' success';
                // meta มีการ refresh ทุก 3 วินาที แล้ว link url ไปไฟล์ list_employee.php
                echo "<meta http-equiv='refresh' content='3;URL=list_employee.php'>";
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
