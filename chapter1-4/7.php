<?php
	abstract class ShopProductWriter {
		protected $products = array();

		public function  addProduct( ShopProduct $shopProduct ){
			$this->products[] = $shopProduct;
		}

		abstract public function write()
		;
	}

	// $writer = new ShopProductWriter();

	// class ErroredWriter extends ShopProductWriter{}

	class xmlProductWriter extends ShopProductWriter {
		public function  write(){
			$str = '<?xml version="1.0" encoding="UTF-8"?>'.'\n';
			$str .= "<products>\n";
			foreach ($this->products as $shopProduct){
				$str .= "\t<product title=\"{$shopProduct->getTitle()}\">";
				$str .= "\t\t<summary>\n";
				$str .= "\t\t{$shopProduct->getSummaryLine()}\n";
				$str .= "\t\t</summary>\n";
				$str .= "\t</product>\n";
			}

			$str .= "</ptoducts>\n";
			print $str;
		}
	}

	class TextProductWriter extends ShopProductWriter{
		public function write(){
			$str = "PRODUCTS: \n";
			foreach ($this->products as $shopProduct){
				$str .= $shopProduct->getSummaryLine()."\n";
			}
			print $str;
		}
	}

	class AbstractClass {
		function abstractFunction(){
			die(" AbstractClass::abstractFunction() id abstract\n");
		}
	}
?>