<?php
	require('redis.php');
	$uid  = $_GET['id'];
	$data = $redis->hgetall("user:".$uid);
?>
<html>
<header>

</header>
<body>
	<form action="doedit.php" method="post">
		<input type="hidden" value="<?php echo $data['uid'] ?>" name="uid" />
		Username: <input type="text" name="username" value="<?php echo  $data['username'] ?>"><br />
		Age: <input type="text" name="age" value="<?php echo  $data['age'] ?>"/><br />
		<input type="submit" value="Update" />
		<input type="reset" value="Reset" />
	</form>
</body>
</html>