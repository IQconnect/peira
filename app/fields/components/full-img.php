<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('full-img');

$builder
    ->addImage('img', ['title'=>'Zdjęcie'])
    ;
return $builder;