<?php 
	$so_tien_can_quy_doi=$_GET['so_tien_can_quy_doi'];
	$option=$_GET['option'];
	if ($option == 'VND -> USD') {
	    $so_tien_da_quy_doi=$so_tien_can_quy_doi * 0.000044;
	    $format_number_input = number_format($so_tien_can_quy_doi, 0, '', ',') .' VND';
	    $format_number_output = number_format($so_tien_da_quy_doi, 3, '.', '') .' USD';
	}
	else if ($option == 'USD -> VND') {
		$so_tien_da_quy_doi=$so_tien_can_quy_doi * 22.943;
		$format_number_input = number_format($so_tien_can_quy_doi, 3, '.', '') .' USD';
	    $format_number_output = number_format($so_tien_da_quy_doi, 3, ',', '') .' VND';
	}
	else if ($option == 'EUR -> VND') {
		$so_tien_da_quy_doi=$so_tien_can_quy_doi * 27.159;
		$format_number_input = number_format($so_tien_can_quy_doi, 3, '.', '') .' EUR';
		$format_number_output = number_format($so_tien_da_quy_doi, 3, ',', '') .' VND';
	}
	else if ($option == 'VND -> EUR') {
		$so_tien_da_quy_doi=$so_tien_can_quy_doi * 0.000037;
		$format_number_input = number_format($so_tien_can_quy_doi, 0, ',', ',') .' VND';
		$format_number_output = number_format($so_tien_da_quy_doi, 3, '.', '') .' EUR';
	}
	else if ($option == 'GBP -> VND') {
		$so_tien_da_quy_doi=$so_tien_can_quy_doi * 31.923;
		$format_number_input = number_format($so_tien_can_quy_doi, 3, '.', '') .' GBP';
		$format_number_output = number_format($so_tien_da_quy_doi, 3, ',', '') .' VND';
	}
	else if ($option == 'VND -> GBP') {
		$so_tien_da_quy_doi=$so_tien_can_quy_doi * 0.000031 ;
		$format_number_input = number_format($so_tien_can_quy_doi, 0, ',', ',') .' VND';
		$format_number_output = number_format($so_tien_da_quy_doi, 3, '.', '') .' GBP';
	}
	else {
		echo 'Cảnh báo: Số tiền bạn nhập vào không chính xác !!!';
	  	exit();
	}

?>
 	<input  type="text" style=" cursor: progress;" value="<?php echo $format_number_input ?>" name="so_tien_can_quy_doi" 
 		size="20">
  	<input type="text" style=" cursor: progress;" value="<?php echo $option ?>" name="option" size="20">
  	<input type="text" style=" cursor: progress;" value="<?php echo $format_number_output ?>" name="so_tien_da_quy_doi" 
   		size="20"><br/><br/>
  	<a href="index.php">Thực Hiện Phép Quy Đổi Khác</a>
  	