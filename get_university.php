<?php
	error_reporting(E_ALL || ~E_NOTICE);
	include('conn.php');
	$rawstr = file_get_contents("php://input");
	//echo $rawstr;
	if ($rawstr) {
		$input_json = json_decode("$rawstr",true);

		$input_user_email = $input_json["email"];
		$input_user_password = $input_json["password"];

		$fetch_user_pw = 'nopw';
		//echo $fetch_user_pw;

		$sql = "SELECT * FROM `user` WHERE `user_email` = '".$input_user_email."';";
		//echo $sql;
		$query = $con -> query($sql);

		while ($row = $query -> fetch_row()) {
			$fetch_user_pw = $row[2];
			//echo $fetch_user_pw;
		}

		if($fetch_user_pw == 'nopw') {
			echo "no such user";
		}
		else if ($fetch_user_pw != $input_user_password) {
			echo "wrong password";
		}
		else echo "success";
	}
	else echo 'No email or password';
?>