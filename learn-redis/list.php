<a href="add.php">Reg</a>
<a href="login.php">Login</a>
<?php
	require("redis.php");
	if(!empty($_COOKIE['auth'])){
		$id = $redis->get("auth:".$_COOKIE['auth']);
		$name = $redis->hget("user:".$id, "username");
?>
Welcome <?php echo $name; ?> <a href="logout.php">Logout</a>
<? } else { ?>

<?php
	}
	echo $count = $redis->lsize("uid");
	$page_size  = 3;
	$page_num   = (!empty($_GET['page']))?$_GET['page']:1;
	$page_count = ceil($count/$page_size);
	$ids = $redis->lrange("uid",
						 ($page_num-1) * $page_size,
						 ($page_num - 1) * $page_size + $page_size - 1);

	// for($i = 1; $i <= ($redis->get("userid")); $i++){
	// 	$data[] = $redis->hgetall("user:".$i);
	// }
	// var_dump($ids);
	foreach($ids as $v){
		$data[] = $redis->hgetall('user:'.$v);
	}
	//$data = array_filter($data);

?>
<table border=1>
	<tr>
		<th>uid</th>
		<th>username</th>
		<th>age</th>
		<th>options</th>
	</tr>
<?php
	foreach($data as $v){
?>
	<tr>
		<td><?php echo $v['uid'] ?></td>
		<td><?php echo $v['username'] ?></td>
		<td><?php echo $v['age'] ?></td>
		<td><a href="del.php?id=<?php echo $v['uid'] ?>">Delete</a>
			<a href="mod.php?id=<?php echo $v['uid'] ?>">Edit</a>
			<?php if(!empty($_COOKIE['auth']) && $id != $v['uid'] ){ ?>
			<a href="follow.php?id=<?php echo $v['uid'] ?>&uid=<?php echo $id ?>">Follow</a>
			<?php } ?>
	</tr>
<?php } ?>
<tr>
	<td colspan="4">
		<a href="?page=<?php echo (($page_num - 1) <= 1) ? 1:($page_num - 1) ?>">Before</a>
		<a href="?page=<?php echo (($page_num + 1) >= $page_count) ? $page_count: ($page_num +1 ) ?>">Next</a>
		<a href="?page=1">First</a>
		<a href="?page=<?php echo $page_count ?>">Last</a>
		Current Page: <?php echo $page_num; ?>
		Total Page: <?php echo $page_count; ?>
		Total User: <?php echo $count; ?>
	</td>
</tr>
</table>

<table border=1>
	<caption>My following</caption>
	<?php
		$data = $redis->smembers("user:".$id.":following");
		foreach($data as $v){
			$row = $redis->hgetall("user:".$v);
		 ?>
	<tr>
		<td><?php echo $row['uid'] ?></td>
		<td><?php echo $row['username'] ?></td>
		<td><?php echo $row['age'] ?></td>
	</tr>
	<?php } ?>
</table>

<table border=1>
	<caption>My Fans</caption>
	<?php
		$data = $redis->smembers("user:".$id.":followers");
		foreach($data as $v){
			$row = $redis->hgetall("user:".$v);
	?>
	<tr>
		<td><?php echo $row['uid'] ?></td>
		<td><?php echo $row['username'] ?></td>
		<td><?php echo $row['age'] ?></td>
	</tr>
	<?php } ?>
</table>