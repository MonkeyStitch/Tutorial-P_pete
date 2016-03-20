<?php

    require_once(__DIR__ . '/admin_menu.php');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>รายชื่อพนักงาน</title>
</head>
<body>

<table border="1">
    <tr>
        <th>Emp No</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th></th>
    </tr>

    <?php
        $sql = "select * from employees order by emp_no desc";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $row_count = $stmt->rowCount();
        if($row_count === 0){
            echo '<tr><td colspan="2">ไม่พบข้อมูลพนักงาน</td></tr>';
        } else {
//            $data = $stmt->fetch();
//            print_r($data);
            for($i = 0; $i < 50; $i++) {
                $emp = $stmt->fetch();
                ?>
                <tr>
                    <td><?=$emp['emp_no'] ?></td>
                    <td><?=$emp['first_name'] ?></td>
                    <td><?=$emp['last_name'] ?></td>
                    <td>
                        <a href="edit_employee.php?emp_no=<?=$emp['emp_no'] ?>" onmouseover="test()">Edit</a> |
                        <a href="delete_employee.php?emp_no=<?=$emp['emp_no'] ?>" onclick="if(!confirm('คุณต้องการลบข้อมูลพนักงานนี้หรือไม่?')){return false}">Delete</a>
                    </td>
                </tr>
                <?php
            }
        }
    ?>

</table>

<script>
    function test() {
//        let id = this.location.hash;
        let id = this.href;
        console.log(id);
    }
</script>

</body>
</html>
