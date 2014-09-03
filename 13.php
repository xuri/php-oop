<?php
	class Person {
		function __get($property) {
			$method = "get{$property}";
			if(method_exists($this, $method)){
				return $this->$method();
			}
		}

		// function __isset( $property ) {
		// 	$method = "get{$property}";
		// 	return (method_exists($this, $method));
		// }

		private $_name;
		private $_age;
		private $writer;

		function __construct(PersonWriter $writer){
			$this->writer = $writer;
		}

		function __call($methodname, $args){
			if(method_exists($this->writer, $methodname)) {
				return $this->writer->methodname($this);
			}
		}

		function __set($property, $value) {
			$method = "set{$property}";
			if(method_exists($this, $method)){
				return $this->$method($value);
			}
		}

		function setName(){
			$this->_name = $name;
			if (!is_null($name)){
				$this->_name = strtoupper($this->_name);
			}
		}

		function setAge($age){
			$this->_age = strtoupper($age);
		}

		function getName() {
			return "Bob";
		}

		function getAge() {
			return 44;
		}

		function __unset($property) {
			$method = "set{$property}";
			if(method_exists($this, $method)){
				$this->$method( null );
			}
		}
	}

	class PersonWriter {

		function wruterName(Person $p){
			print $p->getName()."\n";
		}

		function writeAge(Person $p){
			print $p->getAge()."\n";
		}
	}

	// $p = new Person();
	// print $p->name;

	if (isset($p->name)){
		print $p->name;
	}

	$person = new Person(new PersonWriter());
	$person->writerName();

?>