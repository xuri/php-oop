<?php
	class ShopProduct {
		public $numPages;
		public $playLength;
		public $title;
		public $producerMainName;
		public $producerFirstName;
		public $price;
		public $discount = 0;

		function setDiscount($num) {
			$this->discount = $sum;
		}

		function getPrice(){
			return ($this->price - $this->discount);
		}

		function __construct($title, $firstName, $mianName, $price, $numPages=0, $playLength=0){
			$this->title = $title;
			$this->producerFirstName = $firstName;
			$this->productMainName = $mainName;
			$this->price = $price;
			$this->numPages = $numPages;
			$this->playLength = $playLength;

		}

		function getProducer(){
			return "{$this->producerFirstName}"."{$this->producerMainName}";
		}

		function getSummaryLine(){
			$base = "$this->title({$this->producerMainName},";
			$base .= "{$this->producerFirstName} )";
			return $base;
		}
	}

	class CdProduct extends ShopProduct {

		// function getPlayLength(){
		// 	return $this->playLength;
		// }

		public $playLength;

		function __construct($title, $firstName, $mainName, $price, $playLength) {
			parent::__construct($title, $firstName, $mainName, $price);
			$this->playLength = $playLength;
		}

		function getPlayLength(){
			return $this->playLength;
		}

		function getSummaryLine(){
			$base = "{$this->title} ({$this->producerMainName}, ";
			$base .= "{$this->producerFirstName})";
			$base .= ": playing time - {$this->playLength}";
			return $base;
		}
	}

	class BookProduct extends ShopProduct {
		// function getNumberOfPages(){
		// 	return $this->numPages;
		// }

		public $numPages;

		function __construct($title, $firstName, $mainName, $price, $numPages){
			parent::__construct($title, $firstName, $mainName, $price);
			$this->numPages = $numPages;
		}

		function getNumberOfPages(){
			return $this->numPages;
		}

		function getSummaryLine(){
			// $base = "{$this->title} ({$this->producerMainName},)";
			// $base .= "{$this->producerFirstName})";
			// $base .= ": page count - {$this->numPages}";

			$base = parent::getSummaryLine();
			$base .= ": page count - {$this->numPages}";
			return $base;
		}
	}
?>