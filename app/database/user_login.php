<?php
	error_reporting(E_ALL || ~E_NOTICE);
	include('conn.php');

	$sql = "SELECT * FROM `user`;";
	$result = $con -> query($sql);
	while($row = $result -> fetch_row())
	{
 
 	}

	if ($_POST["email"]&&$_POST["password"]) {
		
		$input_user_email = $_POST["email"];
		$input_user_password = $_POST["password"];

		$fetch_user_pw = "nopw";
		$sql = "SELECT * FROM `user` WHERE `user_email` = '".$input_user_email."';";
		//echo $sql;
		$query = $con -> query($sql);

		while ($row = $query -> fetch_row()) {
			//echo $row;
			$fetch_user_pw = $row[3];
		}
		if($fetch_user_pw == "nopw") {
			echo "no such user";
		}
		else if ($fetch_user_pw != $input_pw) {
			echo "wrong password";
		}
		else echo "success";
	}
?>