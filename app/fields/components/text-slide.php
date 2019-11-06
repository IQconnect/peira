<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$textslide = new FieldsBuilder('text-slide');

$textslide
	->addTextarea('title', ['label'=>'Tytuł', 'new_lines'=>'br', 'rows'=>2])
	->addTextarea('subtitle', ['label'=>'Tytuł', 'new_lines'=>'br', 'rows'=>2])
    ->addGroup('content', ['label'=>''])
        ->addText('label', ['label'=>'Label 1', 'new_lines'=>'br', 'rows'=>4, 'wrapper'=>['width'=>'50%']])
        ->addText('label2', ['label'=>'Label 2', 'new_lines'=>'br', 'rows'=>4, 'wrapper'=>['width'=>'50%']])
        ->addTextarea('dsc', ['label'=>'Opis 1', 'new_lines'=>'br', 'rows'=>4, 'wrapper'=>['width'=>'50%']])
		->addTextarea('dsc2', ['label'=>'Opis 2', 'new_lines'=>'br', 'rows'=>4, 'wrapper'=>['width'=>'50%']])
		->addWysiwyg('addtxt', ['label'=>'Text1', 'new_lines'=>'br', 'rows'=>4, 'wrapper'=>['width'=>'50%']])
        ->addWysiwyg('addtxt2', ['label'=>'Text2', 'new_lines'=>'br', 'rows'=>4, 'wrapper'=>['width'=>'50%']])
    ->endGroup()
    ;
return $textslide;
