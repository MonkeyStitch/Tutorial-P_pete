<a href="?pic=1">รูปที่ 1</a>
<a href="?pic=2">รูปที่ 2</a>
<a href="?pic=3">รูปที่ 3</a>
<hr>
<?php

	$pic = $_GET['pic'];

	switch($pic){
		case '1' :
			echo '<img src="image/pic1.jpg" width="500"/>';
			break;
		case '2' :
			echo '<img src="image/pic2.PNG" width="500"/>';
			break;
		case '3' :
			echo '<img src="image/pic3.jpg" width="500"/>';
			break;

	}
