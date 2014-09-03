<?php

class ShopProduct {
	private $id = 0;

	const AVAILABLE = 0;
	const OUT_OF_STOCK = 1;

	public function setID($id){
		$this->id = $id;
	}

	public static function getInstance($id, PDO $pdo){
		$stmt = $pdo->prepare("select * from products where id=?");

		$result = $stmt->fetch();

		if (empty($row)){return null;}

		if( $row['type'] == "book"){
			$product = new BookProduct(
					$row['title'],
					$row['firstname'],
					$row['mainname'],
					$row['price'],
					$row['numpages']
				);
		} else if ($row['type'] == "cd" ){
			$product = new CdProduct(
					$row['title'],
					$row['firstname'],
					$row['mainname'],
					$row['price'],
					$row['playlength']
				);
		} else {
			$product = new ShopProduct(
					$row['title'],
					$row['firstname'],
					$row['mianname'],
					$row['price']
				);
		}

		$product->setID($row['id']);
		$product->setDiscount($row['discount']);
		return $product;
	}
}

print ShopProduct::AVAILABLE;
?>