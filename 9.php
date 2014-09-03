<?php
	// abstract class DomainObject {

	// }

	// class User extends DomainObject {
	// 	public static function create(){
	// 		return new User();
	// 	}
	// }

	// class Document extends DomainObject {
	// 	public static function create(){
	// 		return new Document();
	// 	}
	// }

	abstract class DomainObject{
		public static function create(){
			return new self();
		}
	}

	class User extends DomainObject{

	}

	class Document extends DomainObject{

	}

	Document::create();

?>