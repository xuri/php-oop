<?php

	class Product {
		public $name;
		public $price;

		function __construct($name, $price) {
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
			foreach ($this->callbacks as $callback ) {
				call_user_func( $callback, $product );
			}
		}
	}

	class Mailer {
		function doMail( $product ){
			print " 	mailing ({$product->name})\n";
		}
	}

	$processor = new ProcessSale();
	$processor->registerCallback(array( new Mailer(),"doMail"));

	$processor->sale( new Product("shoes", 6));
	print "\n";
	$processor->sale( new Product("coffee", 6));

	// class Totalizer {
	// 	static function warnAmount() {
	// 		return function ($product){
	// 			if ($product->price > 5){
	// 				print " 	reached high price: {$producr->price}\n";
	// 			}
	// 		};
	// 	}
	// }

	// $processor = new ProcessSale();
	// $processor->registerCallback( Totalizer::warnAmount() );

	class Totalizer {
		static function warnAmount( $amt ){
			$count = 0;
			return function( $product ) use ($amt, &$count ){
				$count += $product->price;
				print "  	count: $count\n";
				if ( $count > $amt ) {
					print " high price reached: ($count)\n";
				}
			};
		}
	}

	$processor = new ProcessSale();
	$processor->registerCallback( Totalizer::warnAmount( 8 ) );

	$processor->sale( new Product( "shoes", 6) );
	print "\n";
	$processor->sale( new Product( "coffee", 6) );
?>