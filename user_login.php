<?php
	
function user_login() {
	include('conn.php');
	$rawstr = file_get_contents("php://input");
	//echo $rawstr;
	if ($rawstr) {
		$input_json = json_decode("$rawstr",true);

		$input_user_email = $input_json["email"];
		$input_user_password = $input_json["password"];

		$fetch_user_password = 'nopw';
		//echo $fetch_user_pw;

		$sql = "SELECT * FROM `user` WHERE `user_email` = '".$input_user_email."';";
		//echo $sql;
		$query = $con -> query($sql);

		while ($row = $query -> fetch_row()) {
			$fetch_user_email = $row[1];
			$fetch_user_password = $row[2];
			$fetch_user_name = $row[3];
			$fetch_user_school = $row[4];
			$fetch_user_major = $row[5];
			//echo $fetch_user_pw;
		}

		if($fetch_user_password == 'nopw') {
			echo '["no such user"]';
		}
		else if ($fetch_user_password != md5($input_user_password)) {
			echo '["wrong password"]';
		}
		else {
			echo '[{"status":"success",
				   "email":"'.$fetch_user_email.'",
				   "password":"'.$fetch_user_password.'",
				   "name":"'.$fetch_user_name.'",
				   "school":"'.$fetch_user_school.'",
				   "major":"'.$fetch_user_major.'"}]';
		};
	}
	else echo "['No email or password']";
}
?>