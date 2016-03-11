<style>
	.red {
		color: #F00;
	}
</style>

<form method="get">
	<label for="m">สูตรคูณแม่</label>
	<input type="number" name="m" id="m" value="<?=$_GET['m']?>"/>
	<label for="color">ใส่สีแดงที่เลข</label>
	<input type="number" name="color" id="color" value="<?=$_GET['color']?>"/>
	<input type="submit" value="Submit" name="send"/>
</form>
<hr>
<?php

if(isset($_GET['send'])){
	$m = $_GET['m'];

	for($i = 1; $i <= 12; $i++){
		if($i == $_GET['color']){
			echo '<div class="red">'. $m . ' x ' . $i . ' = ' . ($m * $i) . '</div>';
		} else {
			echo '<div>'. $m . ' x ' . $i . ' = ' . ($m * $i) . '</div>';
		}
	}
}