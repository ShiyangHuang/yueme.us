<?php
	error_reporting(E_ALL || ~E_NOTICE);
	include('conn.php');

//perform SQL query
if ($_POST["email"]&&$_POST["password"]) {
		
		$input_user_email = $_POST["email"];
		$input_user_password = $_POST["password"];
		$input_user_name = $_POST["name"];
		$input_user_school = $_POST["school"];
		$input_user_major = $_POST["major"];

		$sql = "SELECT * FROM `user` WHERE `user_email` = '".$input_user_email."'";
		$result = $con -> query($sql);
		echo $sql;
		$already_have_it = 0;

	while ($row = $result -> fetch_row()) {
		$already_have_it++;
	}
	if ($already_have_it == 1) {
		echo "This email have already be assigned.";
	} else {
		$timestamp = date('Y-m-d H:i:s',time());
		$insertsql = "INSERT INTO `db571503515`.`user` (`index`, `user_email`, `user_password`, `user_name`, `user_school`, `user_major`) VALUES (NULL, '".$input_user_email."', '".$input_user_password."', '".$input_user_name."', '".$input_user_school."', '".$input_user_major."');";
		$con -> query($insertsql);
		echo "Success!";
	}
}
else {
    echo "ERROR: no user_email or user_pw\n";
}
?>