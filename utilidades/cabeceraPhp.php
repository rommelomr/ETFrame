<?php
	define('user','root');
	define('pass','erestu');
	define('gestor','mysql');
	define('host','localhost');
	define('bd','etframe');

	$clases = scandir("clases");
	$pos = count($clases);

	for($i=2;$i<$pos;$i++){
		

		require_once 'clases/'.$clases[$i];
		
	}


?>