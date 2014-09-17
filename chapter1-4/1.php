<?php
 class ShopProduct{
	 	// public function myMethod($arguement, $another) {

	 	// }
		public $title            = "default product";
		public $productMainName  = "main name";
		public $productFirstName = "first name";
		public $price            = "0";

		// function getProducer() {
		// 	return "($this->productFirstName}"."{$this->productMainName}\n";
		// }

		function __construct( $title, $firstName, $mainName, $price) {

			$this->title = $title;
			$this->productFirstName = $firstName;
			$this->productMainName = $mainName;
			$this->price = $price;
		}

		function getProducer(){
			return "{$this->productFirstName}"."{$this->productMainName}";
		}
 }

 // 		$product1 = new ShopProduct("My Antonia", "Willa", "Cather", 5.99);
 // 		print "author: {$product1->getProducer()}\n";

 		// $product1 = new ShopProduct();
 		// $product1->title = "My Antonia";
 		// $product1->productMainName = "Catcher";
 		// $product1->productFirstName = "Willa";
 		// $product1->price = 5.99;

 		// print "author: {$product1->getProducer()} \n";
 // $product1 = new ShopProduct();
 // $product2 = new ShopProduct();

 // var_dump($product1);
 // var_dump($product2);

 // $product1 = new ShopProduct();
 // 	print $product1->title;

 	// $product1 = new ShopProduct();
 	// $product2 = new ShopProduct();
 	// $product1->title = "My Antonia";
 	// $product2->title = "Catch 22";
 	// print $product1->arbitraryAddition = "threehouse";

 // $product1 = new ShopProduct();
 // $product1->title = "My Antonia";
 // $product1->productMainName = "Cather";
 // $product1->productFirstName = "Willa";
 // $product1->price = 5.99;

 // print "author: {$product1->productFirstName} "."{$product1->productMainName} \n";

// 	class AddressManager {
// 		private $address = array( "202.97.224.68", "202.97.224.69" );

// 		function outputAddresses( $resolve ) {
// 			if(! is_bool( $resolve) ) {
// 				die("outputAddress() requires a Boolean arguement\n");
// 			}
// 			$resolve = (preg_match("/false|no|off/i", $resolve))?false:true;
// 			foreach ($this->address as $address ) {
// 				print $address;
// 				if ($resolve) {
// 					print "{".gethostbyaddr( $address )."}";
// 				}
// 				print "\n";
// 			}
// 		}
// 	}

// 	$settings = simplexml_load_file("settings.xml");
// 	$manager = new AddressManager();
// 	$manager->outputAddresses( (string)$settings->resolvedomains);


	class ShopProductWriter {
		public function writer ( ShopProduct $shopProduct) {
			$str = "{$shopProduct->title}:".$shopProduct->getProducer()."{{$shopProduct->price}}\n";
			print $str;
		}
	}

	$product1 = new ShopProduct("My Antonia", "Willa", "Catcher", 5.99);
	$writer = new ShopProductWriter();
	$writer->writer($product1);


	// class Wrong {}
	// $writer = new ShopProductWriter();
	// $writer->writer( new Wrong());

	function setArray( array $shorearray ){
		$this->array = $storearray;

	}

	function setWriter(ObjectWriter $objectwriter = null) {
		$this->writer = $objectwriter;
	}
?>
