<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$example = new FieldsBuilder('text-section');

$example
    ->addText('example', ['title'=>'Tytuł'])
    ;
return $example;
