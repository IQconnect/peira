<?php
namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;
$contactform= new FieldsBuilder('contactform');
$contactform
	->addGroup('main', ['label'=>'Ustawienia głowne'])
		->addText('title',['label'=> 'Tytuł sekcji'])
		->addText('subtitle',['label'=> 'Podtytuł'])
		->addTextArea('desc',['label'=> 'Text do sekcji','new_lines'=>'br', 'rows'=>4,])
	->endGroup()
	->addGroup('contacttext', ['label'=>'Kontakt'])
	->addTextArea('contactjob', ['label'=> 'Stanowisko','rows'=>1,'wrapper' => array ('width' => '33%')])
        ->addTextArea('contactphone', ['label'=> 'Telephone','rows'=>1, 'wrapper' => array ('width' => '50%')])
		->addTextArea('contactemail', ['label'=> 'Email','rows'=>1, 'wrapper' => array ('width' => '50%')])
		->addTextArea('contactadres', ['label'=> 'Email','rows'=>1, 'wrapper' => array ('width' => '50%')])
	->endGroup()
	->addGroup('people', ['label'=>'Dział'])

		->addTextArea('name', ['label'=> 'Imie i nazwisko','rows'=>1,'wrapper' => array ('width' => '33%')])
        ->addTextArea('jobtitle', ['label'=> 'Stanowisko','rows'=>1,'wrapper' => array ('width' => '33%')])
        ->addTextArea('phone', ['label'=> 'Telephone','rows'=>1, 'wrapper' => array ('width' => '50%')])
        ->addTextArea('email', ['label'=> 'Email','rows'=>1, 'wrapper' => array ('width' => '50%')])
		->addImage('avatar', ['label'=> 'Zdjęcie', 'wrapper' => array ('width' => '50%')])
	->endGroup()
		;
		return $contactform;
