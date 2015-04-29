<?php
	header('Access-Control-Allow-Origin:*');
	header('Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type, Accept');
	error_reporting(E_ALL || ~E_NOTICE);
	$action = $_GET['action'];
	include('conn.php');
	include('user_login.php');
	include('user_register.php');
	include('user_update.php');
	include('get_userlist.php');
	include('post_delete.php');
	include('post_text.php');
	switch ($action) {
		case 'user_login':
			user_login();
			break;
		case 'user_register':
			user_register();
			break;
		case 'user_update':
			user_update();
			break;
		case 'post_text':
			post_text();
			break;
		case 'get_userlist':
			get_userlist();
			break;
		case 'post_delete':
			post_delete();
			break;
		default:
			echo 'Wrong GET input';
	}
	
?>