<?php
	$redis = new Redis();
	$redis->connect("172.16.241.142", 6379);
	$redis->auth('password');

?>