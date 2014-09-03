<?php
	class Product {
		public $name;
		public $price;

		function __constract($name, $price) {
			$this->name = $name;
			$this->price = $price;
		}
	}

	class ProcessSale {
		private $callbacks;

		function registerCallback( $callback ) {
			if ( ! is_callable( $callback ) ){
				throw new Exception( "callback  not callback" );
			}
			$this->callbacks[] = $callback;
		}

		function sale ( $product ) {
			print "{$product->name}: producessing \n";
			foreach ($this->callback as $callback ) {
				call_user_func( $callback, $product );
			}
		}
	}
?>