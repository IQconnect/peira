<?php 
	if ($_GET['pdf']) {
		$mpdf = generate_flats_pdf($_GET['pdf']);
		$mpdf->Output();
	
	}

	
?>

<?php
/* print.php oliwkowe

	if ($_GET['pdf']) {
		$ids = explode("-", $_GET['pdf']);
		$flats = array();
		foreach ($ids as $id) array_push($flats, get_flat($id));
		$mpdf = generate_flats_pdf($flats);
		$mpdf->Output();
		die;
	}
*/
?>