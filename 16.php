<?php
	// class StringThing{}
	// $st = new StringThing();
	// print $st;

	class Person {
		function getName(){ return "Bob"; }
		function getAge() {return 44; }
		function __toString(){
			$desc = $this->getName();
			$desc .= " (age ".$this->getAge().")";
			return $desc;
		}
	}

	$person = new Person();
	print $person;
?>