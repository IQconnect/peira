<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('flex');

$builder
    ->addTrueFalse('reverse', ['title'=>'Odwróć sekcję?'])
    ->addText('title', ['title'=>'Tytuł'])
    ->addText('subtitle', ['title'=>'Subtitle'])
    ->addTextarea('content', ['title'=>'Content', 'new_lines'=>'br'])
    ->addImage('img', ['title'=>'Zdjęcie'])
    ;
return $builder;