<?php

	$dir = 'image';
	$sdir = scandir($dir);

	$files = array_diff($sdir, array('..', '.'));

	foreach($files as $key => $value){
		$ext = pathinfo($value);
		$filename = $ext['filename'];
		$basename = $ext['basename'];

		echo '<a href="?pic='.$basename.'">'.$filename.'</a>' . '<br>';
	}

	echo '<hr>';

	if(isset($_GET['pic'])){
		$pic = $_GET['pic'];
		echo '<img src="'.$dir.'/'.$pic.'" width="500"/>';
	}
