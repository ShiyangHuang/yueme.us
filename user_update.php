<?php
function user_update() {
	include('conn.php');
	$rawstr = file_get_contents("php://input");
	//echo $rawstr;
	if ($rawstr) {
		$input_json = json_decode("$rawstr",true);

		$input_user_email = $input_json["email"];
		$input_user_password = $input_json["password"];
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
		if ($already_have_it == 0) {
			echo "No such user";
		} else {
			if(strlen($input_user_password)!=0) {
				$input_user_password=md5($input_user_password);
				$insertsql = "UPDATE `user` SET `user_password`='".$input_user_password."',`user_name`='".$input_user_name."',`user_school`='".$input_user_school."',`user_major`='".$input_user_major."' WHERE `user_email`='".$input_user_email."'";
			} else {
				$insertsql = "UPDATE `user` SET `user_name`='".$input_user_name."',`user_school`='".$input_user_school."',`user_major`='".$input_user_major."' WHERE `user_email`='".$input_user_email."'";
			}
			$con -> query($insertsql);
			echo "success";
		}
	}
	else {
	    echo "ERROR: no user_email or user_pw\n";
	}
}

?>