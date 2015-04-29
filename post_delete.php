<?php
function post_delete() {
	error_reporting(E_ALL || ~E_NOTICE);
	include('conn.php');
	$rawstr = file_get_contents("php://input");
	//echo $rawstr;
	if ($rawstr) {

		$input_user_index = $rawstr;

		$sql = "UPDATE `posts` SET `onshow`= 2 WHERE `index` = ".$input_user_index."";
		echo $sql;
		$result = $con -> query($sql);
	}
	else {
	    echo "ERROR: no user_email or user_pw\n";
	}
}

	//{"email":"250295269@qq.com","password":"1234","name":"asdf","school":"asdf","major":"asdf","course":"asdfasdf","context":"asdfasdfasdf"}
?>