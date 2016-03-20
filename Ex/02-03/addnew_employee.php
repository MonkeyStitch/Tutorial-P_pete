<?php
	require_once(__DIR__ . '/admin_menu.php');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Addnew Employee</title>
</head>
<body>
	<form method="post">
		<table >
			<tr>
				<th colspan="2">เพิ่มข้อมูลพนักงาน</th>
			</tr>
			<tr>
				<td><label for="emp_no">รหัสพนักงาน</label></td>
				<td><input type="text" name="emp_no" id="emp_no"/></td>
			</tr>
			<tr>
				<td><label for="emp_name">ชื่อ</label></td>
				<td><input type="text" name="emp_name" id="emp_name"/></td>
			</tr>
			<tr>
				<td><label for="emp_lastname">นามสกุล</label></td>
				<td><input type="text" name="emp_lastname" id="emp_lastname"/></td>
			</tr>
			<tr>
				<td><label for="birthday">วันเกิด</label></td>
				<td><input type="date" name="birthday" id="birthday"/></td>
			</tr>
			<tr>
				<td>เพศ</td>
				<td>
					<label for="male">ชาย</label> <input type="radio" name="gender" id="male" value="M"/>
					<label for="female">หญิง</label> <input type="radio" name="gender" id="female" value="F"/>
				</td>
			</tr>
			<tr>
				<th colspan="2"><input type="submit" value="เพิ่มพนักงาน" name="send"/> </th>
			</tr>
		</table>
	</form>

	<hr>

	<?php

		if($_POST){
//			$sql = "INSERT INTO employees (emp_no, first_name, last_name, birth_date, gender) VALUES ('".$_POST['emp_no']."', '".$_POST['emp_name']."', '".$_POST['emp_lastname']."', '".$_POST['birthday']."', '".$_POST['gender']."')";
//			echo $sql;

			$success = true;
			$emp_no 	= $_POST['emp_no'];
			$first_name = $_POST['emp_name'];
			$last_name 	= $_POST['emp_lastname'];
			$birth_date = $_POST['birthday'];
			$gender 	= $_POST['gender'];

			if(empty($emp_no) || $emp_no == '' ){
				$success = false;
				echo 'empty or null emp_no <br>';
			}
			if(empty($first_name) || $first_name == '' ){
				$success = false;
				echo 'empty or null first_name <br>';
			}
			if(empty($last_name) || $last_name == '' ){
				$success = false;
				echo 'empty or null last_name <br>';
			}
			if(empty($birth_date) || $birth_date == '' ){
				$success = false;
				echo 'empty or null birth_date <br>';
			}
			if(empty($gender) || $gender == '' ){
				$success = false;
				echo 'empty or null gender <br>';
			}
			if($success) {
				try {
					// connect
					$db = new PDO("mysql:dbname=employee;host=localhost;charset=utf8", 'root', '');
//					$db->exec("set name utf8");
					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$sql = "SELECT count(emp_no) as num FROM employees WHERE emp_no =:emp_no";
					$stmt = $db->prepare($sql);
					$param[':emp_no'] = $emp_no;
					$stmt->execute($param);

					$result = $stmt->fetch(PDO::FETCH_ASSOC);
					if($result['num'] == 1){
						echo 'Duplicate emp_no';
					} else {
//						echo 'ไม่มีรหัสซ้ำ';
						$sql = "INSERT INTO employees (emp_no, first_name, last_name, birth_date, gender) VALUES (:emp_no, :first_name, :last_name, :birth_date, :gender)";
						$stmt = $db->prepare($sql);
						$stmt->bindParam(':emp_no', $emp_no);
						$stmt->bindParam(':first_name', $first_name);
						$stmt->bindParam(':last_name', $last_name);
						$stmt->bindParam(':birth_date', $birth_date);
						$stmt->bindParam(':gender', $gender);

						if($stmt->execute()){
							echo 'Add employee success';
						}
					}

				} catch (PDOException $ex) {
					echo 'ERROR' . $ex->getMessage();
				}
			}
		}
	?>

</body>
</html>