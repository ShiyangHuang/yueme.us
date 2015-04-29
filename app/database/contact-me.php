<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

	$host_name  = "db562916345.db.1and1.com";
    $database   = "db562916345";
    $user_name  = "dbo562916345";
    $password   = "asdf1234";

    $con = new mysqli($host_name, $user_name, $password, $database);
    if(!$con)
	{
		die('Could not connect: '. mysql_error());
	}
    $con -> query("SET NAMES UTF8");
    $con -> query("set character_set_client=utf8");
    $con -> query("set character_set_results=utf8");

//perform SQL query
if(isset($_POST["text"])) {
	$input_name = $_POST["name"];
	$input_email = $_POST["email"];
	$input_subject = $_POST["subject"];
    $input_text = $_POST["text"];
	$sql = "INSERT INTO `db562916345`.`websitecontact` (`name`, `email`, `subject`, `contact`) VALUES ('".$input_name."', '".$input_email."', '".$input_subject."', '".$input_text."');";
	//echo $sql;
	$con -> query($sql);
	echo "Success!";
}
else {
    echo "ERROR\n";
}
?>

<meta http-equiv="refresh" content=0;url=index.php"> 
</head>
</html>