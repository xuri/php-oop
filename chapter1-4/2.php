<?php
	class ShopProduct{
		public $numPages;
		public $playLength;
		public $title;
		public $producerMainName;
		public $producerFirstName;
		public $price;

		function __construct( $title, $firstName, $mainName, $price, $numPages=0, $playLength=0) {
			$this->title = $title;
			$this->producerFirstName = $firstName;
			$this->productMainName = $mainName;
			$this->price = $price;
			$this->numPages = $numPages;
			$this->playLength = $playLength;
		}

		function getNumberOfPages() {
			return $this->numPages;
		}

		function getPlayLength(){
			return $this->playLength;
		}

		function getProducer() {
			return "{$this->producerFirstName}"."{$this->producerMainName}";
		}
	}
?>