<?php
function get_userlist() {
	include('conn.php');
	$rawstr = file_get_contents("php://input");
	//echo $rawstr;
	if ($rawstr) {
		$input_json = json_decode("$rawstr",true);

		$input_user_email = $input_json["email"];
		$input_user_school = $input_json["school"];
		$input_user_major = $input_json["major"];


		$sql = "SELECT * FROM `posts`,`user` WHERE `posts`.`onshow` = 1 and `posts`.`email` = `user`.`user_email` and `posts`.`school` = '".$input_user_school."' AND `posts`.`major` = '".$input_user_major."';";
		//echo $sql;
		$result = $con -> query($sql);
		
		echo "[";
		$first = true;
		while ($row = $result -> fetch_row())
		{
			//echo json_encode($row);
			$currentTime =strtotime ( date('Y-m-d H:i:s',time()));
			$lineTime = strtotime( $row[6] );
			if($currentTime-$lineTime<3600*24){
				if(!$first) echo ",";
				$first = false;
				echo '{"index":"'.$row[0].'",
				   "email":"'.$row[1].'",
				   "school":"'.$row[2].'",
				   "major":"'.$row[3].'",
				   "course":"'.htmlspecialchars($row[4]).'",
				   "context":"'.htmlspecialchars($row[5]).'",
				   "timestamp":"'.$row[6].'",
				   "name":"'.$row[11].'"
				  }';
			}
			else {
				$dsql = "UPDATE `posts` SET `onshow`= 2 WHERE `index` = ".$row[0]."";
				$con -> query($dsql);
			}
				  
		}
		echo "]";
		
	}
	else {
	    echo "ERROR: no user_email or user_pw\n";
	}
}

	//{"email":"250295269@qq.com","password":"1234","name":"asdf","school":"asdf","major":"asdf","course":"asdfasdf","context":"asdfasdfasdf"}
?>