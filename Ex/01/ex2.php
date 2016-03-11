<form method="get">
	<input type="number" name="input" value="<?=$_GET['input']?>"/>
	<input type="submit" value="Submit" name="send"/>
</form>
<hr>
<?php

	if(isset($_GET['send'])){
		$m = $_GET['input'];

		for($i = 1; $i <= 12; $i++){
			echo $m . ' x ' . $i . ' = ' . ($m * $i) . '<br>';
		}
	}

