<?php

	if ($_GET['sync']) {

		//$body = wp_remote_retrieve_body(wp_remote_get('https://script.googleusercontent.com/macros/echo?user_content_key=ZSZsbSjpOxdYqXZJdsgFVWLdBaJQ6Hrc78oSDaODNkvV_PxPK3c3ufkkrO_9aRauwkDD62YdKt0aD_4mWqFdVEBa77GU0-adOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHa503N8DZSxczZRYRElvsku_YVDlIzsziwzwbzDtSOA-DpJP2kAXrBGLOZbC14Lu9gnrAZXVZ6YLB7qbNtCv4ghcb0vFu7AEYOHm8DEOoFfxS04YNunmK8omixiRFbRr7sviE0r4-uoEM&lib=M0UJAQCXpkJstoeOFd75bg_CFhThZ41k0'));

		$flats = json_decode($body, true);
		/*
		$conn = new mysqli('localhost', 'ilazenbox_peiram', 'nE1VAQVmy9');
		$conn->select_db('ilazenbox_peiramieszkaniamydevil');
		$conn->set_charset('utf8');
		*/

		$conn = new mysqli('s26.zenbox.pl', 'ilazenbox_sreb', '22NU17C3dN');
		$conn->select_db('ilazenbox_peira-mieszkania');
		$conn->set_charset('utf8');

		$conn->query("DELETE FROM mieszkania");
		
		foreach ($flats['Mieszkania'] as $flat) {
			
			$flat['Cena'] = str_replace(' ', '', $flat['Cena']);
			$flat['Cena_promocyjna'] = str_replace(' ', '', $flat['Cena_promocyjna']);
			
			$query = "INSERT INTO mieszkania VALUES ('".$flat['ID_budowlane']."', '".$flat['ID_wyświetlane']."', '".$flat['Inwestycja']."', '".$flat['Budynek']."', '".$flat['Piętro']."', '".$flat['Pomieszczenia']."', '".$flat['Powierzchnia']."', '".$flat['Status']."', '".$flat['Cena']."', '".$flat['Cena_promocyjna']."', '".$flat['Status_etykieta']."', '".$flat['Cena_etykieta']."')";
			
			$conn->query($query);
		}

		$conn->close();
		
		die;	
	}
	
	function flatStateValue($label) {
		switch($label) {
			case 'sprzedane': return 'sold';
			case 'wolne': return 'free';
			case 'promocja': return 'sale';
			case 'rezerwacja': return 'reservation';
			default: return '';
		}
	} 

	function get_all_flats() {
		/*
		$conn = new mysqli('localhost', 'ilazenbox_peiram', 'nE1VAQVmy9');
		$conn->select_db('ilazenbox_peiramieszkaniamydevil');
		$conn->set_charset('utf8');
		*/

		$conn = new mysqli('s26.zenbox.pl', 'ilazenbox_sreb', '22NU17C3dN');
		$conn->select_db('ilazenbox_peira-mieszkania');
		$conn->set_charset('utf8');
		
		$result = $conn->query("SELECT * FROM mieszkania WHERE Status = 'wolne' or Status = 'promocja'");
		$rows = $result->fetch_all(MYSQLI_ASSOC);
		
		$result->close();
		$conn->close();
		
		$rows = array_map(function($row) {
			
			$price = 0;
			
			if ($row['Status'] === 'wolne' or $row['Status'] === 'rezerwacja') {
				$price = $row['Cena'];
			} else if ($row['Status'] === 'promocja') {
				$price = $row['Cena_promocyjna'];
				$price2 = $row['Cena'];
			}
			
			if ($price) $price = number_format(floatval($price), 0, '.', ' ');
			if ($price2) $price2 = number_format(floatval($price2), 0, '.', ' ');
			
			return array(
				'id' => $row['ID_wyświetlane'] ? $row['ID_wyświetlane'] : $row['ID_budowlane'],
				'floor' => $row['Pietro'],
				'rooms' => $row['Pomieszczenia'],
				'area' => $row['Powierzchnia'],
				'staircase' => $row['ID_budowlane'][4],
				'minstaircase' => $row['ID_budowlane'][7],
				'state' => array(
					'value' => flatStateValue($row['Status']),
					'label' => ucfirst($row['Status'])
				),
				'investment' => $row['Inwestycja'],
				'price' => $price,
				'price2' => $price2
			);
			
		}, $rows);
		
		return $rows;
	}
	
	function get_flat($id) {
		$flats = get_all_flats();
		foreach ($flats as $flat) if ($flat['id'] === $id) return $flat;
	}
?>