<?php
	require('redis.php');
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$age      = $_POST['age'];
	echo $uid = $redis->incr("userid");
	$redis->hmset("user:".$uid, array(
		"uid"      => $uid,
		"username" => $username,
		"password" => $password,
		"age"      => $age
	));
	$redis->rpush('uid', $uid);
	$redis->set("username:".$username, $uid);
	header('location:list.php');
?>