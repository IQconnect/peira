<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$hero = new FieldsBuilder('hero');

$hero
    ->addRepeater('slider')
        ->addGroup('content', ['label'=>'', 'width'=>"70%"])
            ->addTextarea('title', ['label'=>'Tytuł', 'new_lines'=>'br', 'rows'=>2])
            ->addTextarea('dsc', ['label'=>'Tytuł', 'new_lines'=>'br', 'rows'=>3])
            ->addLink('hero_link', ['label'=>'Link'])
        ->endGroup()
        ->addImage('image', ['label'=>'Zdjęcie'])
    ;
return $hero;
