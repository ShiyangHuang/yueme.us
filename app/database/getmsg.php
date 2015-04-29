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
	
	$sql = "SELECT * FROM `websitecontact`;";
	$result = $con -> query($sql);
	while($row = $result -> fetch_row())
	{
        echo '<p>'.$row[0]." 留言主题：".$row[3]." 内容：".$row[4].'</p>';
        echo '<p>Email:'.$row[1]."</p>";
	}
	echo '<table>';
	$sql = "SELECT * FROM `webvisit`;";
	$result = $con -> query($sql);
	while($row = $result -> fetch_row())
	{
        echo '<tr><td>'.$row[0].'</td><td>Time:'.$row[1]."		</td><td> IP:".$row[2]."    </td><td>OS：".$row[3].' </td><td>location: '.$row[4].'</td></tr>';
	}
	echo '</table>';
?>