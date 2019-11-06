<?php
namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;
$textavatar= new FieldsBuilder('text-avatar');
$textavatar
	->addGroup('main', ['label'=>'Ustawienia głowne'])
		->addText('title',['label'=> 'Tytuł sekcji'])
		->addText('subtitle',['label'=> 'Podtytuł'])
		->addTextArea('desctitle', ['label'=> 'Dopiska','rows'=>1,'wrapper' => array ('width' => '100%')])
		->addTextArea('desc',['label'=> 'Text do sekcji','new_lines'=>'br',])
	->endGroup()
	->addGroup('firms', ['label'=>'Dział'])
	->addTextArea('firmtitle', ['label'=> 'Dopiska','rows'=>1,'wrapper' => array ('width' => '100%')])
		->addRepeater('firm')
			->addTextArea('name', ['label'=> 'Nazwa','rows'=>2,'wrapper' => array ('width' => '50%%')])
			->addTextArea('adres', ['label'=> 'Adres','rows'=>1, 'wrapper' => array ('width' => '40%')])
			->addTextArea('code', ['label'=> 'Kod pocztowy','rows'=>1, 'wrapper' => array ('width' => '10%')])
			->addTextArea('site', ['label'=> 'Strona www','rows'=>1, 'wrapper' => array ('width' => '20%')])
			->addImage('avatar', ['label'=> 'Zdjęcie', 'wrapper' => array ('width' => '100%')])
	->endGroup()
		;
		return $textavatar;
