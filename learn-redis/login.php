<?php
	require("redis.php");
	$username = $_POST['username'];
	$pass     = $_POST['password'];
	$id       = $redis->get("username:".$username);
	if(!empty($id)){
		$password = $redis->hget("user:".$id, "password");
		if(md5($pass) == $password){
			$auth = md5(time().$username.rand());
			$redis->set("auth:".$auth, $id);
			setcookie("auth", $auth, time()+86400);
			header("location:list.php");
		}
	}
?>
<form action="" method="post">
	Username: <input type="text" name="username" /><br />
	Password: <input type="password" name="password" /><br />
	<input type="submit" value="Login" />
</form>