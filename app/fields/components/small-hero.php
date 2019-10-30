<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$smallHero = new FieldsBuilder('small-hero');

$smallHero
    ->addGroup('content', ['label'=>'', 'width'=>"70%"])
        ->addTextarea('title', ['label'=>'Tytuł', 'new_lines'=>'br', 'rows'=>2])
        ->addTextarea('dsc', ['label'=>'Opis', 'new_lines'=>'br', 'rows'=>3])
    ->endGroup()
    ->addImage('image', ['label'=>'Zdjęcie', 'return_format' => 'id'])
    ;
return $smallHero;
