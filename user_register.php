<?php
function user_register() {
	
	include('conn.php');
	$rawstr = file_get_contents("php://input");
	//echo $rawstr;
	if ($rawstr) {
		$input_json = json_decode("$rawstr",true);

		$input_user_email = $input_json["email"];
		$input_user_password = md5($input_json["password"]);
		$input_user_name = $input_json["name"];
		$input_user_school = $input_json["school"];
		$input_user_major = $input_json["major"];

		$sql = "SELECT * FROM `user` WHERE `user_email` = '".$input_user_email."'";
		$result = $con -> query($sql);
		//echo $sql;
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
			echo "success";
		}
	}
	else {
	    echo "ERROR: no user_email or user_pw\n";
	}

}
?>