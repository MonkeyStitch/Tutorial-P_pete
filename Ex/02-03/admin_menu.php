<?php
    ob_start();  // แก้ปัญหา header()
    session_start();

    if(!isset($_SESSION['username'])){
        header('location: login.php');
    }

    error_reporting(1);

    // connect
    $db = new PDO("mysql:dbname=employee;host=localhost", 'root', '');
    $db->exec('SET CHARACTER SET utf8');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>


<a href="list_employee.php">รายชื่อพนักงาน</a> |
<a href="addnew_employee.php">เพิ่มข้อมูลพนักงาน</a> |
<a href="do_logout.php">ออกจากระบบ</a>

<hr>

