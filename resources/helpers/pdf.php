
<?php
	function generate_flats_pdf($flats) {
		require('mpdf/mpdf.php');
		
		$html = '';
		
		$html .= "<style>*{font-family: FreeSans;}table,h2{font-family: FreeSans;}ul, ol, li{list-style: none;}#wynikiWyszukiwania{margin:0 auto 100px;width:100%;max-width:1170px;border:1px solid #e6e6e6}#wynikiWyszukiwania tr{border-bottom:1px solid #e6e6e6}#wynikiWyszukiwania thead tr th{background:#f0f0f0;color:#595959;padding:19px;font-size:10px;text-transform:uppercase;font-family:'FreeSans';text-align:left}#wynikiWyszukiwania tbody tr td{padding:19px;font-size:12px;vertical-align:top}#wynikiWyszukiwania tbody tr td>span{display:block}#wynikiWyszukiwania tbody tr td ul{list-style:none;padding:0;margin:0;width:150px}</style>";
		
		$html .= '<table style="width: 100%; vertical-align: middle; text-align: center; margin-bottom: 50px;"><tbody><tr><td style="text-align: left;"><img src="http://peira.pl/images/logo.png" style="width: 150px;"></td><td style="font-family: FreeSans; font-size: 12px; text-align: right;">Biuro sprzedaży<br>ul. Srebrzyńska 40<br>91-402 Łódź<br><br><span style="text-decoration: none !important; font-weight: bold; color: #000;">+48 798 416 416</span><br><a href="mailto:kontakt@peira.pl" style="text-decoration: none !important; font-weight: bold; color: #000;">kontakt@peira.pl</a><br><a href="http://www.peira.pl/" style="text-decoration: none !important; font-weight: bold; color: #000;">www.peira.pl</a><br></td></tr></tbody></table>';
		
		$html .= '<table style="font-family: FreeSans;" cellspacing="0" border="0" id="wynikiWyszukiwania"><thead><tr><th>Numer mieszkania</th><th>Informacje</th><th>Cena</th></tr></thead><tbody>';
		
		foreach ($flats as $flat) {
			
			if ($flat['floor'] == 0) $flat['floor'] = 'parter';
			
			$html .= '<tr style="font-family: FreeSans; border-bottom: 1px solid #e6e6e6;">';
		
			$html .= '<td style="border-bottom: 1px solid #e6e6e6;"><div style="font-family: FreeSans; text-transform: capitalize; display: block;"><b class="uppercase"></b></div><div style="display: block; font-family: FreeSans;"><b><a style="font-weight: bold; color: #000;" href="/znajdz-mieszkanie/mieszkanie/?t='.$flat['id'].'">'.$flat['id'].'</a></b></div></td>';
			
			$html .= '<td style="border-bottom: 1px solid #e6e6e6;">';			
			$html .= '<div style="font-family: FreeSans;">Piętro: <span><b>'.$flat['floor'].'</b></span></div>';
			$html .= '<div style="font-family: FreeSans;">Pokoje: <span><b>'.$flat['rooms'].'</b></span></div>';
			$html .= '<div style="font-family: FreeSans;">Powierzchnia: <span><b>'.$flat['area'].' m<sup>2</sup></b></span> </div>';
			$html .= '</td>';
			
			$html .= '<td style="border-bottom: 1px solid #e6e6e6;">';
			
			if($flat['state']['value'] === 'free') {
				if ($flat['price'] != 0)
					$html .= '<b>'.$flat['price'].' zł</b>';
				else 
					$html .= '<b><a style="color: #000;" target="_blank" href="https://oliwkowe.com/kontakt/biuro-sprzedazy/">'.$flat['price_label'].'</a></b>';
			}
			
			if ($flat['state']['value'] === 'sale') {
				$html .= '<strike><b>'.$flat['price2'].' zł</b></strike>';
				$html .= '<div><b>'.$flat['price'].' zł</b></div>';
			}
			
			$html .= '</td>';
			
			$html .= '</tr>';
				
		}
		
		$html .= '</tbody></table>';
		
		$html .= '<h5 style="text-align:center">Na kolejnych stronach znajdują się rzuty wybranych lokali.</h5>';
		
		$mpdf = new mPDF();
		$mpdf->annotOpacity = 0;
		$mpdf->SetImportUse();
		$mpdf->WriteHTML($html);
		
		foreach ($flats as $flat) {
			$mpdf->AddPage('L');
			$mpdf->WriteHTML('<div style="text-align:center"><img style="width:100%" src="https://peira.dev.ilike-art.com/wp-content/themes/oliwkowe/plans/1600/rzuty_mieszkan_oliwkowe'.$flat['id'].'.jpg"></div>');
		}
		
		return $mpdf;
	}
?>
<?php /*
	function generate_flats_pdf($flats) {
		require('mpdf/mpdf.php');
		
		$html = '';
		
		$html .= "<style>*{font-family: FreeSans;}table,h2{font-family: FreeSans;}ul, ol, li{list-style: none;}#wynikiWyszukiwania{margin:0 auto 100px;width:100%;max-width:1170px;border:1px solid #e6e6e6}#wynikiWyszukiwania tr{border-bottom:1px solid #e6e6e6}#wynikiWyszukiwania thead tr th{background:#f0f0f0;color:#595959;padding:19px;font-size:10px;text-transform:uppercase;font-family:'FreeSans';text-align:left}#wynikiWyszukiwania tbody tr td{padding:19px;font-size:12px;vertical-align:top}#wynikiWyszukiwania tbody tr td>span{display:block}#wynikiWyszukiwania tbody tr td ul{list-style:none;padding:0;margin:0;width:150px}</style>";
		
		$html .= '<table style="width: 100%; vertical-align: middle; text-align: center; margin-bottom: 50px;"><tbody><tr><td style="text-align: left;"><img src="http://peira.pl/images/logo.png" style="width: 150px;"></td><td style="font-family: FreeSans; font-size: 12px; text-align: right;">Biuro sprzedaży<br>ul. Matejki 9<br>91-402 Łódź<br><br><a href="tel:+48 798 416 416" style="text-decoration: none !important; font-weight: bold; color: #000;">+48 798 416 416</a><br><a href="mailto:kontakt@peira.pl" style="text-decoration: none !important; font-weight: bold; color: #000;">kontakt@peira.pl</a><br><a href="www.peira.pl" style="text-decoration: none !important; font-weight: bold; color: #000;">www.peira.pl</a><br></td></tr></tbody></table>';
		
		$html .= '<table style="font-family: FreeSans;" cellspacing="0" border="0" id="wynikiWyszukiwania"><thead><tr><th>Numer mieszkania</th><th>Informacje</th><th>Cena</th></tr></thead><tbody>';
		
		foreach ($flats as $flat) {
			
			if ($flat['floor'] == 0) $flat['floor'] = 'parter';
			
			$html .= '<tr style="font-family: FreeSans; border-bottom: 1px solid #e6e6e6;">';
		
			$html .= '<td style="border-bottom: 1px solid #e6e6e6;"><div style="font-family: FreeSans; text-transform: capitalize; display: block;"><b class="uppercase"></b></div><div style="display: block; font-family: FreeSans;"><b><a style="font-weight: bold; color: #000;" href="/znajdz-mieszkanie/mieszkanie/?t='.$flat['id'].'">'.$flat['id'].'</a></b></div></td>';
			
			$html .= '<td style="border-bottom: 1px solid #e6e6e6;">';			
			$html .= '<div style="font-family: FreeSans;">Piętro: <span><b>'.$flat['floor'].'</b></span></div>';
			$html .= '<div style="font-family: FreeSans;">Pokoje: <span><b>'.$flat['rooms'].'</b></span></div>';
			$html .= '<div style="font-family: FreeSans;">Powierzchnia: <span><b>'.$flat['area'].' m<sup>2</sup></b></span> </div>';
			$html .= '</td>';
			
			$html .= '<td style="border-bottom: 1px solid #e6e6e6;">';
			
			if($flat['state']['value'] === 'free') {
				$html .= '<b>'.$flat['price'].' zł</b>';
			}
			
			if ($flat['state']['value'] === 'sale') {
				$html .= '<strike><b>'.$flat['price'].' zł</b></strike>';
				$html .= '<div><b>'.$flat['price2'].' zł</b></div>';
			}
			
			$html .= '</td>';
			
			$html .= '</tr>';
				
		}
		
		$html .= '</tbody></table>';
		
		$mpdf = new mPDF();
		$mpdf->SetImportUse();
		$mpdf->WriteHTML($html);
		
		foreach ($flats as $flat) {
			$mpdf->AddPage('L');
			$mpdf->WriteHTML('<div style="text-align:center"><img style="width:100%" src="https://oliwkowe.ila.li/wp-content/themes/oliwkowe/assets/images/rzut.png"></div>');
		}
		
		return $mpdf;
	}

	*/
?>