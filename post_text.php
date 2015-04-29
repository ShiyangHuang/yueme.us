<?php
function post_text() {
	include('conn.php');
	$rawstr = file_get_contents("php://input");
	//echo $rawstr;
	if ($rawstr) {
		$input_json = json_decode("$rawstr",true);

		$input_user_email = $input_json["email"];
		$input_user_name = $input_json["name"];
		$input_user_school = $input_json["school"];
		$input_user_major = $input_json["major"];
		$input_user_course = addslashes($input_json["course"]);
		$input_user_context = addslashes($input_json["context"]);

		$sql = "INSERT INTO `db571503515`.`posts` (`index`, `email`, `school`, `major`, `course`, `context`, `timestamp`, `onshow`) VALUES (NULL, '".$input_user_email."','".$input_user_school."', '".$input_user_major."', '".$input_user_course."', '".$input_user_context."', CURRENT_TIMESTAMP, '1');";
		//echo $sql;
		$con -> query($sql);
		echo "success";
	
	}
	else {
	    echo "ERROR: no user_email or user_pw\n";
	}
}
	//{"email":"250295269@qq.com","password":"1234","name":"asdf","school":"asdf","major":"asdf","course":"asdfasdf","context":"asdfasdfasdf"}
?>