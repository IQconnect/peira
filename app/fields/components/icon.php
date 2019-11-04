<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$icon = new FieldsBuilder('icon', ['title'=> 'Ikony']);

$icon
->addRepeater('icon',['min' => 2, 'max' => 3,])
	->addTextarea('text', ['label'=>'Tytuł', 'new_lines'=>'br', 'rows'=>2])
	->addImage('image', ['label'=>'Zdjęcie'])
    ;
return $icon;
