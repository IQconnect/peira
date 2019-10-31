<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$textImg = new FieldsBuilder('text-img');

$textImg
	->addTrueFalse('special', ['title'=>'Zdjecie po lewej'])
    ->addTextarea('title', ['label'=>'Tytuł', 'new_lines'=>'br', 'rows'=>2])
    ->addGroup('content', ['label'=>''])
        ->addText('label', ['label'=>'Label 1', 'new_lines'=>'br', 'rows'=>4, 'wrapper'=>['width'=>'50%']])
        ->addTextarea('dsc', ['label'=>'Opis 1', 'new_lines'=>'br', 'rows'=>4, 'wrapper'=>['width'=>'50%']])
        ->addImage('image', ['label'=>'Zdjecie', 'wrapper'=>['width'=>'50%']])
    ->endGroup()
    ;
return $textImg;
