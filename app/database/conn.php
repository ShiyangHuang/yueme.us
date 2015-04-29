<?php
	
	$host_name  = "db571503515.db.1and1.com";
    $database   = "db571503515";
    $user_name  = "dbo571503515";
    $password   = "asdf1234";

    $con = new mysqli($host_name, $user_name, $password, $database);
    if(!$con)
	{
		die('Could not connect: '. mysql_error());
	}
    $con -> query("SET NAMES UTF8");
    $con -> query("set character_set_client=utf8");
    $con -> query("set character_set_results=utf8");

?>