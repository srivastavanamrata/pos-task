<!DOCTYPE html>

<html>
 <head>
	<title>Point of Sale</title>
 </head>
<body>

<?php
error_reporting(E_ALL);
include_once("product_list.php");
require_once("calculate_price.php");

if(isset($_POST['product_txt'])) {
	$terminal = new CalculatePrice();
	$productPriceArr = $terminal->setPricing();
	$scannedProducts = $terminal->scanProduct($_POST['product_txt']);
	$totalPrice = $terminal->countTotalPrice($productPriceArr, $scannedProducts);
}
?>

<form method="post" action="">
  Enter Product code string:
  <input type="text" name="product_txt" />
OR
  <select name="product_txt">
	<option value="">--Select Item--</option>
	<option value="ABCDABAA">ABCDABAA</option>
	<option value="CCCCCCC">CCCCCCC</option>
	<option value="ABCD">ABCD</option>
  </select>
  <button type="submit" name="submit">Submit</button>
<br/>

<b>Total Price: <?php echo ($totalPrice) ?? "$0.00" ;  ?></b>

</form>
</body>
</html>
