<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$list = new FieldsBuilder('list');

$list
    ->addRepeater('list', ['title'=>'Lista'])
        ->addText('title', ['title'=>'Tytuł'])
        ->addTextarea('content', ['title'=>'Treść', 'new_lines'=>'br'])
    ;
return $list;
