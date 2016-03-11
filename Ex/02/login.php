<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login - Admin</title>

	<style>
		.flex-container {
			display: -webkit-flex;
			display: flex;
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: lightgrey;
		}

		.flex-item {
			width: 250px;
			margin: auto;
		}
	</style>
</head>
<body>

<div class="flex-container">
	<div class="flex-item">
		<form action="do_login.php" method="post" name="form1" id="form1">
			<fieldset>
				<legend>Login - เข้าสู่ระบบจัดการพนักงาน</legend>

				<table>
					<tr>
						<td><label for="username">Username</label></td>
						<td><input type="text" id="username" name="username"/></td>
					</tr>

					<tr>
						<td><label for="password">Password</label></td>
						<td><input type="password" id="password" name="password"/></td>
					</tr>

					<tr>
						<th colspan="2"><input type="submit" name="submit" value="Login"/></th>
					</tr>
				</table>

			</fieldset>
		</form>
	</div>
</div>


</body>
</html>