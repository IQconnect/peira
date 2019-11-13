<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('icon-section');

$builder
    ->addText('title', ['title'=>'Tytuł'])
    ->addText('subtitle', ['title'=>'Subtitle'])
    ->addRepeater('icons', ['title'=>'Ikonki'])
        ->addImage('icon', ['title'=>'Ikonka']) 
        ->addTextarea('text', ['title'=>'Tekst', 'new_lines'=>'br'])
    ;
return $builder;