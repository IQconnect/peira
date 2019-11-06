<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$localization = new FieldsBuilder('localization', ['title'=> 'Lokalizacja']);

$localization
->addTextarea('title', ['label'=>'Tytuł', 'new_lines'=>'br', 'rows'=>2])
->addRepeater('localization',['min' => 2, 'max' => 3,])
	->addTextarea('text', ['label'=>'Text do ikon', 'rows'=>1])
	->addImage('image', ['label'=>'Zdjęcie'])
    ;
return $localization;
