<?php
    require_once(__DIR__ . '/admin_menu.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee No. <?=$_GET['emp_no'] ?> Edit</title>
</head>
<body>

<?php
    $id = isset($_GET['emp_no']) ? $_GET['emp_no'] : false;

    if(!$id){
        echo 'emp_no Null';
    } else {
//        echo $id;
        $sql = "select * from employees where emp_no=:emp_no";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':emp_no', $_GET['emp_no'], PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

//        print_r($data);

?>
<form method="post" action="" id="form1" enctype="multipart/form-data" name="form1" >
    <table width="800px" border="0">
        <tr>
            <th colspan="2">แก้ไขข้อมูลพนักงาน</th>
        </tr>
        <tr>
            <td width="25%"><label for="emp_no">รหัสพนักงาน</label></td>
            <td width="75%"><input type="hidden" name="emp_no" id="emp_no" value="<?=$data['emp_no'] ?>"/><?=$data['emp_no'] ?></td>
        </tr>
        <tr>
            <td><label for="picture">รูปภาพ</label></td>
            <td>
                <?php
                    if($data['picture'] != ''){
                ?>
                        <img src="picture/<?php echo $data['picture'] ?>" alt="<?php echo $data['picture'] ?>" style="width: 120px;">
                        ลบรูป <input type="radio" name="del_picture" value="yes"> yes
                        <input type="radio" name="del_picture" value="no" checked="checked"> no
                <?php
                    }
                ?>
                <br>
                <input type="file" name="picture" id="picture" value="<?=$data['picture'] ?>"/>
            </td>
        </tr>
        <tr>
            <td><label for="emp_name">ชื่อ</label></td>
            <td><input type="text" name="emp_name" id="emp_name" value="<?=$data['first_name'] ?>"/></td>
        </tr>
        <tr>
            <td><label for="emp_lastname">นามสกุล</label></td>
            <td><input type="text" name="emp_lastname" id="emp_lastname" value="<?=$data['last_name'] ?>"/></td>
        </tr>
        <tr>
            <td><label for="birthday">วันเกิด</label></td>
            <td><input type="date" name="birthday" id="birthday" value="<?=$data['birth_date'] ?>"/></td>
        </tr>
        <tr>
            <td>เพศ</td>
            <td>
                <label for="male">ชาย</label>
                <input type="radio" name="gender" id="male" value="M" <?= $data['gender'] === 'M' ? 'checked' : ''; ?>/>
                <label for="female">หญิง</label>
                <input type="radio" name="gender" id="female" value="F" <?= $data['gender'] === 'F' ? 'checked': ''; ?>/>
            </td>
        </tr>
        <tr>
            <th colspan="2"><input type="submit" value="แก้ไขพนักงาน" name="send"/> </th>
        </tr>
    </table>
</form>

<?php
    }

    // POST
    if($_POST){
//        echo '<pre>';
//        print_r($_FILES);
//        print_r($_POST);
//        echo '</pre>';

        $emp_no 	= $_POST['emp_no'];
        $first_name = $_POST['emp_name'];
        $last_name 	= $_POST['emp_lastname'];
        $birth_date = $_POST['birthday'];
        $gender 	= $_POST['gender'];
        $picture = '';


        if($_POST['del_picture'] === 'no' && isset($_POST['del_picture'])){
            $picture = $emp_no . '.jpg';
        } else {
            $picture = $emp_no . '.jpg';
            unlink('picture/' . $picture);
            $picture = '';

            // rename picture
            if($_FILES['picture']['type'] === 'image/jpeg') {
                // rename คือ rename จาก file tmp จาก server
                $picture = $emp_no . '.jpg';
                rename($_FILES['picture']['tmp_name'], 'picture/'. $picture);
            }
        }



        $sql = 'update employees
                set first_name=:emp_name, last_name=:emp_lastname, gender=:gender, birth_date=:birthday, picture=:emp_picture
                WHERE emp_no=:emp_no';

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':emp_no', $emp_no);
        $stmt->bindValue(':emp_name', $first_name);
        $stmt->bindValue(':emp_lastname', $last_name);
        $stmt->bindValue(':gender', $gender);
        $stmt->bindValue(':birthday', $birth_date);
        $stmt->bindValue(':emp_picture', $picture);

        // วิธีที่ 2
//        $param[':emp_no']       =  $emp_no;
//        $param[':emp_name']     =  $first_name;
//        $param[':emp_lastname'] =  $last_name;
//        $param[':gender']       =  $gender;
//        $param[':birthday']     =  $birth_date;
//        $param[':emp_picture']  =  $picture;
//        $stmt->execute($param);

        if($stmt->execute()){
//            echo 'success';
            header('location: list_employee.php');
        }

    }
?>

</body>
</html>
