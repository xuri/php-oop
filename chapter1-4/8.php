<?php
	interface Chargeble {
		public function getPrice();
	}


	class ShopProduct implements Chargeable {
		public function getPrice(){
			return ($this->price - $this->discount);
		}

		public function cdInfo(CdProduct $prod){

		}

		public function addProduct(ShopProduct $prod){

		}

		public function addChargeableItem( Chargeable $item){

		}


	}

	class Shipping implements Chargeable{
		public function getPrice(){
		}

	}

	class Consultancy extends TimedService implements Bookable, Chargeable {

	}
?>