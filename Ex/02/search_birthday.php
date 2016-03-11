<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Search Birthday</title>
</head>
<body>
	<form method="post">
		<table width="100%" border="1">
			<tr>
				<th colspan="2">ค้นหาวันเกิด</th>
			</tr>
			<tr>
				<td width="25%">ระหว่างวันที่</td>
				<td width="75%"><input type="date" name="set_date"/></td>
			</tr>
			<tr>
				<td>ถึงวันที่</td>
				<td><input type="date" name="to_date" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="ค้นหา"/></td>
			</tr>
		</table>
	</form>

	<hr>

	<?php
		if($_POST){
			$sql = "SELECT * FROM employees WHERE birth_date BETWEEN '".$_POST['set_date']."' AND '".$_POST['to_date']."'";
			echo $sql;
		}
	?>

</body>
</html>