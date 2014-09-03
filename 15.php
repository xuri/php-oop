<?php
	class CopyMe{}
	$first = new CopyMe();
// 	$second = $first;

	$second = clone $first;

	// class Person{
	// 	private $name;
	// 	private $age;
	// 	private $id;

	// 	function __construct( $name, $age ) {
	// 		$this->name = $name;
	// 		$this->age = $age;
	// 	}

	// 	function setID($id){
	// 		$this->id = $id;
	// 	}

	// 	function __clone(){
	// 		$this->id = 0;
	// 	}
	// }

	// $person = new Person("bob", 44);
	// $person->setId(343);
	// $person2 = clone $person;

	class Account {
		public $blance;
		function __construct($blance) {
			$this->balance = $blance;
		}
	}

	class Person {
		private $name;
		private $age;
		private $id;
		public $account;

		function __construct($name, $age, Account $account) {
			$this->name = $name;
			$this->age = $age;
			$this->account = $account;

		}

		function setId ( $id ) {
			$this->id = $id;
		}

		function __clone() {
			$this->id = 0;
			$this->account = clone $this->account;
		}
	}

	$person = new Person("bob", 44, new Account( 200 ));
	$person->setId(343);
	$person2 = clone $person;

	$person->account->blance += 10;
	print $person2->account->blance;
?>