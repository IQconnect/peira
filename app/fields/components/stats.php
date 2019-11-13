<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('stats');

$builder
    ->addRepeater('icons', ['label'=>'Ikonki'])
        ->addImage('img', ['title'=>'Ikona'])
        ->addTextarea('text', ['title'=>'Tekst', 'new_lines'=>'br'])
    ;
return $builder;