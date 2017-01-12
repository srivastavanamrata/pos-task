<?php
/**
* This class is intended to calculate the product price.
*/

class CalculatePrice {

	/**
	* Method to set price for products.
	* return $productPriceArr array
	*/

	public function setPricing() {
		return $productPriceArr = array(
			'A' => array('1'=>2.00, '4'=>7.00), 
			'B' => array('1'=>12.00), 
			'C' => array('1'=>1.25, '6'=>6.00), 
			'D' => array('1'=>0.15)
		);
	} 

	/**
	* Method to scan the products.
	* @input $inputProducts string Input product string.
	* return $productCountArr array
	*/

	public function scanProduct($inputProducts) {
		$inputArray = str_split($inputProducts, 1);
	    	//convert the input array into array, with each item as key, and the number of item as value
	    	return $productCountArr = array_count_values($inputArray);
	}
					
	/**
	* Method to count total price based on the input product string.
	* @input $priceArr array Array of product with its price.
	* @input $scannedProducts array Array of scanned products string.
	* retrun Count of the product string.
	*/
																																																																																																																																																																																																																																			
	public function countTotalPrice($priceArr, $scannedProducts) {		
	    $total = 0;
	    foreach($scannedProducts as $code=>$amount) {
		if(isset($priceArr[$code]) && count($priceArr[$code]) > 1) {
		    $groupUnit = max(array_keys($priceArr[$code]));
		    $subtotal = intval($amount / $groupUnit) * $priceArr[$code][$groupUnit] + fmod($amount, $groupUnit) * $priceArr[$code]['1'];
		    $total += $subtotal; 
		}
		elseif (isset($priceArr[$code])) {
		    $subtotal = $amount * $priceArr[$code]['1'];
		    $total += $subtotal;
		}
	    }
	return "$".number_format($total, 2); 
	}
}


