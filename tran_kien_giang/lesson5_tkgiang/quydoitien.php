<?php
	class Amount 
	{
		public $amount;
    		public function __construct($amount) {
        		$this->amount = $amount;
    		}
	}

	class UsdTo extends Amount 
	{
		function usdToVnd() {
			return $this->amount * 22943;
		}
		
		function usdToGbp() {
			return $this->amount * 0.72;
		}
		
		function usdToEur() {
			return $this->amount * 0.85;
		}
		
		function usdToCny() {
			return $this->amount * 6.48;
		}
		
		function usdToUsd() {
			return $this->amount;
		}
	}

	class GbpTo extends Amount 
	{
		function gbpToVnd() {
			return $this->amount * 31816;
		}
		
		function gbpToGbp() {
			return $this->amount;
		}
		
		function gbpToEur() {
			return $this->amount * 1.18;
		}
		
		function gbpToCny() {
			return $this->amount * 9;
		}
		
		function gbpToUsd() {
			return $this->amount * 1.39;
		}
	}

	class EurTo extends Amount 
	{
		function eurToVnd() {
			return $this->amount * 27069;
		}
		
		function eurToGbp() {
			return $this->amount * 0.85;
		}
		
		function eurToEur() {
			return $this->amount;
		}
		
		function eurToCny() {
			return $this->amount * 7.63;
		}
		
		function eurToUsd() {
			return $this->amount * 1.18;
		}
	}

	class CnyTo extends Amount 
	{
		function cnyToVnd() {
			return $this->amount * 3536;
		}
		
		function cnyToGbp() {
			return $this->amount * 0.11;
		}
		
		function cnyToEur() {
			return $this->amount * 0.13;
		}
		
		function cnyToCny() {
			return $this->amount;
		}
		
		function cnyToUsd() {
			return $this->amount * 0.15;
		}
	}

	class VndTo extends Amount 
	{
		function vndToVnd() {
			return $this->amount;
		}
		
		function vndToGbp() {
			return $this->amount * 0.000031;
		}
		
		function vndToEur() {
			return $this->amount * 0.000037;
		}
		
		function vndToCny() {
			return $this->amount * 0.00028;
		}
		
		function vndToUsd() {
			return $this->amount * 0.000043;
		}
	}
	$default = '';
    	$convertNumber = '';
    	if (isset($_POST['input'] && isset($_POST['from'] && isset($_POST['to'])) {
    		$amount = $_POST['input'];
        	if ($_POST['from'] == 'USD' && $_POST['to']  == 'VND'){
		    $amount = new UsdTo($amount);
		    $amount = $amount->usdToVnd();
		    $convertNumber = number_format($amount, 2, '.', ',')." VND" ;
        	} elseif ($_POST['from'] == 'USD' && $_POST['to']  == 'GBP' ){
		    $amount = new UsdTo($amount);
		    $amount = $amount->usdToGbp();
		    $convertNumber = number_format($amount, 2, '.', '.')." GBP" ;
		} elseif ($_POST['from'] == 'USD' && $_POST['to']  == 'CNY' ){
		    $amount = new UsdTo($amount);
		    $amount = $amount->usdToCny();
		    $convertNumber = number_format($amount, 2, '.', ',')." CNY" ;
		} elseif ($_POST['from'] == 'USD' && $_POST['to']  == 'EUR' ){
		    $amount = new UsdTo($amount);
		    $amount = $amount->usdToEur();
		    $convertNumber = number_format($amount, 2, '.', '.')." EUR" ;
		} elseif ($_POST['from'] == 'GBP' && $_POST['to']  == 'VND' ){
		    $amount = new GbpTo($amount);
		    $amount = $amount->gbpToVnd();
		    $convertNumber = number_format($amount, 2, '.', ',')." VND" ;
		} elseif ($_POST['from'] == 'GBP' && $_POST['to']  == 'USD' ){
		    $amount = new GbpTo($amount);
		    $amount = $amount->gbpToUsd();
		    $convertNumber = number_format($amount, 2, '.', '.')." USD" ;
		} elseif ($_POST['from'] == 'GBP' && $_POST['to']  == 'CNY' ){
		    $amount = new GbpTo($amount);
		    $amount = $amount->gbpToCny();
		    $convertNumber = number_format($amount, 2, '.', ',')." CNY" ;
		} elseif ($_POST['from'] == 'GBP' && $_POST['to']  == 'EUR' ){
		    $amount = new GbpTo($amount);
		    $amount = $amount->gbpToEur();
		    $convertNumber = number_format($amount, 2, '.', '.')." EUR" ;
		} elseif ($_POST['from'] == 'EUR' && $_POST['to']  == 'VND' ){
		    $amount = new EurTo($amount);
		    $amount = $amount->eurToVnd();
		    $convertNumber = number_format($amount, 2, '.', ',')." VND" ;
		} elseif ($_POST['from'] == 'EUR' && $_POST['to']  == 'GBP' ){
		    $amount = new EurTo($amount);
		    $amount = $amount->eurToGbp();
		    $convertNumber = number_format($amount, 2, '.', '.')." GBP" ;
		} elseif ($_POST['from'] == 'EUR' && $_POST['to']  == 'USD' ){
		    $amount = new EurTo($amount);
		    $amount = $amount->eurToUsd();
		    $convertNumber = number_format($amount, 2, '.', '.')." USD" ;
		} elseif ($_POST['from'] == 'EUR' && $_POST['to']  == 'CNY' ){
		    $amount = new EurTo($amount);
		    $amount = $amount->eurToCny();
		    $convertNumber = number_format($amount, 2, '.', ',')." CNY" ;
		} elseif ($_POST['from'] == 'CNY' && $_POST['to']  == 'VND' ){
		    $amount = new CnyTo($amount);
		    $amount = $amount->cnyToVnd();
		    $convertNumber = number_format($amount, 2, '.', ',')." VND" ;
		} elseif ($_POST['from'] == 'CNY' && $_POST['to']  == 'USD' ){
		    $amount = new CnyTo($amount);
		    $amount = $amount->cnyToUsd();
		    $convertNumber = number_format($amount, 2, '.', '.')." USD" ;
		} elseif ($_POST['from'] == 'CNY' && $_POST['to']  == 'EUR' ){
		    $amount = new CnyTo($amount);
		    $amount = $amount->cnyToEur();
		    $convertNumber = number_format($amount, 2, '.', '.')." EUR" ;
		} elseif ($_POST['from'] == 'CNY' && $_POST['to']  == 'GBP' ){
		    $amount = new CnyTo($amount);
		    $amount = $amount->cnyToGbp();
		    $convertNumber = number_format($amount, 2, '.', '.')." GBP" ;
		} elseif ($_POST['from'] == 'VND' && $_POST['to']  == 'GBP' ){
		    $amount = new VndTo($amount);
		    $amount = $amount->vndToGbp();
		    $convertNumber = number_format($amount, 2, '.', '.')." GBP" ;
		} elseif ($_POST['from'] == 'VND' && $_POST['to']  == 'EUR' ){
		    $amount = new VndTo($amount);
		    $amount = $amount->vndToEur();
		    $convertNumber = number_format($amount, 2, '.', '.')." EUR" ;
		} elseif ($_POST['from'] == 'VND' && $_POST['to']  == 'USD' ){
		    $amount = new VndTo($amount);
		    $amount = $amount->vndToUsd();
		    $convertNumber = number_format($amount, 2, '.', '.')." USD" ;
		} elseif ($_POST['from'] == 'VND' && $_POST['to']  == 'CNY' ){
		    $amount = new VndTo($amount);
		    $amount = $amount->vndToCny();
		    $convertNumber = number_format($amount, 2, '.', ',')." CNY" ;
		} elseif ($_POST['from'] == 'VND' && $_POST['to']  == 'VND' ){
		    $amount = new VndTo($amount);
		    $amount = $amount->vndToVnd();
		    $convertNumber = number_format($amount, 2, '.', ',')." VND" ;
		} elseif ($_POST['from'] == 'EUR' && $_POST['to']  == 'EUR' ){
		    $amount = new EurTo($amount);
		    $amount = $amount->eurToEur();
		    $convertNumber = number_format($amount, 2, '.', '.')." EUR" ;
		} elseif ($_POST['from'] == 'USD' && $_POST['to']  == 'USD' ){
		    $amount = new UsdTo($amount);
		    $amount = $amount->usdToUsd();
		    $convertNumber = number_format($amount, 2, '.', '.')." USD" ;
		} elseif ($_POST['from'] == 'CNY' && $_POST['to']  == 'CNY' ){
		    $amount = new CnyTo($amount);
		    $amount = $amount->cnyToCny();
		    $convertNumber = number_format($amount, 2, '.', ',')." CNY" ;
		} elseif ($_POST['from'] == 'GBP' && $_POST['to']  == 'GBP' ){
		    $amount = new GbpTo($amount);
		    $amount = $amount->gbpToGbp();
		    $convertNumber = number_format($amount, 2, '.', '.')." GBP" ;
		}
    	}   
?>
<style type="text/css">
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
		height: 100px;
	}

	td, th {
		border: 1px solid green;
		text-align: left;
		padding: 8px;
		text-align: center;
	}

	tr:nth-child(even) {
		background-color: #dddddd;
	}
</style>
<table>
	<tr>
		<th>Số Lượng</th>
		<th>Từ</th>
		<th>Sang</th>
		<th>Thu Được</th>
	</tr>
	<tr>
		<td><?php echo($_POST['input'].' '. $_POST['from']) ?></td>
		<td><?php echo($_POST['from']) ?></td>
		<td><?php echo($_POST['to']) ?></td>
		<td><?php echo($convertNumber) ?></td>
	</tr>
</table>
<a href="index1.php">Thực Hiện Phép Quy Đổi Khác</a>
