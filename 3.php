<?php
	class Cdproduct {
		public $playLength;
		public $title;
		public $producerMainName;
		public $producerFirstName;
		public $price;

		function __construct($title, $firstName, $mainName, $price, $playLength){
			$this->title = $title;
			$this->producerFirstName = $firstName;
			$this->producerMainName = $mainName;
			$this->price = $price;
			$this->playLength = $playLength;

		}

		function getPlayLength() {
			return $this->playLength;
		}

		function getSummaryLine() {
			$base = "{$this->title} ({$this->producerMainName}, ";
			$base .= "{$this->producerFirstName} )";
			$base .= ":playing time - {$this->playLength}";
			return $base;
		}

		function getProducer(){
			return "{$this->producerFirstName}"."{$this->producerMainName}";
		}
	}

	class BookProduct {
		public $numPages;
		public $title;
		public $producerMainName;
		public $producerFirstName;
		public $price;

		function __construct($title, $firstName, $mainName, $price, $numPages){
			$this->title = $title;
			$this->producerFirstName = $firstName;
			$this->producerMainName = $mainName;
			$this->price = $price;
			$this->numPages = $numPages;
		}

		function getNumberOfPages(){
			return $this->numPages;
		}

		function getSummaryLine(){
			$base = "{$this->title} ({$this->producerMainName}, ";
			$base .= "{$this->producerFirstName} )";
			$base .= ":page count - {$this->numPages}";
			return $base;
		}

		function getProducer(){
			return "{$this->producerFirstName}"."{$this->producerMainName}";
		}
	}

	class shopProductWriter {
		// public function write($shopProduct){
		// 	if(!($shopProduct instanceof CdProduct) && !( $shopProduct instanceof BookProduct )) {
		// 		die("wrong type supplied");
		// 	}
		// 	$str = "{$shopProduct->title}:".$shopProduct->getProducer()."({$shopProduct->price})\n";
		// 	print $str;
		// }

		// public $products = array();

		private $products = array();

		public function addProduct( ShopProduct $shopProduct ){
			$this->products[] = $shopProduct;
		}

		public function write(){
			$str = "";
			foreach ($this->products as $shopProduct){
				$str .= "{$shopProduct->title}: ";
				$str .= $shopProduct->getProducer;
				$str .= " ({$shopProduct->getProce()})\n";
			}
			print $str;
		}
	}
?>