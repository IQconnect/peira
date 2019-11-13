<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('small-hero');

$builder
    ->addText('title', ['title'=>'Tytuł'])
    ->addImage('img', ['title'=>'Obrazek w tle'])
    ;
return $builder;
