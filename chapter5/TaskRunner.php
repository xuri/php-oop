<?php
	$classname = "Task";

	// require_once( "{$classname}.php" );
	// $classname = "$classname";
	// $myObj = new $classname();
	// $myObj->doSpeak();

	$path = "tasks/{$classname}.php";
	if(!class_exists($qclassname)){
		throw new Exception( "No such class as $qclassname");
	}

	require_once($path);
	$qclassname = "tasks\\$qclassname";
	if(!class_exists($qclassname)){
		throw new Exception("No such class as $qclassname");
	}

	$myObj = new $qclassname();
	$myObj->doSpeak();

?>