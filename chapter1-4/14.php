<?php
	class Person {
		private $name;
		private $age;
		private $id;

		function __construct($name, $age){
			$this->name = $name;
			$this->age = $age;
		}

		function setID( $id ) {
			$this->id = $id;
		}

		function __destruct(){
			if( ! empty($this->id) ) {
				print "saving person\n";
			}
		}
	}

	$person = new Person("bob", 44);
	$person->setID( 343 );
	unset($person);
?>