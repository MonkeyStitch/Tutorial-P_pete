<?php

	session_start(); // ประกาศเพื่อจะใช้ session

	error_reporting(1); // close error

	if($_POST['username'] == '' || $_POST['password'] == ''){
		echo "Username or Password is empty.";
		exit();
	}

	try {
		// connect
		$db = new PDO("mysql:dbname=employee;host=localhost", 'root', '');

		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$username = $_POST['username'];
		$password = $_POST['password'];

		// ไม่ควรเขียนแบบนี้ password='input'or 1='1'
//		$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
//		$stmt = $db->query($sql);

		// วิธีนี้ ป้องกันการ injection
		$sql = "SELECT * FROM admin WHERE username=:username and password=:password";
		$stmt = $db->prepare($sql);
		$param[':username'] = $username;
		$param[':password'] = $password;
		$stmt->execute($param);

		$row_count = $stmt->rowCount();
		if($row_count == 0){
			echo 'Password is incorrect.';
			exit();
		} else {
			$_SESSION['username'] = $username;
			//echo 'Login success.';
			header('location: addnew_employee.php');
		}

	} catch (PDOException $ex) {
		echo 'ERROR' . $ex->getMessage();
	}